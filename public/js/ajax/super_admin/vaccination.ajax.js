/**
 * ====================================================================
 * * VACCINATION AJAX METHODS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * user information
 * ====================================================================
 */


/**
 * ====================================================================
 * Declare functions here that are required to call on page load
 * ====================================================================
 */

$(() => {
    loadVaccRecordDT();
    loadVaccAppointmentsDT();
    loadVaccinesDT();
});

liveReloadDataTables([
    'vaccAppointmentsDT',
    'vaccinesDT'
]);


/**
 * ====================================================================
 * * GET ALL VACCINES
 * ====================================================================
 */

// Load Vaccines DataTable
loadVaccinesDT = () => {
    const dt = $('#vaccinesDT');
    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ SUPER_ADMIN_API_ROUTE }vaccines`,
                headers: AJAX_HEADERS,
            },
            columns: [

                // Date Created (hidden)
                { data: 'created_datetime', visible: false },

                // Vaccine
                { 
                    data: null,
                    render: data => {
                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-success"></i>
                                </div>
                                <div>
                                    <div
                                        data-toggle="tooltip"
                                        title="Product Name"
                                    >${ data.product_name }</div>
                                    <div 
                                        class="small text-secondary"
                                        data-toggle="tooltip"
                                        title="Vaccine Name"
                                    >${ data.vaccine_name }</div>
                                </div>
                            </div>
                        `
                    }
                },

                // Type
                { 
                    data: null,
                    class: 'text-nowrap',
                    render: data => {
                        return `
                            <div class="d-flex align-items-baseline text-nowrap">
                                <div class="icon-container">
                                    <i class="fas fa-dna text-info"></i>
                                </div>
                                <div>${ data.type }</div>
                            </div>
                        `
                    }
                },
                
                // Manufacturer
                { 
                    data: null,
                    render: data => {
                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-industry text-secondary"></i>
                                </div>
                                <div>${ data.manufacturer }</div>
                            </div>
                        `
                    }
                },

                // Shots Details
                { data: 'shots_details' },

                // Availability
                { 
                    data: null,
                    render: data => {
                        return data.is_available 
                            ? `
                                <div 
                                    class="badge text-success alert-success p-2 w-100"
                                    role="button"
                                    onclick="changeAvailabilityStatus('${ data.vaccine_ID }')"
                                >Available</div>
                            `
                            : `
                                <div 
                                    class="badge text-danger alert-danger p-2 w-100"
                                    role="button"
                                    onclick="changeAvailabilityStatus('${ data.vaccine_ID }')"
                                >Not Available</div>
                            `
                    }
                },

                // User Actions
                {
                    data: null,
                    class: 'text-center',
                    render: data => {
                        const id = data.vaccine_ID;
                        const hasReferences = data.vaccination_records.length > 0 || data.vaccination_appointments.length > 0;
                        const removeVaccineBlade = hasReferences ? '' : `
                                <div 
                                    class   = "dropdown-item"
                                    onclick = "removeVaccine('${ id }')"
                                    role    = "button"
                                >
                                    <i class="far fa-trash-alt icon-container"></i>
                                    <span>Remove</span>
                                </div>
                            `;
                        return `
                            <div class="dropdown" data-toggle="tooltip" title="More">
                                <div class="d-inline" data-toggle="dropdown">
                                    <div class="btn btn-white-muted btn-sm">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                </div>
                                
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div 
                                        class   = "dropdown-item"
                                        onclick = "viewVaccineDetails('${ id }')"
                                        role    = "button"
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View Details</span>
                                    </div>
                                    <div 
                                        class   = "dropdown-item"
                                        onclick = "editVaccineDetails('${ id }')"
                                        role    = "button"
                                    >
                                        <i class="far fa-edit icon-container"></i>
                                        <span>Edit Details</span>
                                    </div>
                                    ${ removeVaccineBlade }
                                </div>
                            </div>
                        `;
                    }
                },
            ],
            columnDefs: [{
                targets: [6],
                orderable: false,
            }],
            order: [[0, 'desc']],
            language: {
                emptyTable: `<div class="py-5 rounded-lg text-secondary">No vaccines yet</div>`
            }
        });
    }
}


/**
 * ====================================================================
 * * GET VACCINE DETAILS
 * ====================================================================
 */

// View Vaccine Details 
viewVaccineDetails = (vaccine_ID) => {
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }vaccines/${ vaccine_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {

                // Get data from result
                const data = result.data;

                // Set the content from data
                $('#productName').html(data.product_name);
                $('#vaccineName').html(data.vaccine_name);
                $('#vaccineType').html(`
                    <div class="d-flex align-items-baseline">
                        <div class="icon-container">
                            <i class="fas fa-dna text-info"></i>
                        </div>
                        <div>${ data.type }</div>
                    </div>
                `);
                $('#manufacturer').html(`
                    <div class="d-flex align-items-baseline">
                        <div class="icon-container">
                            <i class="fas fa-industry text-secondary"></i>
                        </div>
                        <div>${ data.manufacturer }</div>
                    </div>
                `);
                $('#shotsDetails').html(data.shots_details);
                $('#description').html(data.description);
                $('#availability').html(() => {
                    return data.is_available
                        ? `<div class="badge text-success alert-success p-2">Available</div>`
                        : `<div class="badge text-danger alert-danger p-2">Not Available</div>`
                });
                $('#vaccDateAdded').html(moment(data.created_datetime).format('dddd, MMMM D, YYYY'));
                $('#vaccTimeAdded').html(moment(data.created_datetime).format('hh:mm:ss A'));
                $('#vaccDateAddedHumanized').html(humanizeDate(data.created_datetime));
                $('#vaccDateUpdated').html(moment(data.updated_datetime).format('dddd, MMMM D, YYYY'));
                $('#vaccTimeUpdated').html(moment(data.updated_datetime).format('hh:mm:ss A'));
                $('#vaccDateUpdatedHumanized').html(humanizeDate(data.updated_datetime));

                // Show Vaccine Details Modal
                $('#viewVaccineDetailsModal').modal('show');
            }
        }
    })
    .fail(() => console.error('There was an error in retrieving vaccine data'));
}


/**
 * ====================================================================
 * * ADD VACCINE
 * ====================================================================
 */

const addVaccineForm = $('#addVaccineForm');
const addVaccineModal = $('#addVaccineModal');

// Add Vaccine AJAX
addVaccineAJAX = () => {

    // Get values from form
    const form = new FormData(addVaccineForm[0]);

    // Set data
    data = {
        vaccine_name:  form.get('vaccineName'),
        product_name:  form.get('productName'),
        type:          form.get('type'),
        manufacturer:  form.get('manufacturer'),
        shots_details: form.get('shotsDetails'),
        description:   form.get('description'),
        is_available:  form.get('availability') === 'on'
    }

    // Create vaccine record via AJAX
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }add-vaccine`,
        type: 'POST',
        headers: AJAX_HEADERS,
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {

                // Refresh/Reload DataTable
                reloadDataTable('#vaccinesDT');

                // Show alert
                showAlert('success', 'Success! A new vaccine has been added');

                // Hide modal
                addVaccineModal.modal('hide');

                // Reset add vaccine form
                addVaccineForm.trigger('reset');

            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => console.error('There was an error in creating vaccine record'))
}

// Validate Add Vaccine Form
addVaccineForm.validate(validateOptions({
    rules: {
        vaccineName: {
            required: true
        },
        productName: {
            required: true
        },
        type: {
            required: true
        },
        manufacturer: {
            required: true
        },
        shotsDetails: {
            required: true
        },
        description: {
            required: true
        }
    },
    messages: {
        vaccineName: {
            required: 'Vaccine name is required'
        },
        productName: {
            required: 'Product name is required'
        },
        type: {
            required: 'Type of vaccine is required'
        },
        manufacturer: {
            required: 'Manufacturer is required'
        },
        shotsDetails: {
            required: 'Shots details is required'
        },
        description: {
            required: 'Description is required'
        }
    },
    submitHandler: () => addVaccineAJAX()
}));

// When add vaccine modal is hidden, reset add vaccine form
addVaccineModal.on('hide.bs.modal', () => addVaccineForm.trigger('reset'));


/**
 * ====================================================================
 * * UPDATE VACCINE DETAILS
 * ====================================================================
 */

const editVaccineDetailsForm = $('#editVaccineDetailsForm');
const editVaccineDetailsModal = $('#editVaccineDetailsModal');
const changeAvailabilityStatusForm = $('#changeAvailabilityStatusForm');
const changeAvailabilityStatusModal = $('#changeAvailabilityStatusModal');

// Get vaccine details
getVaccineDetails = (vaccine_ID, modalToShow) => {
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }vaccines/${ vaccine_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {

                // Get data from result
                const data = result.data;

                if(editVaccineDetailsForm.length && modalToShow === 'editVaccineDetailsModal') {
                    $('#vaccineIDForEdit').val(data.vaccine_ID);
                    $('#vaccineNameForEdit').val(data.vaccine_name);
                    $('#productNameForEdit').val(data.product_name);
                    $('#typeForEdit').val(data.type);
                    $('#manufacturerForEdit').val(data.manufacturer);
                    $('#shotsDetailsForEdit').val(data.shots_details);
                    $('#descriptionForEdit').val(data.description);                
                    $('#availabiiltyForEdit').prop('checked', data.is_available);
                    editVaccineDetailsModal.modal('show');
                }
                
                if(changeAvailabilityStatusForm.length && modalToShow === 'changeAvailabilityStatusModal') {
                    $('#vaccineIDForChange').val(data.vaccine_ID);
                    $('#availabiiltyForChange').prop('checked', data.is_available);
                    changeAvailabilityStatusModal.modal('show');
                }

            }
        }
    })
    .fail(() => console.error('There was an error in retrieving vaccine data'));
}

