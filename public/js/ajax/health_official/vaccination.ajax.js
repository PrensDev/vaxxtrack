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
    loadVaccRecordsDT();
    loadVaccAppointmentsDT();
    loadVaccinesDT();
});

liveReloadDataTables([
    'vaccinationRecordsDT',
    'vaccAppointmentsDT',
    'vaccinesDT'
]);

/**
 * ====================================================================
 * * GET VACCINATION RECORDS
 * ====================================================================
 */

// Load Vaccination Record DataTable
loadVaccRecordsDT = () => {
    const dt = $('#vaccinationRecordsDT');
    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccination-records`,
                type: 'GET',
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
                        const vaccRecordID = data.vaccination_record_ID;
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
                                        onclick     = "viewVaccRecordDetails('${ vaccRecordID }')"    
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View full details</span>
                                    </div>
                                    <div 
                                        class="dropdown-item" 
                                        role="button"
                                        onclick     = "editVaccRecord('${ vaccRecordID }')"
                                    >
                                        <i class="far fa-edit icon-container"></i>
                                        <span>Edit this details</span>
                                    </div>
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        onclick     = "deleteVaccRecord('${ vaccRecordID }')" 
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
            }],
            order: [[0, 'desc']]
        });
    }

}


/**
 * ====================================================================
 * * DELETE VACCINATION RECORDS
 * ====================================================================
 */

const deleteVaccRecordForm = $('#deleteVaccRecordForm');
const deleteVaccRecordModal = $('#deleteVaccRecordModal');

// Delete Vaccination Record
deleteVaccRecord = (vaccRecordID) => {
    $('#vaccRecordIDForDelete').val(vaccRecordID);
    deleteVaccRecordModal.modal('show');
}


// When Vaccination Record Modal is hidden
deleteVaccRecordModal.on('hide.bs.modal', () => deleteVaccRecordForm.trigger('reset'));


// Delete Vaccination Record Form
deleteVaccRecordForm.validate(validateOptions({
    rules: {
        vaccRecordID: {
            required: true
        },
        confirm: {
            required: true,
            equalTo: '#confirmRef'
        }
    },
    messages: {
        vaccRecordID: {
            required: 'Vaccination Record ID must display here'
        },
        confirm: {
            required: 'You must enter "CONFIRM" if you wish to delete this record',
            equalTo: 'You must enter "CONFIRM" if you wish to delete this record'
        }
    },
    submitHandler: () => deleteVaccRecordAJAX()
}));


// Delete Vaccination Record AJAX
deleteVaccRecordAJAX = () => {
    const form = new FormData(deleteVaccRecordForm[0]);
    vaccRecordID = form.get('vaccRecordID');
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccination-records/${ vaccRecordID }`,
        type: 'DELETE',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                
                // Refresh DataTable
                const dt = $('#vaccinationRecordsDT').DataTable();
                dt.ajax.reload();

                // Show alert
                showAlert('info', 'A vaccination record has been deleted');

                // Hide modal
                deleteVaccRecordModal.modal('hide');
            }
        }
    });
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

                // Set patient detailss
                $('#patientLastName').html(data.last_name);
                $('#patientFirstName').html(data.first_name);
                $('#patientMiddleInitial').html(`${data.middle_name[0]}.`);
                $('#patientBirthDate').html(moment(data.birth_date).format('MMMM D, YYYY'));
                $('#patientNumber').html(data.user_ID);

                // Sort the records in ascending order by vaccination date
                const vaccRecordsSorted = vaccRecords.sort((a,b) => {
                    return new Date(a.vaccination_date) - new Date(b.vaccination_date);
                });

                // Initialize rows blade
                var rows = '';

                // Get all records (max of 4)
                for(var i = 0; i < 4; i++) {

                    // Get each record
                    const r = vaccRecordsSorted[i];

                    // Set the first column
                    if(i == 0)      col1 = `1<sup>st</sup> Dose`;
                    else if(i == 1) col1 = `2<sup>nd</sup> Dose`;
                    else            col1 = `Other`;

                    // Set the second, third, and fourth column
                    if(r != null) {

                        // Set the vaccine (2nd column)
                        col2 = `
                            <div>${r.vaccine_used.product_name}</div>
                            <div class="small text-secondary">${r.vaccine_used.manufacturer}</div>
                        `;

                        // Set the vaccination date (3rd column)
                        col3 = `
                            <div class="text-nowrap">${moment(r.vaccination_date).format('MMM. DD, YYYY')}</div>
                        `;
                        
                        // Get vaccination site
                        vaccinationSite = 
                            (r.vaccinated_in == null || r.vaccinated_in == '') 
                                ? 'Unknown vaccination site' 
                                : r.vaccinated_in;

                        // Set the healthcare professional and establishment
                        col4 = `
                            <div>${r.vaccinated_by}</div>
                            <div class="small text-secondary">${vaccinationSite}</div>
                        `;
                    } else {
                        col2 = `<i class="text-muted font-weight-normal">No data yet</i>`;
                        col3 = `<i class="text-muted font-weight-normal">--:--:----</i>`;
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

                // Set the rows in vaccination card
                $('#vaccCardDataRows').html(rows);

                // Show citizen vaccination card
                $('#vaccCardModal').modal('show');
            } else {
                console.log('No result was found');
            }
        }
    })
    .fail(() => console.error('There was an error in getting a vaccination record'));
}

