/**
 * ====================================================================
 * * VACCINATION METHODS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * vaccines and vaccination records
 * ====================================================================
 */


/**
 * ====================================================================
 * Declare functions here that are required to render data on the page
 * ====================================================================
 */

$(() => {
    getAllVaccinesAJAX();
    viewVaccCard();
    LoadAllVaccAppointmentsDT(); 
});


/**
 * ====================================================================
 * * GET ALL VACCINES
 * ====================================================================
 */

// Get All Vaccines AJAX
getAllVaccinesAJAX = () => {
    $.ajax({
        url: `${ BASE_URL_API }vaccines`,
        type: 'GET',
        success: (result) => {
            if(result) {

                // Get data from result
                const data = result.data

                // For options in create appointment form
                const createAppointmentForm = $('#createAppointmentForm');
                if(createAppointmentForm.length) {
                    var options = ''
                    data.forEach(v => {
                        options += `
                            <option 
                                value="${ v.vaccine_ID }" 
                                data-subtext="${ v.vaccine_name }"
                            >${ v.product_name }</option>
                        `
                    });
                    $('#preferredVaccine').html(options).selectpicker('refresh');
                }
                
                // Vaccine List
                const vaccineList = $('#vaccineList');
                if(vaccineList.length) {
                    vaccineCard = ''
                    data.forEach(v => {
                        vaccineCard += `
                            <div class="col-md-6 mb-4">
                                <div class="card bg-success pl-1 h-100">
                                    <div class="card-body bg-white rounded-lg d-flex">
                                        <div class="mr-3">
                                            <div class="alert-success text-success flex-center rounded-lg" style="width: 4rem; height: 4rem;">
                                                <h2><i class="fas fa-syringe"></i></h2>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                                            <div>
                                                <h4 class="mb-1">${ v.product_name }</h4>
                                                <table class="table table-borderless table-sm small">
                                                    <tr>
                                                        <td class="text-nowrap">Vaccine Name</td>
                                                        <td>:</td>
                                                        <td class="font-weight-normal">${ v.vaccine_name }</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap">Manufacturer</td>
                                                        <td>:</td>
                                                        <td class="font-weight-normal">${ v.manufacturer }</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap">Shots Details</td>
                                                        <td>:</td>
                                                        <td class="font-weight-normal">${ v.shots_details }</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="mt-2 text-right">
                                                <button 
                                                    class="btn btn-sm btn-success"
                                                    onclick="viewVaccineDetails('${ v.vaccine_ID }')"
                                                >More details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `
                    });

                    vaccineList.html(vaccineCard);
                }

            } else {
                console.log('No result for vaccine records');
            }
        }
    })
    .fail(() => {
        console.log('There was an error in retrieving vaccine records');
    })
}


// View Vaccine Details
viewVaccineDetails = (vaccine_ID) => {

    $.ajax({
        url: `${ BASE_URL_API }vaccines/${ vaccine_ID }`,
        type: 'GET',
        success: (result) => {
            if(result) {
                const data = result.data;

                $('#productName').html(data.product_name);
                $('#vaccineName').html(data.vaccine_name);
                $('#manufacturer').html(data.manufacturer);
                $('#type').html(data.type);
                $('#shotsDetails').html(data.shots_details);
                $('#description').html(data.description);

                $('#viewVaccineDetailsModal').modal('show');
            } else {
                console.log('No result for a details of vaccine');
            }
        }
    });
}


/**
 * ====================================================================
 * * GET VACCINATION RECORDS OF CITIZEN
 * ====================================================================
 */