// Edit vaccine details
editVaccineDetails = (vaccine_ID) => getVaccineDetails(vaccine_ID, 'editVaccineDetailsModal');

// Update Vaccine Details AJAX
updateVaccineDetailsAJAX = () => {

    // Get the form
    const form = new FormData(editVaccineDetailsForm[0]);

    // Set the data values
    const data = {
        vaccine_name:  form.get('vaccineName'),
        product_name:  form.get('productName'),
        type:          form.get('type'),
        manufacturer:  form.get('manufacturer'),
        shots_details: form.get('shotsDetails'),
        description:   form.get('description'),
        is_available:  form.get('availability') === 'on'
    }
    
    // Get the ID for update
    const vaccine_ID = form.get('vaccineID');

    // Update record via AJAX
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }vaccines/${ vaccine_ID }`,
        type: 'PUT',
        headers: AJAX_HEADERS,
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {

                // Reload the DataTable
                reloadDataTable('#vaccinesDT');

                // Hide the edit vaccine details modal
                editVaccineDetailsModal.modal('hide');

                // Reset edit vaccine details form
                editVaccineDetailsForm.trigger('reset');

                // Show alert
                showAlert('success', 'Success! A vaccine record has been updated');
            }
        }
    })
    .fail(() => console.error('There was a problem in updating vaccine details'));
}

// Validate Edit Vaccine Details Form
editVaccineDetailsForm.validate(validateOptions({
    rules: {
        vaccineName: {
            required: true
        },
        productName: {
            required: true,
        },
        type: {
            required: true,
        },
        manufacturer: {
            required: true
        },
        shotsDetails: {
            required: true
        },
        description: {
            required: true
        }
    },
    messages: {
        vaccineName: {
            required: 'Vaccine name is required'
        },
        productName: {
            required: 'Product name is required',
        },
        type: {
            required: 'Vaccine type is required',
        },
        manufacturer: {
            required: 'Manufacturer is required'
        },
        shotsDetails: {
            required: 'Shots Details is required'
        },
        description: {
            required: 'Description is required'
        }
    },
    submitHandler: () => updateVaccineDetailsAJAX()
}));

// Reset edit vaccine details form when its modal is hidden
editVaccineDetailsModal.on('hide.bs.modal', () => editVaccineDetailsForm.trigger('reset'));

// Change Availability Status
changeAvailabilityStatus = (vaccine_ID) => getVaccineDetails(vaccine_ID, 'changeAvailabilityStatusModal');

// Validate Change Availability Status Form
changeAvailabilityStatusForm.validate({ submitHandler: () => updateVaccAvailabilityStatusAJAX() });

// Update Vaccine Availability Status AJAX
updateVaccAvailabilityStatusAJAX = () => {
    const form = new FormData(changeAvailabilityStatusForm[0]);

    data = { is_available: form.get('availability') === 'on' }

    // Get the ID for update
    const vaccine_ID = form.get('vaccineID');

    // Update record via AJAX
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }vaccines/${ vaccine_ID }`,
        type: 'PUT',
        headers: AJAX_HEADERS,
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {

                // Reload the DataTable
                reloadDataTable('#vaccinesDT');

                // Hide the change availability status modal
                changeAvailabilityStatusModal.modal('hide');

                // Reset change availability status form
                changeAvailabilityStatusForm.trigger('reset');

                // Show alert
                showAlert('success', 'Success! A vaccine record has been updated');
            }
        }
    })
    .fail(() => console.error('There was a problem in updating vaccine details'));
}

