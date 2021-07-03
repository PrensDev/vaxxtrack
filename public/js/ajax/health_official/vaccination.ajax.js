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
 * * GET VACCINATION RECORDS
 * ====================================================================
 */

// Load Vaccination Record DataTable
loadVaccRecordDT = () => {
    const dt = $('#vaccinationRecordsDT');
    
    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccination-records`,
                type: 'GET',
                headers: AJAX_HEADERS
            },
            columns: [

                // Vaccinated Individual
                { 
                    data: null,
                    class: 'text-nowrap',
                    render: data => {
                        const vc = data.vaccinated_citizen;
                        const fullName = setFullName('L, F Mi', {
                            firstName: vc.first_name,
                            middleName: vc.middle_name,
                            lastName: vc.last_name
                        });
    
                        return `
                            <div class="d-flex align-items-baseline">
                                <i class="fas fa-user-circle icon-container text-secondary"></i>
                                <span>${ fullName }</span>
                            </div>
                        `
                    }
                },

                // Age 
                { 
                    data: null,
                    render: data => {
                        const age = moment().diff(moment(data.vaccinated_citizen.birth_date, 'YYYY'), 'years');
                        return age + ' y/o'
                    }
                },

                // Vaccine Used
                {
                    data: null,
                    render: data => {
                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-secondary"></i>
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
                                    <i class="fas fa-user-md text-secondary"></i>
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
                                    <i class="fas fa-hospital text-secondary"></i>
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
                                        onclick     = "viewVaccCard('${ data.citizen_ID }')"
                                    >
                                        <i class="far fa-id-card icon-container"></i>
                                        <span>View citizen's card</span>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#vaccRecordDetailsModal"    
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View full details</span>
                                    </div>
                                    <div class="dropdown-item" role="button">
                                        <i class="far fa-edit icon-container"></i>
                                        <span>Edit this details</span>
                                    </div>
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#deleteVaccRecordModal"    
                                    >
                                        <i class="far fa-trash-alt icon-container"></i>
                                        <span>Delete this record</span>
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
            }]
        });
    }

}


/**
 * ====================================================================
 * * GET ONE VACCINE RECORD
 * ====================================================================
 */

// View Vaccination Card
viewVaccCard = (user_ID) => {
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccinated-citizens/${ user_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {

                // Get data from result
                const data = result.data;

                // Get vaccination records of citizen
                const vaccRecords = data.vaccination_records;

                $('#patientLastName').html(data.last_name);
                $('#patientFirstName').html(data.first_name);
                $('#patientMiddleInitial').html(`${data.middle_name[0]}.`);
                $('#patientBirthDate').html(moment(data.birth_date).format('MMMM D, YYYY'));
                $('#patientNumber').html(data.user_ID);

                var rows = '';

                // Get all records (max of 4)
                for(var i = 0; i < 4; i++) {

                    // Get each record
                    const r = vaccRecords[i];

                    if(i == 0) {
                        col1 = `1<sup>st</sup> Dose`;
                    } else if(i == 1) {
                        col1 = `2<sup>nd</sup> Dose`;
                    } else {
                        col1 = `Other`
                    }

                    if(r != null) {
                        col2 = `
                            <div>${r.vaccine_used.product_name}</div>
                            <div class="small text-secondary">${r.vaccine_used.manufacturer}</div>
                        `;
                        col3 = moment(r.vaccination_date).format('MMM. DD, YYYY');
                        
                        vaccinationSite = 
                            (r.vaccininated_in == null || r.vaccininated_in == '') 
                                ? 'Unknown vaccination site' 
                                : r.vaccininated_in;

                        col4 = `
                            <div>${r.vaccinated_by}</div>
                            <div class="small text-secondary">${vaccinationSite}</div>
                        `;
                    } else {
                        col2 = `<i class="text-muted font-weight-normal">No data yet</i>`;
                        col3 = `<i class="text-muted font-weight-normal">--:--:----</i>`
                        col4 = `<i class="text-muted font-weight-normal">No data yet</i>`;
                    }

                    rows += `
                        <tr>
                            <td>${ col1 }</td>
                            <td>${ col2 }</td>
                            <td>${ col3 }</td>
                            <td>${ col4 }</td>
                        <tr>
                    `
                }

                $('#vaccCardDataRows').html(rows);

                // Show citizen vaccination card
                $('#vaccCardModal').modal('show');
            } else {
                console.log('No result was found');
            }
        }
    })
    .fail(() => {
        console.log('There was an error in getting a vaccination record')
    })
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
                url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccination-appointments`,
                type: 'GET',
                headers: AJAX_HEADERS,
                // success: result => {
                //     console.log(result.data);
                // }
            },
            columns: [
                
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
                                    <i class="fas fa-syringe text-secondary"></i>
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
                                <div 
                                    class="badge alert-blue text-blue p-2 w-100"
                                    role=button
                                    onclick="changeStatusApproval('${ id }')"
                                >
                                    <i class="fas fa-stopwatch mr-1"></i>
                                    <span>Pending</span>
                                </div>
                            `
                        } else if (statusApproval == 'Approved'){
                            return `
                                <div 
                                    class="badge alert-success text-success p-2 w-100"
                                    role=button
                                    onclick="changeStatusApproval('${ id }')"
                                >
                                    <i class="fas fa-check mr-1"></i>
                                    <span>Approved</span>
                                </div>
                            `
                        } else if (statusApproval == 'Rejected'){
                            return `
                                <div 
                                    class="badge alert-danger text-danger p-2 w-100"
                                    role=button
                                    onclick="changeStatusApproval('${ id }')"
                                >
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
                                    <i class="fas fa-user-circle icon-container text-secondary"></i>
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
                                <div>${moment(approvedDatetime).format("MMM. D, YYYY; hh:mm A")}</div>
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
                                        data-toggle = "modal"
                                        data-target = "#vaccAppointmentDetailsModal"    
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View full details</span>
                                    </div>
                                    <div 
                                        class   = "dropdown-item" 
                                        role    = "button"
                                        onclick = "changeStatusApproval('${ id }')" 
                                    >
                                        <i class="far fa-edit icon-container"></i>
                                        <span>Change Status Approval</span>
                                    </div>
                                </div>
                            </div>
                        `
                    }
                }
            ],
            columnDefs: [{
                targets: [7],
                orderable: false
            }]
        });
    }
}

/**
 * ====================================================================
 * * UPDATE VACCINATION APPOINTMENT
 * ====================================================================
 */

// Change Status Approval
changeStatusApproval = (id) => {
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccination-appointments/${ id }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                const data = result.data;
                if(data || data.length) {

                    // Set the ID in form
                    $('#vaccAppointmentID').val(data.vaccination_appointment_ID);

                    // Set the checked radio for status approval
                    var radios = $(`input:radio[name="statusApproval"]`);
                    radios.filter(`[value="${ data.status_approval }"]`).prop('checked', true);

                    // Show modal
                    $('#changeStatusApprovalModal').modal('show');
                } else {
                    showAlert('danger', 'The information of that vaccination appointment is blank')
                }
            } else {
                showAlert('danger', 'No result was found')
            }
        }
    })
    .fail(() => {
        showAlert('danger', 'There was an error in getting the information of that vaccination appointment')
    })
}

// Change Status Approval
changeStatusApprovalAJAX = () => {
    const form = new FormData($('#changeStatusApprovalForm')[0]);

    data = {
        status_approval: form.get('statusApproval'),
        approved_datetime: moment().format(),
    }

    const id = form.get('vaccAppointmentID');

    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccination-appointments/${ id }`,
        type: 'PUT',
        data: data,
        dataType: 'json',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                
                // Hide the modal
                $('#changeStatusApprovalModal').modal('hide');

                // Show success alert
                showAlert('success', 'Success! A vaccination appointment is updated.');

                // Reload DataTable
                const dt = $('#vaccAppointmentsDT').DataTable();
                dt.ajax.reload();
            }
        }
    })
    .fail(() => {
        $('#changeStatusApprovalModal').modal('hide');
        showAlert('danger', 'There was an error in updating a vaccination appointment.');
    });
}