// View Vaccination Card
viewVaccCard = () => {
    $.ajax({
        url: `${ CITIZEN_API_ROUTE }vaccination-records/${ localStorage.getItem('user_ID') }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                
                // Get data from result
                const data = result.data;
                
                // Get vaccination records of citizen
                const vaccRecords = data.vaccination_records;

                $('#citizenLastName').html(data.last_name);
                $('#citizenFirstName').html(data.first_name);
                $('#citizenMiddleInitial').html(`${data.middle_name[0]}.`);
                $('#citizenBirthDate').html(moment(data.birth_date).format('MMMM D, YYYY'));
                $('#citizenNumber').html(data.user_ID);

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
 * * CREATE APPOINTMENT
 * ====================================================================
 */

// Create Appointment AJAX
createAppointmentAJAX = () => {
    const form = new FormData($('#createAppointmentForm')[0]);

    data = {
        requested_date: form.get('requestedDate'),
        preferred_vaccine: form.get('preferredVaccine')
    }

    console.log(data);
}


// Validate Create Appointment Form
$('#createAppointmentForm').validate(validateOptions({
    rules: {
        requestedDate: {
            required: true
        },
        preferredVaccine: {
            required: true
        }
    },
    messages: {
        requestedDate: {
            required: 'Select the date you want to get vaccinated'
        },
        preferredVaccine: {
            required: 'Select the vaccine you prefer'
        }
    },
    submitHandler: () => createAppointmentAJAX()
}));


// On hide create appointment modal, reset fields
$('#createAppointmentModal').on('hidden.bs.modal', (event) => {
    resetFields([
        'requestedDate',
        'preferredVaccine'
    ]);

    var validator = $("#createAppointmentForm").validate();
    validator.resetForm();
    $("#createAppointmentForm").find(".is-invalid").removeClass(".is-invalid");
    $("#createAppointmentForm").find(".is-valid").removeClass(".is-valid");
});

/**
 * ====================================================================
 * * GET ALL APPOINTMENT
 * ====================================================================
 */

LoadAllVaccAppointmentsDT = () => {
    const vaccappointDT = $( '#vaccAppointmentsDT' );

    if(vaccappointDT.length){
        vaccappointDT.DataTable({
            ajax: {
                url: `${ CITIZEN_API_ROUTE }vaccination-appointments`,
                type: 'GET',
                headers: AJAX_HEADERS
            },
            columns: [
                { 
                    data: null,
                    //'created_datetime' 
                    render: data => {

                        return `
                            <div>${moment(data.created_datetime).format("MMM. D, YYYY")}</div>
                            <div class="small text-secondary">${moment(data.created_datetime).fromNow()}</div>
                        `;
                    }
                },
                { 
                    data: null,
                    //'vaccine_preferrence.product_name' 
                    render: data => {

                        return `
                            <div>${ data.vaccine_preferrence.product_name }</div>
                            <div class="small text-secondary">${ data.vaccine_preferrence.vaccine_name }</div>
                        `;
                    }
                },
                { 
                    data: null,
                    //'preferred_date' 
                    render: data => {

                        return `
                            <div>${moment(data.preferred_date).format("MMM. D, YYYY")}</div>
                            <div class="small text-secondary">${moment(data.preferred_date).fromNow()}</div>
                        `;
                    }
                },
                { 
                    data: null,
                    //'status_approval' 
                    render: data => {
                        const statapproved = data.status_approval
                        
                        if(statapproved == 'Pending') {
                            return `
                                <div class="badge alert-blue text-blue p-2 w-100">
                                    <i class="fas fa-stopwatch mr-1"></i>
                                    <span>Pending</span>
                                </div>
                            `
                        } else if (statapproved == 'Approved'){
                            return `
                                <div class="badge alert-success text-success p-2 w-100">
                                    <i class="fas fa-check mr-1"></i>
                                    <span>Approved</span>
                                </div>
                            `
                        } else if (statapproved == 'Rejected'){
                            return `
                                <div class="badge alert-danger text-danger p-2 w-100">
                                    <i class="fas fa-times mr-1"></i>
                                    <span>Rejected</span>
                                </div>
                            `
                        }
                    }
                },
                { 
                    data: null,
                    //'approved_by' 
                    render: data => {
                        const approvedby = data.approved_by;
                        const font = (approvedby == null || approvedby == '') ? 'font-weight-normal font-italic text-muted' : `font-weight-normal font-italic text`;
                        const result = (approvedby == null || approvedby == '') ? 'No approval yet' : `${ approvedby }`;

                        return `
                            <td><span class="${ font }">${ result }</span></td>
                        `;
                    }
                },
                { 
                    data: null,
                    //'approved_datetime' 
                    render: data => {
                        const approvedate = data.approved_datetime;
                        const font = (approvedate == null || approvedate == '') ? 'font-weight-normal font-italic text-muted' : `font-weight-normal font-italic text`;
                        const result = (approvedate == null || approvedate == '') ? 'No data yet' : `${ approvedate }`;

                        return `
                            <td><span class="${ font }">${ result }</span></td>
                        `;
                    }
                },
                {
                    data:null,
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
                                        onclick     = "viewVaccCard"
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
                        `;
                    }
                }
            ],
            columnDefs: [{
                'targets': [6],
                'orderable': false
            }]
        });
    } 
}