/**
 * ====================================================================
 * * REMOVE VACCINE
 * ====================================================================
 */

const removeVaccineForm = $('#removeVaccineForm');
const removeVaccineModal = $('#removeVaccineModal');

// Remove Vaccine
removeVaccine = (vaccine_ID) => {
    setFormValues('#removeVaccineForm', [
        {
            name: 'vaccineID',
            value: vaccine_ID
        }
    ]);

    removeVaccineModal.modal('show');
}

// Remove Vacccine AJAX
removeVaccineAJAX = () => {
    const form = new FormData($('#removeVaccineForm')[0]);
    const vaccine_ID = form.get('vaccineID');

    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }vaccines/${ vaccine_ID }`,
        type: 'DELETE',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {

                // Refresh/reload DataTable
                reloadDataTable('#vaccinesDT');

                // Show alert
                showAlert('blue', 'A vaccine record has been successfully deleted');

                // Hide modal
                removeVaccineModal.modal('hide');
            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => console.error('There was an error in deleting vaccine record'))
}

// Reset Remove Vaccine Form when its modal is hidden
removeVaccineModal.on('hide.bs.modal', () => removeVaccineForm.trigger('reset'));

// Validate Remove Vaccine Form
removeVaccineForm.validate(validateOptions({
    rules: {},
    messages: {},
    submitHandler: () => removeVaccineAJAX()
}));


/**
 * ====================================================================
 * * GET ALL VACCINATION RECORDS
 * ====================================================================
 */

// Load Vaccination Record DataTable
loadVaccRecordDT = () => {
    const dt = $('#vaccinationRecordsDT');
    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ SUPER_ADMIN_API_ROUTE }vaccination-records`,
                headers: AJAX_HEADERS
            },
            columns: [

                // Added at (hidden)
                { data: 'created_datetime', visible: false },

                // Vaccinated Individual
                { 
                    data: null,
                    render: data => {
                        const vc = data.vaccinated_citizen;
                        const fullName = setFullName('L, F Mi', {
                            firstName: vc.first_name,
                            middleName: vc.middle_name,
                            lastName: vc.last_name
                        });

                        const age = getAge(data.vaccinated_citizen.birth_date);
                        
                        details = '';
                        if(vc.sex === 'Female') {
                            details += `
                                <i class="fas fa-venus text-danger mr-1"></i>
                                <span>${ vc.sex }, ${ age } y/o</span>
                            `;
                        } else if(vc.sex === 'Male') {
                            details += `
                                <i class="fas fa-mars text-blue mr-1"></i>
                                <span>${ vc.sex }, ${ age } y/o</span>
                            `;
                        }

                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user-circle text-secondary"></i>
                                </div>
                                <div>
                                    <div>${ fullName }</div>
                                    <div class="small text-secondary">${ details }</div>
                                </div>
                            </div>
                        `
                    }
                },

                // Vaccine Used
                {
                    data: null,
                    render: data => {
                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-success"></i>
                                </div>
                                <div>
                                    <div>${ data.vaccine_used.product_name }</div>
                                    <div class="small text-secondary">${ data.vaccine_used.manufacturer }</div>
                                </div>
                            </div>
                        `
                    }
                },

                // Date Vaccinated
                {
                    data: null,
                    render: data => {
                        return `
                            <div>${moment(data.vaccination_date).format("MMM. D, YYYY")}</div>
                            <div class="small text-secondary">${moment(data.vaccination_date).fromNow()}</div>
                        `;
                    }
                },

                // Vaccinated By
                { 
                    data: null,
                    render: (data) => {
                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user-md text-info"></i>
                                </div>
                                <div>
                                    <div>${ data.vaccinated_by }</div>
                                    <div class="small text-secondary">Healthcare Professional</div>
                                </div>
                            </div>
                        `
                    }
                },

                // Vaccinated In
                { 
                    data: null,
                    render: (data) => {
                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-hospital-alt text-danger"></i>
                                </div>
                                <div>
                                    <div>${ data.vaccinated_in }</div>
                                    <div class="small text-secondary">Healthcare Establishment</div>
                                </div>
                            </div>
                        `
                    }
                },

                // Actions
                { 
                    data: null,
                    render: data => {
                        return `
                            <div class="dropdown">
                                <div class="d-inline" data-toggle="dropdown">
                                    <div 
                                        class       = "btn btn-white-muted btn-sm" 
                                        role        = "button"
                                        data-toggle = "tooltip" 
                                        title       = "More"
                                    ><i class="fas fa-ellipsis-v"></i></div>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        onclick     = "viewVaccRecordDetails('${ data.vaccination_record_ID }')"    
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View full details</span>
                                    </div>
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        onclick     = "viewVaccCard('${ data.citizen_ID }')"
                                    >
                                        <i class="far fa-id-card icon-container"></i>
                                        <span>View citizen's card</span>
                                    </div>
                                </div>
                            </div>
                        `
                    }
                },
            ],
            columnDefs: [{
                'targets': [6],
                'orderable': false,
            }],
            order: [[0, 'desc']],
            language: {
                emptyTable: `<div class="py-5 rounded-lg text-secondary">No vaccination records yet</div>`
            }
        });
    }

}