// Change Status Approval Form
$('#changeStatusApprovalForm').validate(validateOptions({
    rules: {},
    messages: {},
    submitHandler: () => changeStatusApprovalAJAX()
}));



/**
 * ====================================================================
 * * GET ALL VACCINES RECORDS
 * ====================================================================
 */

// Load Vaccines DataTable
loadVaccinesDT = () => {
    const dt = $('#vaccinesDT');

    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ BASE_URL_API }vaccines`,
                type: 'GET',
                headers: AJAX_HEADERS,
            },
            columns: [
                { 
                    data: null,
                    render: data => {
                        return `
                            <div class="d-flex align-items-baseline text-nowrap">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-secondary"></i>
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
                { 
                    data: 'type',
                    class: 'text-nowrap' 
                },
                { data: 'manufacturer' },
                { data: 'shots_details' },
                {
                    data: null,
                    class: 'text-center',
                    render: data => {
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
                                        onclick = "viewVaccineDetails('${ data.vaccine_ID }')"
                                        role    = "button"
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View Details</span>
                                    </div>
                                    <div 
                                        class   = "dropdown-item"
                                        onclick = "editVaccineDetails('${ data.vaccine_ID }')"
                                        role    = "button"
                                    >
                                        <i class="far fa-edit icon-container"></i>
                                        <span>Edit Details</span>
                                    </div>
                                    <div 
                                        class   = "dropdown-item"
                                        onclick = "removeVaccine('${ data.vaccine_ID }')"
                                        role    = "button"
                                    >
                                        <i class="far fa-trash-alt icon-container"></i>
                                        <span>Remove</span>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                },
            ],
            columnDefs: [{
                targets: [4],
                orderable: false,
            }]
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
        url: `${ BASE_URL_API }vaccines/${ vaccine_ID }`,
        type: 'GET',
        success: (result) => {
            if(result) {

                // Get data from result
                const data = result.data;

                // Set the content from data
                $('#productName').html(data.product_name);
                $('#vaccineName').html(data.vaccine_name);
                $('#vaccineType').html(data.type);
                $('#manufacturer').html(data.manufacturer);
                $('#shotsDetails').html(data.shots_details);
                $('#description').html(data.description);
                $('#vaccDateAdded').html(moment(data.created_datetime).format('dddd, MMMM d, YYYY'));
                $('#vaccTimeAdded').html(moment(data.created_datetime).format('hh:mm:ss A'));
                $('#vaccDateAddedHumanized').html(moment(data.created_datetime).fromNow());
                $('#vaccDateUpdated').html(moment(data.updated_datetime).format('dddd, MMMM d, YYYY'));
                $('#vaccTimeUpdated').html(moment(data.updated_datetime).format('hh:mm:ss A'));
                $('#vaccDateUpdatedHumanized').html(moment(data.updated_datetime).fromNow());

                $('#viewVaccineDetailsModal').modal('show');
            }
        }
    })
    .fail(() => {
        console.log('There was an error in retrieving vaccine data');
    });
}


