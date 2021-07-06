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

    $.ajax({
        url: `${ CITIZEN_API_ROUTE }add-vaccination-appointments`,
        type: 'POST',
        headers: AJAX_HEADERS,
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {
                // Reload datatable
                const dt = $( '#vaccAppointmentsDT' ).DataTable();
                dt.ajax.reload();

                // Show alert
                showAlert('success', 'Success! Your requested appointment is on pending');

                // Hide modal
                $('#createAppointmentModal').modal('hide');

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
$('#createAppointmentModal').on('hidden.bs.modal', () => {
    resetFields([
        'requestedDate',
        'preferredVaccine'
    ]);
});

/**
 * ====================================================================
 * * GET ALL VACCINATION APPOINTMENTS
 * ====================================================================
 */

// Load All Vaccination Appointments
LoadAllVaccAppointmentsDT = () => {
    const vaccappointDT = $( '#vaccAppointmentsDT' );

    if(vaccappointDT.length){
        vaccappointDT.DataTable({
            ajax: {
                url: `${ CITIZEN_API_ROUTE }vaccination-appointments`,
                type: 'GET',
                headers: AJAX_HEADERS,
            },
            columns: [

                // Date and Time Requested
                { 
                    data: null,
                    render: data => {

                        return `
                            <div>${moment(data.created_datetime).format("MMM. D, YYYY")}</div>
                            <div class="small text-secondary">${moment(data.created_datetime).fromNow()}</div>
                        `;
                    }
                },

                // Preferred Vaccine
                { 
                    data: null,
                    render: data => {

                        return `
                            <div>${ data.vaccine_preferrence.product_name }</div>
                            <div class="small text-secondary">${ data.vaccine_preferrence.vaccine_name }</div>
                        `;
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

                // Approved By
                { 
                    data: null,
                    render: data => {
                        const approvedBy = data.approved_person;

                        if (data.approved_by == null || data.approved_by == '') {
                            return `
                                <td><span class="font-weight-normal font-italic text-muted">No approval yet</span></td>
                            `;
                        } else {
                            // return `
                            //     <td><span class="font-weight-normal font-italic text-muted">yeadawda</span></td>
                            // `;
                            if (approvedBy.middle_name == null || approvedBy.middle_name == '') {
                                return `
                                    <td><span class="font-weight-normal font-italic text">${ approvedBy.first_name } ${ approvedBy.last_name }</span></td>
                                `;
                            } else {
                                return `
                                    <td><span class="font-weight-normal font-italic text-muted">${ approvedBy.first_name } ${ approvedBy.middle_name } ${ approvedBy.last_name }</span></td>
                                `;
                            }
                            
                        }
                    }
                },

                // Approved Date and Time
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
                        const statusApproval = data.status_approval

                        if(statusApproval === "Pending") {
                            return `
                                <div class="dropdown text-center">
                                    <div data-toggle="dropdown">
                                        <div 
                                            class       = "btn btn-sm btn-white-muted text-secondary"
                                            data-toggle = "tooltip"
                                            title       = "More"
                                        >
                                            <i class="fas fa-ellipsis-v"></i>
                                        </div>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right border-0">
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            onclick     = "viewVaccAppointment('${ id }')"
                                        >
                                            <i class="icon-container fas fa-list"></i>
                                            <span>View Details</span>
                                        </div>
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#appointmentDetailsModal"
                                        >
                                            <i class="icon-container far fa-edit"></i>
                                            <span>Edit Appointment</span>
                                        </div>
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            onclick     = "removeVaccAppointment('${ id }')"
                                        >
                                            <i class="icon-container far fa-times-circle"></i>
                                            <span>Cancel Appointment</span>
                                        </div>
                                    </div>
                                </div>
                            `;
                        } else if(statusApproval === 'Approved') {
                            return `
                                <div class="dropdown text-center">
                                    <div data-toggle="dropdown">
                                        <div 
                                            class       = "btn btn-sm btn-white-muted text-secondary"
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
                                            <i class="icon-container fas fa-list"></i>
                                            <span>View Details</span>
                                        </div>
                                    </div>
                                </div>
                            `
                        } else if(statusApproval === 'Rejected') {
                            return `
                                <div class="dropdown">
                                    <div data-toggle="dropdown">
                                        <div 
                                            class       = "btn btn-sm btn-white-muted text-secondary"
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
                                            <i class="icon-container fas fa-list"></i>
                                            <span>View Details</span>
                                        </div>
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            onclick     = "removeVaccAppointment('${ id }')"
                                        >
                                            <i class="icon-container far fa-trash-alt"></i>
                                            <span>Remove from list</span>
                                        </div>
                                    </div>
                                </div>
                            `
                        }
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
viewVaccAppointment = (vaccination_appointment_ID) => {
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

                    if (data.approved_by == null || data.approved_by == '') {
                        return `
                            <td><span class="font-weight-norma text-muted font-italic" id=Approvedby>Not yet approved</span></td>
                        `
                    } else {
                        if (data.approved_person.middle_name) {
                            return `
                            <td><span class="font-weight-norma text font-italic" id=Approvedby>${ data.approved_person.first_name } ${ data.approved_person.middle_name } ${ data.approved_person.last_name }</span></td>
                            `;
                        } else {
                            return `
                            <td><span class="font-weight-norma text font-italic" id=Approvedby>${ data.approved_person.first_name } ${ data.approved_person.last_name }</span></td>
                            `;
                        }
                    }
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

// Remove Vaccinetion Appointment AJAX
removeVaccAppointmentAJAX = () => {
    const form = new FormData($('#cancelAppointmentForm')[0]);

    const vaccination_appointment_ID = form.get('vaccinationAppointmentID');

    $.ajax({
        url: `${ CITIZEN_API_ROUTE }vaccination-appointments/${ vaccination_appointment_ID }`,
        type: 'DELETE',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {

                // Peload Vaccination Appointment DataTable
                const dt = $( '#vaccAppointmentsDT' ).DataTable();
                dt.ajax.reload();

                // show alert
                showAlert('blue', 'An appointment has been removed');

                // Hide Modal
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

// Validate Cancel Appointment Form
$('#cancelAppointmentForm').validate(validateOptions({
    rules: {},
    messages: {},
    submitHandler: () => removeVaccAppointmentAJAX()
}));

// Remove Vaccination Appointment
removeVaccAppointment = (vaccination_appointment_ID) => {
    setFormValues('#cancelAppointmentForm', [
        {
            name: 'vaccinationAppointmentID',
            value: vaccination_appointment_ID
        }
    ]);

    $('#cancelAppointmentModal').modal('show')
}