/**
 * ====================================================================
 * * GET VACCINATION RECORD DETAILS
 * ====================================================================
 */

// View vaccination record details
viewVaccRecordDetails = (vaccination_record_ID) => {
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }vaccination-records/${ vaccination_record_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {

                // Get data form result
                const data = result.data;
                
                // Get Vaccinated Citizen
                const vc = data.vaccinated_citizen;

                // Get Vaccinated Citizen Full Name
                const vcFullName = setFullName('F M L', {
                    firstName: vc.first_name,
                    middleName: vc.middle_name,
                    lastName: vc.last_name
                });
                $('#vaccinatedFullName').html(vcFullName);
                
                // Get Vaccinated Citizen's Details
                var vcDetails;
                if(vc.sex === 'Female') {
                    vcDetails = `
                        <i class="fas fa-venus text-danger mr-1"></i>
                        <span id="vaccinatedDetails">${ vc.sex }, ${ getAge(vc.birth_date) } years old</span>
                    `;
                } else if(vc.sex === 'Male') {
                    vcDetails = `
                        <i class="fas fa-mars text-blue mr-1"></i>
                        <span id="vaccinatedDetails">${ vc.sex }, ${ getAge(vc.birth_date) } years old</span>
                    `;
                }
                $('#vaccinatedDetails').html(vcDetails);

                // Get Vaccinated Citizen's Address
                const vcAddress = vc.address;
                $('#vaccinatedRegion').html(vcAddress.region);
                $('#vaccinatedProvince').html(vcAddress.province);
                $('#vaccinatedCity').html(vcAddress.city_municipality);
                $('#vaccinatedStreetAndBrgy').html(vcAddress.street + ', ' + vcAddress.barangay_district);
                $('#vaccinatedSpecificLocation').html(vcAddress.specific_location);
                $('#vaccinatedZipCode').html(vcAddress.zip_code);

                // Get Vaccine Used
                const vaccineUsed = data.vaccine_used;
                $('#productName').html(vaccineUsed.product_name);
                $('#vaccineName').html(vaccineUsed.vaccine_name);
                $('#vaccManufacturer').html(vaccineUsed.manufacturer);

                // Get Date Vaccinated
                $('#vaccDate').html(moment(data.vaccination_date).format('dddd, MMMM D, YYYY'));
                $('#vaccDateHumanized').html(moment(data.vaccination_date).fromNow());

                // Get vaccinated by and in
                $('#vaccinatedBy').html(data.vaccinated_by);
                $('#vaccinatedIn').html(data.vaccinated_in);

                // Get remarks
                const remarks = data.remarks;
                if(remarks == null || remarks == '') {
                    $('#remarks').html(`
                        <span class="font-weight-normal text-muted font-italic">No remarks</span>
                    `);
                } else {
                    $('#remarks').html(`<p>${ remarks }</p>`);
                }

                // Get record added at & updated at
                $('#recordAddedAt').html(moment(data.created_datetime).format('dddd, MMMM D, YYYY<br>hh:mm A'));
                $('#recordAddedAtHumanized').html(moment(data.created_datetime).fromNow());
                $('#recordUpdatedAt').html(moment(data.updated_datetime).format('dddd, MMMM D, YYYY<br>hh:mm A'));
                $('#recordUpdatedAtHumanized').html(moment(data.updated_datetime).fromNow());
                
                // Show Vaccination Record Details Modal
                $('#vaccRecordDetailsModal').modal('show');
            }
        }
    })
    .fail(() => console.error('There was an error in getting vaccination record details'));
}