// View Vaccination Record Details
viewVaccRecordDetails = (vaccination_record_ID) => {
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccination-records/${ vaccination_record_ID }`,
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
 * * ADD VACCINATION RECORD
 * ====================================================================
 */

const addVaccRecordForm = $('#addVaccRecordForm');
const findPatientSelectpicker = $('#findPatient');
const searchCitizenModal = $('#searchCitizenModal');

// Populate Vaccine Used Selectpicker
if(addVaccRecordForm.length) {
    $.ajax({
        url: `${ BASE_URL_API }vaccines`,
        type: 'GET',
        success: result => {
            if(result) {
                const data = result.data;
                var options = ''
                data.forEach(v => {
                    options += `
                        <option 
                            value="${ v.vaccine_ID }" 
                            data-content="
                                <div class='d-flex align-items-baseline'>
                                    <div class='icon-container'>
                                        <i class='fas fa-syringe'></i>
                                    </div>
                                    <div>
                                        <div>${ v.product_name }</div>
                                        <div class='small'>${ v.vaccine_name }</div>
                                        <div class='small'>${ v.manufacturer }</div>
                                    </div>
                                </div>
                            "
                            title="${ v.product_name }"
                        >${ v.product_name }</option>
                    `
                });
                $('#vaccineUsed').html(options).selectpicker('refresh');
            }
        }
    })
    .fail(() => console.error('There was an error in getting vaccines'));
}

// Add Vaccination Record AJAX
addVaccRecordAJAX = () => {
    const form = new FormData(addVaccRecordForm[0]);

    const patientID = form.get('patientID');
    if(patientID == '' || patientID == null) {
        alert('without');
    } else {
        data = {
            citizen_ID: patientID,
            vaccine_ID: form.get('vaccineUsed'),
            vaccination_date: form.get('vaccinationDate'),
            vaccinated_by: form.get('vaccinatedBy'),
            vaccinated_in: form.get('vaccinatedIn'),
            remarks: form.get('remarks'),
        }

        $.ajax({
            url: `${ HEALTH_OFFICIAL_API_ROUTE }add-vaccination-record`,
            type: 'POST',
            headers: AJAX_HEADERS,
            data: data,
            dataType: 'json',
            success: result => {
                if(result) {
                    $.ajax({
                        url: `${ BASE_URL_MAIN }alert`,
                        type: 'POST',
                        data: {
                            theme: 'success',
                            message: 'Success! A new vaccination record has been added'
                        },
                        success: () => location.replace(`${ BASE_URL_MAIN }h/vaccination-records`)
                    });
                }
            }
        })
        .fail(() => console.error('There was an error in creating new vaccination record'));
    }
}

// Validate Add Vaccination Form
addVaccRecordForm.validate(validateOptions({
    rules: {
        firstName: {
            required: true
        },
        lastName: {
            required: true
        },
        birthDate: {
            required: true
        },
        sex: {
            required: true
        },
        vaccineUsed: {
            required: true
        },
        vaccinationDate: {
            required: true
        },
        vaccinatedBy: {
            required: true
        },
        vaccinatedIn: {
            required: true
        }
    },
    messages: {
        firstName: {
            required: `Patient's first name is required`
        },
        lastName: {
            required: `Patient's last name is required`
        },
        birthDate: {
            required:  `Patient's date of birth is required`
        },
        sex: {
            required: `Patient's biological sex is required`
        },
        vaccineUsed: {
            required: `Please select the vaccine given to the patient`
        },
        vaccinationDate: {
            required: `Please insert the date when patient has been vaccinated`
        },
        vaccinatedBy: {
            required: 'Please insert the healthcare professional who done vaccination'
        },
        vaccinatedIn: {
            required: 'Please insert what healthcare establishment or where did the vaccination happen'
        }
    },
    submitHandler: () => addVaccRecordAJAX()
}));

