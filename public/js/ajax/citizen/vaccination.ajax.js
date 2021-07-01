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