/**
 * ====================================================================
 * * GET ALL VACCINATION APPOINTMENTS
 * ====================================================================
 */

// Load Vaccination Appointment DataTable
loadVaccAppointmentsDT = () => {
    const dt = $('#vaccAppointmentsDT');
    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ SUPER_ADMIN_API_ROUTE }vaccination-appointments`,
                type: 'GET',
                headers: AJAX_HEADERS,
            },
            columns: [
                
                // Hidden column for default ordering
                { data: 'created_datetime', visible: false },

                // Citizen
                { 
                    data: null,
                    class: 'text-nowrap',
                    render: data => {
                        const ab = data.appointed_by;

                        const fullName = setFullName('L, F', {
                            firstName: ab.first_name,
                            lastName: ab.last_name
                        });

                        const sex = data.appointed_by.sex;

                        if(sex === 'Female') {
                            sexIcon = 'venus';
                            sexColor = 'danger';
                        } else if(sex === 'Male') {
                            sexIcon = 'mars';
                            sexColor = 'blue';
                        }
    
                        return `
                            <div class="d-flex align-items-baseline">
                                <i class="fas fa-user-circle icon-container text-secondary"></i>
                                <div>
                                    <div>${ fullName }</div>
                                    <div class="small text-secondary d-flex align-items-baseline">
                                        <i class="fas fa-${ sexIcon } text-${ sexColor } mr-2"></i>
                                        <div>${ sex }</div>
                                    </div>
                                </div>
                            </div>
                        `
                    }
                },

                // Age
                { 
                    data: null,
                    render: data => {
                        const age = moment().diff(moment(data.appointed_by.birth_date, 'YYYY'), 'years');
                        return age + ' y/o'
                    }
                },

                // Preferred Vaccine
                {
                    data: null,
                    render: data => {
                        const vp = data.vaccine_preferrence;

                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-success"></i>
                                </div>
                                <div>
                                    <div>${ vp.product_name }</div>
                                    <div class="small text-secondary">${ vp.manufacturer }</div>
                                </div>
                            </div>
                        `
                    }
                },

                // Preferred Date
                {
                    data: null,
                    class: 'text-nowrap',
                    render: data => {
                        return `
                            <div>${moment(data.preferred_date).format("MMM. D, YYYY")}</div>
                            <div class="small text-secondary">${moment(data.preferred_date).fromNow()}</div>
                        `;
                    }
                },

                // Status Approval
                { 
                    data: null,
                    render: data => {
                        const statusApproval = data.status_approval;
                        const id = data.vaccination_appointment_ID;
                        
                        if(statusApproval == 'Pending') {
                            return `
                                <div class="badge alert-blue text-blue p-2 w-100">
                                    <i class="fas fa-stopwatch mr-1"></i>
                                    <span>Pending</span>
                                </div>
                            `
                        } else if (statusApproval == 'Approved'){
                            return `
                                <div class="badge alert-success text-success p-2 w-100">
                                    <i class="fas fa-check mr-1"></i>
                                    <span>Approved</span>
                                </div>
                            `
                        } else if (statusApproval == 'Rejected'){
                            return `
                                <div class="badge alert-danger text-danger p-2 w-100">
                                    <i class="fas fa-times mr-1"></i>
                                    <span>Rejected</span>
                                </div>
                            `
                        }
                    }
                },

                // Approved By
                { 
                    data: null,
                    class: 'text-nowrap',
                    render: data => {
                        const ap = data.approved_person;

                        if(ap == null || ap == '') {
                            return `
                                <div class="text-secondary font-italic font-weight-normal text-nowrap">Not yet approved</div>
                            `
                        } else {
                            const fullName = setFullName('L, F', {
                                firstName: ap.first_name,
                                lastName: ap.last_name
                            });
    
                            const userApproved = ap.user_ID == localStorage.getItem('user_ID') ? `You, ${ ap.user_type }` : ap.user_type;
    
                            return `
                                <div class="d-flex align-items-baseline">
                                    <i class="fas fa-user-tie icon-container text-secondary"></i>
                                    <div>
                                        <div>${ fullName }</div>
                                        <div class="small text-secondary">${ userApproved }</div>
                                    </div>
                                </div>
                            `;
                        }
                    }
                },

                // Date and Time Approved
                {
                    data: null,
                    render: data => {
                        const approvedDatetime = data.approved_datetime;

                        if(approvedDatetime == null || approvedDatetime == '') {
                            return `
                                <div class="text-secondary font-italic font-weight-normal">No data yet</div>
                            `
                        } else {
                            return `
                                <div>${moment(approvedDatetime).format("MMM. D, YYYY<br>hh:mm A")}</div>
                                <div class="small text-secondary">${moment(approvedDatetime).fromNow()}</div>
                            `;
                        }
                    }
                },

                // Actions
                {
                    data: null,
                    render: data => {
                        const id = data.vaccination_appointment_ID;

                        return `
                            <div class="dropdown">
                                <div data-toggle="dropdown">
                                    <div 
                                        class       = "btn btn-white-muted btn-sm" 
                                        data-toggle = "tooltip"
                                        title       = "More"
                                    ><i class="fas fa-ellipsis-v"></i></div>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right border-0">
                                    <div 
                                        class       = "dropdown-item"
                                        role        = "button"
                                        onclick     = "viewVaccAppointment('${ id }')"
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View full details</span>
                                    </div>
                                </div>
                            </div>
                        `
                    }
                }
            ],
            columnDefs: [{
                targets: [8],
                orderable: false
            }],
            order: [[0, 'desc']],
            language: {
                emptyTable: `<div class="py-5 rounded-lg text-secondary">No vaccination appointments yet</div>`
            }
        });
    }
}

