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

        preferred_date: form.get('requestedDate'),
        preferred_vaccine: form.get('preferredVaccine')
    }

    // console.log(data);

    $.ajax({
        url: `${ CITIZEN_API_ROUTE }add-vaccination-appointments`,
        type: 'POST',
        headers: AJAX_HEADERS,
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {
                //reload datatable
                const dt = $( '#vaccAppointmentsDT' ).DataTable();
                dt.ajax.reload();

                //show alert
                showAlert('success', 'Successfully Created A New Vaccination Appointment');

                //hide modal
                $('#createAppointmentModal').modal('hide')

            } else {
                console.log('No result has been found');
            }
        }
    })
    .fail(() => {
        console.log('There was an error when creating a vaccination appointments');
    })
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
                                        data-toggle = "modal"
                                        data-target = "#vaccCardModal"
                                    >
                                        <i class="far fa-id-card icon-container"></i>
                                        <span>View citizen's card</span>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div 
                                        class       = "dropdown-item" 
                                        onclick     = "viewVaccineAppointments('${ data.vaccination_appointment_ID }')"
                                        role        = "button"
                                        
                                           
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
                                        onclick     = "removeVaccineAppointments('${ data.vaccination_appointment_ID }')"
                                        role        = "button"
                                          
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

/**
 * ====================================================================
 * * GET VACCINATION APPOINTMENT DETAILS
 * ====================================================================
 */

// view vaccination appointment details
viewVaccineAppointments = (vaccination_appointment_ID) => {
    $.ajax({
        url: `${ CITIZEN_API_ROUTE }vaccination-appointments/${ vaccination_appointment_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                //get data from result
                const data = result.data;

                console.log(data);

                //set the content from data

                $('#DayDate').html(moment(data.created_datetime).format('dddd, MMMM D, YYYY'));
                $('#Time').html(moment(data.created_datetime).format('hh:mm A'));
                $('#Daymoments').html(moment(data.created_datetime).fromNow());
                $('#productname').html(data.vaccine_preferrence.product_name);
                $('#vaccname').html(data.vaccine_preferrence.vaccname);
                $('#manufacturer').html(data.vaccine_preferrence.manufacturer);
                $('#PreDayDate').html(moment(data.preferred_date).format('dddd, MMMM D, YYYY'));
                $('#PreTime').html(moment(data.preferred_date).format('hh:mm A'));
                $('#PreDayMoment').html(moment(data.preferred_date).fromNow());

                const status = () => {

                    if(data.status_approval == 'Pending') {
                        alert = 'alert-blue text-blue p-2',
                        icon = 'fa-stopwatch mr-1'
                    } else if (data.status_approval == 'Rejected') {
                        alert = 'alert-danger text-danger p-2',
                        icon = 'fa-times mr-1'
                    } else if (data.status_approval == 'Approved') {
                        alert = 'alert-success text-success p-2',
                        icon = 'fa-check mr-1-1'
                    }

                    return `
                        <div class="badge ${ alert }" id = "status">
                            <i class="fas ${ icon }"></i>
                            <span>${ data.status_approval }</span>
                        </div>
                    `;

                }

                $('#status').html(status());

                const aprrovedby = () => {

                    if(data.approved_by == null || data.approved_by == '') {
                        font = 'font-italic text-muted'
                        text = 'No approval yet'
                    } else {
                        font = 'font-italic text'
                        text = data.approved_by
                    }

                    return `
                        <span class="font-weight-normal ${ font }">${ text }</span>
                    `;
                }

                $('#aprrovedby').html(aprrovedby());

                const datatimeapproved = () => {

                    if(data.approved_datetime == null || data.approved_datetime == '') {
                        font = 'font-italic text-muted'
                        text = 'No data yet'
                    } else {
                        font = 'font-italic text'
                        text = data.approved_datetime
                    }
                    
                    return `
                        <span class="font-weight-normal ${ font }">${ text }</span>
                    `;
                }

                $('#datatimeapproved').html(datatimeapproved());

                //show modal
                $('#appointmentDetailsModal').modal('show')

            } else {
                console.log('no result has found')
            }
        }
    })
    .fail(() => {
        console.log('There was an error when requesting')
    })
}

/**
 * ====================================================================
 * * REMOVE VACCINATION APPOINTMENT DETAILS
 * ====================================================================
 */

 removeVaccineAppointments = (vaccination_appointment_ID) => {
    setFormValues('#cancelAppointmentForm', [
        {
            name: 'vaccinationAppointmentID',
            value: vaccination_appointment_ID
        }
    ]);

    $('#cancelAppointmentModal').modal('show')
 }

 removeVaccineAppointmentsAJAX = () => {
    const form = new FormData($('#cancelAppointmentForm')[0]);

    const vaccination_appointment_ID = form.get('vaccinationAppointmentID');

    $.ajax({
        url: `${ CITIZEN_API_ROUTE }vaccination-appointments/${ vaccination_appointment_ID }`,
        type: 'DELETE',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                //reload page
                const dt = $( '#vaccAppointmentsDT' ).DataTable();
                dt.ajax.reload();

                //show alert
                showAlert('blue', 'A vaccination appointment has been successfully deleted');

                //hide modal
                $('#cancelAppointmentModal').modal('hide')
            } else {
                console.log('No result has found');
            }
        }
    })
    .fail(() => {
        console.log('There was an error when deleteng vaccination appointment')
    })
 }

 $('#cancelAppointmentForm').validate(validateOptions({
    rules: {},
    messages: {},
    submitHandler: () => removeVaccineAppointmentsAJAX()
}));