// When search citizen modal is showned
searchCitizenModal.on('show.bs.modal', () => {
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }probable-patients`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                const data = result.data;
                console.log(data);

                var options = '';
                data.forEach(p => {
                    const patientFullName = setFullName('L, F M', {
                        firstName: p.first_name,
                        middleName: p.middle_name,
                        lastName: p.last_name
                    });

                    options += `
                        <option
                            data-content="
                                <div class='d-flex align-items-baseline'>
                                    <div class='icon-container'>
                                        <i class='fas fa-user-circle'></i>
                                    </div>
                                    <div>
                                        <div>${ patientFullName }</div>
                                        <div class='small'>${ p.sex }, ${ getAge(p.birth_date) }</div>
                                    </div>
                                </div>
                            "
                            value="${ p.user_ID }"
                            title="${ patientFullName }"
                        >${ patientFullName }</option>
                    `
                })

                findPatientSelectpicker.html(options);
                findPatientSelectpicker.selectpicker('refresh');
            }
        }
    })
});

// When find patient selectpicker is change
findPatientSelectpicker.on('change.bs.modal', () => {
    const patientID = findPatientSelectpicker.val();
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }probable-patients/${ patientID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                const data = result.data;

                // Set Patient's ID and Full Name
                $('#patientID').val(data.user_ID);
                $('#firstName').val(data.first_name);
                $('#middleName').val(data.middle_name);
                $('#lastName').val(data.last_name);
                
                // Set Patient's General Information
                $('#birthDate').val(data.birth_date);
                $('#sex').selectpicker('val', data.sex);
                
                // Set Patient's Address
                const address = data.address;
                $('#patientRegion').val(address.region);
                $('#patientProvince').val(address.province);
                $('#patientCity').val(address.city_municipality);
                $('#patientBarangay').val(address.barangay_district);
                $('#patientStreet').val(address.street);
                $('#patientSpecificLocation').val(address.specific_location);
                
                patientInfoFields = [
                    'patientID',
                    'firstName',
                    'middleName',
                    'lastName',
                    'suffixName',
                    'birthDate',
                    'sex',
                    'patientRegion',
                    'patientProvince',
                    'patientCity',
                    'patientBarangay',
                    'patientStreet',
                    'patientSpecificLocation'
                ];

                // Clear disabled form controls
                patientInfoFields.forEach(f => {
                    const el = $(`#${f}`);
                    if(el.hasClass('selectpicker')) {
                        el.attr('disabled', true);
                        el.selectpicker('refresh');
                    } else {
                        el.prop('readonly', true);
                    }
                });

                // Hide Search Citizen Modal
                searchCitizenModal.modal('hide');
            }
        }
    })
    .fail(() => console.error('There was an error in getting a probable patient'));
});


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
                headers: AJAX_HEADERS,
            },
            columns: [
                
                // Hidden column for default ordering
                {
                    data: 'created_datetime',
                    visible: false,
                },

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
                targets: [8],
                orderable: false
            }],
            order: [[0, 'desc']]
        });
    }
}

/**
 * ====================================================================
 * * VIEW VACCINATION APPOINTMENT
 * ====================================================================
 */