/**
 * ====================================================================
 * * UPDATE VACCINE DETAILS
 * ====================================================================
 */

// Edit vaccine details
editVaccineDetails = (vaccine_ID) => {
    $.ajax({
        url: `${ BASE_URL_API }vaccines/${ vaccine_ID }`,
        type: 'GET',
        success: (result) => {
            if(result) {

                // Get data from result
                const data = result.data;

                // Set Form Values
                setFormValues('#editVaccineDetailsForm', [
                    {
                        name: 'vaccineID',
                        value: data.vaccine_ID
                    }, {
                        name: 'vaccineName',
                        value: data.vaccine_name
                    }, {
                        name: 'productName',
                        value: data.product_name
                    }, {
                        name: 'type',
                        value: data.type
                    }, {
                        name: 'manufacturer',
                        value: data.manufacturer
                    }, {
                        name: 'shotsDetails',
                        value: data.shots_details
                    }, {
                        name: 'description',
                        value: data.description
                    },
                ]);

                // Show modal
                $('#editVaccineDetailsModal').modal('show');
            }
        }
    })
    .fail(() => {
        console.log('There was an error in retrieving vaccine data');
    });
}

// Update Vaccine Details AJAX
updateVaccineDetailsAJAX = () => {

    // Get the form
    const form = new FormData($('#editVaccineDetailsForm')[0]);

    // Set the data values
    const data = {
        vaccine_name:   form.get('vaccineName'),
        product_name:   form.get('productName'),
        type:           form.get('type'),
        manufacturer:   form.get('manufacturer'),
        shots_details:  form.get('shotsDetails'),
        description:    form.get('description')
    }
    
    // Get the ID for update
    const vaccine_ID = form.get('vaccineID');

    // Update record via AJAX
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccines/${ vaccine_ID }`,
        type: 'PUT',
        headers: AJAX_HEADERS,
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {

                // Reload the DataTable
                const dt = $('#vaccinesDT').DataTable();
                dt.ajax.reload();

                // Hide the edit vaccine details modal
                $('#editVaccineDetailsModal').modal('hide');

                // Show alert
                showAlert('success', 'Success! A vaccine record has been updated');
            }
        }
    })
    .fail(() => {
        console.log('There was a problem in updating vaccine details')
    })
}

// Validate Edit Vaccine Details Form
$('#editVaccineDetailsForm').validate(validateOptions({
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
}))


/**
 * ====================================================================
 * * ADD VACCINE
 * ====================================================================
 */

// Add Vaccine AJAX
addVaccineAJAX = () => {

    // Get values from form
    const form = new FormData($('#addVaccineForm')[0]);

    // Set data
    data = {
        vaccine_name:   form.get('vaccineName'),
        product_name:   form.get('productName'),
        type:           form.get('type'),
        manufacturer:   form.get('manufacturer'),
        shots_details:  form.get('shotsDetails'),
        description:    form.get('description')
    }

    // Create vaccine record via AJAX
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }add-vaccine`,
        type: 'POST',
        headers: AJAX_HEADERS,
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {

                // Refresh/Reload DataTable
                const dt = $('#vaccinesDT').DataTable();
                dt.ajax.reload();

                // Show alert
                showAlert('success', 'Success! A new vaccine has been added');

                // Hide modal
                $('#addVaccineModal').modal('hide');

                // Set form values to empty
                setFormValues('#addVaccineForm', [
                    {
                        name: 'vaccineName',
                        value: ''
                    }, {
                        name: 'productName',
                        value: ''
                    }, {
                        name: 'type',
                        value: ''
                    }, {
                        name: 'manufacturer',
                        value: ''
                    }, {
                        name: 'shotsDetails',
                        value: ''
                    }, {
                        name: 'description',
                        value: ''
                    }
                ]);

            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => {
        console.log('There was an error in creating vaccine record')
    })
}

// Validate Add Vaccine Form
$('#addVaccineForm').validate(validateOptions({
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


/**
 * ====================================================================
 * * REMOVE VACCINE
 * ====================================================================
 */

// Remove Vaccine
removeVaccine = (vaccine_ID) => {
    setFormValues('#removeVaccineForm', [
        {
            name: 'vaccineID',
            value: vaccine_ID
        }
    ]);

    $('#removeVaccineModal').modal('show');
}

// Remove Vacccine AJAX
removeVaccineAJAX = () => {
    const form = new FormData($('#removeVaccineForm')[0]);

    const vaccine_ID = form.get('vaccineID');

    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccines/${ vaccine_ID }`,
        type: 'DELETE',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                // Refresh/reload DataTable
                const dt = $('#vaccinesDT').DataTable();
                dt.ajax.reload();

                // Show alert
                showAlert('blue', 'A vaccine record has been successfully deleted');

                // Hide modal
                $('#removeVaccineModal').modal('hide');
            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => {
        console.log('There was an error in deleting vaccine record')
    })
}

// Validate Remove Vaccine Form
$('#removeVaccineForm').validate(validateOptions({
    rules: {},
    messages: {},
    submitHandler: () => removeVaccineAJAX()
}));