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
    loadVaccinesDT();
});

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
                { 
                    data: null,
                    class: 'text-nowrap',
                    render: data => {
                        const vc = data.vaccinated_citizen;
                        const first_name = vc.first_name;
                        const middle_name = (vc.middle_name == null || vc.middle_name == '') ? ' ' : ` ${ vc.middle_name }`;
                        const last_name = vc.last_name;
    
                        return `
                            <div class="d-flex align-items-baseline">
                                <i class="fas fa-user-circle icon-container text-secondary"></i>
                                <span>${ last_name }, ${ first_name + middle_name }</span>
                            </div>
                        `
                    }
                },
                { 
                    data: null,
                    render: data => {
                        const age = moment().diff(moment(data.vaccinated_citizen.birth_date, 'YYYY'), 'years');
                        return age + ' y/o'
                    }
                },
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
                {
                    data: null,
                    render: data => {
                        return `
                            <div>${moment(data.vaccination_date).format("MMM. D, YYYY")}</div>
                            <div class="small text-secondary">${moment(data.vaccination_date).fromNow()}</div>
                        `;
                    }
                },
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
 * * GET VACCINES RECORDS
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