// View vaccination appointment details
viewVaccAppointment = (vaccination_appointment_ID) => {
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }vaccination-appointments/${ vaccination_appointment_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                const data = result.data;

                const appointedBy = data.appointed_by;
                
                // Set Patient Full Name
                var appointedFullName = setFullName('F M L', {
                    firstName: appointedBy.first_name,
                    middleName: appointedBy.middle_name,
                    lastName: appointedBy.last_name
                });

                var sexBlade;
                if(appointedBy.sex === 'Female')
                    sexBlade = `
                        <i class="fas fa-venus text-danger mr-1"></i>
                        <span>Female</span>
                    `;
                else if(appointedBy.sex === 'Male')
                    sexBlade = `
                        <i class="fas fa-mars text-blue mr-1"></i>
                        <span>Male</span>
                    `;

                $('#Patientname').html(`
                    <div class="d-flex align-items-baseline">
                        <div class="icon-container">
                            <i class="fas fa-user-circle text-secondary"></i>
                        </div>
                        <div>
                            <div>${ appointedFullName }</div>
                            <div class="text-secondary small">
                                ${ sexBlade }, ${ getAge(appointedBy.birth_date) }
                            </div>
                        </div>
                    </div>
                `);
                $('#Productname').html(data.vaccine_preferrence.product_name);
                $('#Vaccinename').html(data.vaccine_preferrence.vaccine_name);
                $('#Manufacturer').html(data.vaccine_preferrence.manufacturer);
                $('#PreDate').html(moment(data.preferred_date).format('dddd, MMMM D, YYYY'));
                $('#PreMoment').html(humanizeDate(data.preferred_date));
                $('#ColDate').html(moment(data.created_datetime).format('dddd, MMMM D, YYYY'));
                $('#ColTime').html(moment(data.created_datetime).format('hh:mm A'));
                $('#ColMoment').html(humanizeDate(data.created_datetime));

                const status = () => {

                    if(data.status_approval == 'Pending') {
                        return `
                            <div class="badge alert-blue text-blue p-2">
                                <i class="fas fa-stopwatch mr-1"></i>
                                <span id=Status>Pending</span>
                            </div>
                        `;
                    } else if (data.status_approval == 'Rejected') {
                        return `
                            <div class="badge alert-danger text-danger p-2">
                                <i class="fas fa-times mr-1"></i>
                                <span id=Status>Rejected</span>
                            </div>
                        `;
                    } else if (data.status_approval == 'Approved') {
                        return `
                            <div class="badge alert-success text-success p-2">
                                <i class="fas fa-check mr-1-1"></i>
                                <span id=Status>Approved</span>
                            </div>
                        `;
                    }

                }

                $('#Status').html(status());

                const approvedBy = () => {
                    if (data.approved_by == null || data.approved_by == '') {
                        return `<span class="text-muted font-italic font-weight-normal">Not yet approved</span>`
                    } else {
                        const approvedBy = data.approved_person;
                        const approvedByFullName = setFullName('F Mi L', {
                            firstName: approvedBy.first_name,
                            middleName: approvedBy.middle_name,
                            lastName: approvedBy.last_name
                        });

                        const approvedUserType = 
                            approvedBy.user_ID == localStorage.getItem('user_ID')
                                ? `You, ${ approvedBy.user_type }`
                                : approvedUserType = approvedBy.user_type

                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user-tie text-secondary"></i>
                                </div>
                                <div>
                                    <div>${ approvedByFullName }</div>
                                    <div class="text-secondary small">${ approvedUserType }</div>
                                </div>
                            </div>
                        `
                    }
                }

                $('#Approvedby').html(approvedBy());

                const approvedDandT = () => {
                    const approvedDatetime = data.approved_datetime;
                    if (approvedDatetime == null || approvedDatetime == '') {
                        return `
                            <span class="font-weight-normal text-muted font-italic">No data yet</span>
                        `
                    } else {
                        return `
                            <div>${moment(approvedDatetime).format("MMM. D, YYYY<br>hh:mm A")}</div>
                            <div class="small text-secondary">${humanizeDate(approvedDatetime)}</div>
                        `
                    }
                }

                $('#ApprovedDandT').html(approvedDandT());
                
                // Show modal
                $('#vaccAppointmentDetailsModal').modal('show')
            } else {
                console.log('No data reseved')
            }
        }
    })
    .fail(() => console.error('There was an error when requesting'))
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

                // Added AT (hidden for default sort)
                { data: 'created_datetime', visible: false },

                // Vaccine
                { 
                    data: null,
                    render: data => {
                        return `
                            <div class="d-flex align-items-baseline text-nowrap">
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

                // Vaccine Type
                { 
                    data: 'type',
                    class: 'text-nowrap' 
                },

                // Manufacturer
                { data: 'manufacturer' },

                // Shots Details
                { data: 'shots_details' },

                // User actions
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
                targets: [5],
                orderable: false,
            }],
            order: [[0, 'desc']]
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
}));


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