// View Vaccination Appointment
viewVaccAppointment = (vaccination_appointment_ID) => {
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }vaccination-appointments/${ vaccination_appointment_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                const data = result.data

                console.log(data);

                //set the content from data

                const fullName = () => {
                    if(data.appointed_by.middle_name) {
                        return `
                            <div id=Patientname>${ data.appointed_by.first_name } ${ data.appointed_by.middle_name } ${ data.appointed_by.last_name }</div>
                        `
                    } else {
                        return `
                            <div id=Patientname>${ data.appointed_by.first_name } ${ data.appointed_by.last_name }</div>
                        `
                    }
                }

                $('#Patientname').html(fullName());
                $('#Productname').html(data.vaccine_preferrence.product_name);
                $('#Vaccinename').html(data.vaccine_preferrence.vaccine_name);
                $('#Manufacturer').html(data.vaccine_preferrence.manufacturer);
                $('#PreDate').html(moment(data.preferred_date).format('dddd, MMMM D, YYYY'));
                $('#PreMoment').html(moment(data.preferred_date).fromNow());
                $('#ColDate').html(moment(data.created_datetime).format('dddd, MMMM D, YYYY'));
                $('#ColTime').html(moment(data.created_datetime).format('hh:mm A'));
                $('#ColMoment').html(moment(data.created_datetime).fromNow());

                const status = () => {

                    if(data.status_approval == 'Pending') {
                        return `
                            <div class="badge alert-blue text-blue p-2">
                                <i class="fas fa-stopwatch mr-1"></i>
                                <span id=Status>Pending</span>
                            </div>
                        `;
                        // alert = 'alert-blue text-blue p-2',
                        // icon = 'fas fa-stopwatch mr-1'
                    } else if (data.status_approval == 'Rejected') {
                        return `
                            <div class="badge alert-danger text-danger p-2">
                                <i class="fas fa-times mr-1"></i>
                                <span id=Status>Rejected</span>
                            </div>
                        `;
                        // alert = 'alert-danger text-danger p-2',
                        // icon = 'fas fa-times mr-1'
                    } else if (data.status_approval == 'Approved') {
                        return `
                            <div class="badge alert-success text-success p-2">
                                <i class="fas fa-check mr-1-1"></i>
                                <span id=Status>Approved</span>
                            </div>
                        `;

                        // alert = 'alert-success text-success p-2',
                        // icon = 'fas fa-check mr-1-1'
                    }

                }

                $('#Status').html(status());

                const approvedBy = () => {
                    if (data.approved_by == null || data.approved_by == '') {
                        return `
                            <div class="font-weight-norma text-muted font-italic" id=Approvedby>Not yet approved</div>
                        `
                    } else {
                        if (data.approved_person.middle_name) {
                            return `
                            <div id=Approvedby>${ data.approved_person.first_name } ${ data.approved_person.middle_name } ${ data.approved_person.last_name }</div>
                            `;
                        } else {
                            return `
                            <div id=Approvedby>${ data.approved_person.first_name } ${ data.approved_person.last_name }</div>
                            `;
                        }
                    }
                }

                $('#Approvedby').html(approvedBy());

                const approvedDandT = () => {
                    if (data.approved_datetime == null || data.approved_datetime == '') {
                        return `
                            <div class="font-weight-norma text-muted font-italic" id=ApprovedDandT>No data yet</div>
                        `
                    } else {
                        return `
                            <div id=ApprovedDandT>${ moment(data.updated_datetime).format('dddd, MMMM d, YYYY') }</div>
                            <div id="vaccTimeUpdatedappointment">${ moment(data.updated_datetime).format('hh:mm:ss A') }</div>
                            <div class="small text-secondary" id="vaccappointHumanized">${ moment(data.updated_datetime).fromNow() }</div>
                            
                        `
                    }
                }
                $('#ApprovedDandT').html(approvedDandT());
                


                //show modal
                $('#vaccAppointmentDetailsModal').modal('show')
            } else {
                console.log('No data reseved')
            }
        }
    })
    .fail(() => {
        console.log('There was an error when requesting')
    })
}
