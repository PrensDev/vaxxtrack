/**
 * ====================================================================
 * * COVID19 CASES METHODS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * COVID-19 Case information
 * ====================================================================
 */


/**
 * ====================================================================
 * Declare functions here that are required to call on page load
 * ====================================================================
 */

$(() => {
    loadCOVID19CasesDT()
});


liveReloadDataTables([
    'COVID19CasesDT'
]);


/**
 * ====================================================================
 * * GET COVID-19 CASES RECORDS
 * ====================================================================
 */

// Load COVID-19 Cases DataTable
loadCOVID19CasesDT = () => {
    const dt = $('#COVID19CasesDT');
    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ HEALTH_OFFICIAL_API_ROUTE }covid19-cases`,
                headers: AJAX_HEADERS,
                // success: result => console.log(result.data)
            },
            columns: [

                // Case Code
                { data: 'case_code', class: 'text-nowrap' },

                // Date Confirmed
                { 
                    data: null,
                    render: data => {
                        const dateConfirmed = data.confirmed_date;
                        return `
                            <div>${moment(dateConfirmed).format('MMM. D, YYYY')}</div>
                            <div class="text-secondary small">${ humanizeDate(dateConfirmed) }</div>
                        `
                    }
                },

                // Admitted Status
                {
                    data: null,
                    class: 'text-center',
                    render: data => {
                        if(data.admitted) return `
                                <div class="badge alert-success text-success p-2 w-100">
                                    <i class="fas fa-check mr-1"></i>
                                    <span>Yes</span>
                                </div>
                            `
                        else return `
                                <div class="badge alert-danger text-danger p-2 w-100">
                                    <i class="fas fa-times mr-1"></i>
                                    <span>No</span>
                                </div>
                            `
                    }
                },

                // Current Health Status
                {
                    data: null,
                    render: data => {
                        const renderBadge = (theme, content) => `
                            <div
                                role        = "button" 
                                onclick     = "updateCurrHealthStatus('${ data.case_ID }')"
                            >
                                <span 
                                    class       = "badge alert-${ theme } text-${ theme } p-2 w-100"
                                    data-toggle = "tooltip"
                                    title       = "Click to update current health status"
                                >${ content }</span>
                            </div>
                        `;
                        
                        const chs = data.current_health_status;

                        if(chs == 'Asymptomatic') return renderBadge('secondary', chs);
                        if(chs == 'Mild')         return renderBadge('info', chs);
                        if(chs == 'Severe')       return renderBadge('warning', chs);
                        if(chs == 'Critical')     return renderBadge('danger', chs);
                        if(chs == 'Recovered')    return renderBadge('success', chs);
                        if(chs == 'Died')         return renderBadge('dark', chs);
                    }
                },

                // View Report
                {
                    data: null,
                    render: data => {
                        const labReportID = data.lab_report_ID;
                        if(labReportID == null) {
                            return `
                                <div 
                                    class   = "badge badge-blue p-2 w-100"
                                    role    = "button"
                                    onclick = "attachLabReport('${ data.case_ID }')"
                                >
                                    <i class="fas fa-plus mr-1"></i>
                                    <span>Add Lab Report</span>
                                </div>
                            `
                        } else {
                            return `
                                <div 
                                    class   = "badge badge-secondary p-2 w-100"
                                    role    = "button"
                                    onclick = "viewLabReport('${ labReportID }')"
                                >
                                    <i class="fas fa-file-medical mr-1"></i>
                                    <span>View Report</span>
                                </div>
                            `
                        }
                    }
                },

                // User Actions
                {
                    data: null,
                    class: 'text-center',
                    render: data => {
                        const id = data.case_ID;
                        removeRecordBlade = !data.lab_report_ID 
                            ? `
                                <div class="dropdown-divider"></div>
                                <div 
                                    class   = "dropdown-item" 
                                    role    = "button"
                                    onclick = "removeCaseRecord('${ id }')"
                                >
                                    <i class="far fa-trash-alt icon-container"></i>
                                    <span>Remove this case</span>
                                </div>
                            `
                            : '';
                        return `
                            <div class="dropdown">
                                <div data-toggle="dropdown">
                                    <div class="btn btn-white-muted btn-sm" data-toggle="tooltip" title="More">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                </div>
                                
                                <div class="dropdown-menu dropdown-menu-right border-0">
                                    <div 
                                        class   = "dropdown-item" 
                                        role    = "button"
                                        onclick = "viewCaseDetails('${ id }')"
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View case details</span>
                                    </div>
                                    <div 
                                        class   = "dropdown-item" 
                                        role    = "button"
                                        onclick = "updateCurrHealthStatus('${ id }')"
                                    >
                                        <i class="fas fa-notes-medical icon-container"></i>
                                        <span>Update health status</span>
                                    </div>
                                    ${ removeRecordBlade }
                                </div>
                            </div>
                        `;
                    }
                }
            ],
            columnDefs: [{
                'targets': [5],
                'orderable': false,
            }]
        });
    }
}


/**
 * ====================================================================
 * * GET COVID-19 CASES RECORD DETAILS
 * ====================================================================
 */

// View Case Details
viewCaseDetails = (case_ID) => {
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }covid19-cases/${ case_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {

                // Get data from result
                const data = result.data;

                // Set data
                $('#caseCodeForView').html(data.case_code);
                
                // Get Patient Full Name
                const patient = data.patient;
                const patientFullName = setFullName('F M L', {
                    firstName: patient.first_name,
                    middleName: patient.middle_name,
                    lastName: patient.last_name,
                });
                $('#patientFullName').html(patientFullName);

                // Get Patient Info
                var patientInfo;
                if(patient.sex === 'Female') {
                    patientInfo = `
                        <i class="fas fa-venus text-danger mr-1"></i>
                        <span>${ patient.sex }, ${ getAge(patient.birth_date) } years old</span>
                    `
                } else if(patient.sex === 'Male') {
                    patientInfo = `
                        <i class="fas fa-mars text-blue mr-1"></i>
                        <span>${ patient.sex }, ${ getAge(patient.birth_date) } years old</span>
                    `
                }
                $('#patientInfo').html(patientInfo);

                // Get Patient Address
                const address = patient.address;
                $('#patientRegion').html(address.region);
                $('#patientProvince').html(address.province);
                $('#patientCity').html(address.city_municipality);
                $('#patientStreetAndBrgy').html(address.street + ', ' + address.barangay_district);
                $('#patientSpecificLocation').html(address.specific_location);
                $('#patientZipCode').html(address.zip_code);
                $('#patientLongLat').html(`(Lat: ${ address.latitude }, Lng: ${ address.longitude })`);
                
                // Get Date Confirmed
                $('#confirmedDate').html(moment(data.date_confirmed).format('dddd, MMMM D, YYYY'))
                $('#confirmedDateHumanized').html(moment(data.date_confirmed).fromNow())
                
                // Get if admitted
                if(data.admitted) {
                    $('#admitted').html(`
                        <div class="badge alert-success text-success p-2">
                            <i class="fas fa-check mr-1"></i>
                            <span>Yes</span>
                        </div>
                    `);
                } else {
                    $('#admitted').html(`
                        <div class="badge alert-danger text-danger p-2">
                            <i class="fas fa-times mr-1"></i>
                            <span>No</span>
                        </div>
                    `);
                }

                // Get Current Health Status
                const currentHealthStatus = () => {
                    const chs = data.current_health_status;

                    if(chs === "Asymptomatic")
                        return `<div class="badge alert-secondary text-secondary p-2">${ chs }</div>`;
                    else if(chs === "Mild")
                        return `<div class="badge alert-info text-info p-2">${ chs }</div>`;
                    else if(chs === "Severe")
                        return `<div class="badge alert-warning text-warning p-2">${ chs }</div>`;
                    else if(chs === "Critical")
                        return `<div class="badge alert-danger text-danger p-2">${ chs }</div>`;
                    else if(chs === "Recovered")
                        return `<div class="badge alert-success text-success p-2">${ chs }</div>`;
                    else if(chs === "Died")
                        return `<div class="badge alert-dark text-dark p-2">${ chs }</div>`;
                    else
                        return `<div class="badge border p-2">No data</div>`;
                }
                $('#currentHealthStatus').html(currentHealthStatus())
                
                // Get Date Confirmed
                $('#addedAt').html(moment(data.created_datetime).format('dddd, MMMM D, YYYY'))
                $('#addedAtHumanized').html(moment(data.created_datetime).fromNow())

                // Get Date Confirmed
                $('#updatedAt').html(moment(data.updated_datetime).format('dddd, MMMM D, YYYY'))
                $('#updatedAtHumanized').html(moment(data.updated_datetime).fromNow())

                // Show modal
                $('#viewCaseDetailsModal').modal('show');
            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => console.error('There was an error in your request'))
}


/**
 * ====================================================================
 * * ADD COVID-19 CASES RECORD
 * ====================================================================
 */

const addCaseForm = $('#addCaseForm');
const currentHealthStatus = $('#currentHealthStatus');

// When current health status select Recovered
currentHealthStatus.on('change.bs.select', () => {
    if(currentHealthStatus.val() === 'Recovered') {
        $('#removalTypeSelect').show();
        $('#removalDateSelect').show();
    } else {
        $('#removalTypeSelect').hide();
        $('#removalDateSelect').hide();
        $('#removalType').selectpicker('val', null);
        $('#removalDate').val(null);
    }
});

// Validate Add Case Form
addCaseForm.validate(validateOptions({
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
        caseCode: {
            required: true
        },
        dateConfirmed: {
            required: true
        },
        currentHealthStatus: {
            required: true
        },
        admitted: {
            required: true
        },
        pregnant: {
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
        caseCode: {
            required: 'Case code is required'
        },
        dateConfirmed: {
            required: 'Please select a date when was the case confirmed'
        },
        currentHealthStatus: {
            required: 'Please select the current health status of patient'
        },
        admitted: {
            required: 'Please check if admitted to any healthcare facilities or not '
        },
        pregnant: {
            required: 'Please choose if the patient is pregnant'
        }
    },
    submitHandler: () => addCaseAJAX()
}));

// Add Case AJAX
addCaseAJAX = () => {
    const form = new FormData(addCaseForm[0]);
    const patientID = form.get('patientID');
    if(patientID == null || patientID == '') {
        alert('Select a patient first')
    } else {
        const removalType = form.get('removalType') == '' ? null : form.get('removalType');
        const removalDate = form.get('removalDate') == '' ? null : form.get('removalDate');

        data = {
            citizen_ID:            form.get('patientID'),
            case_code:             form.get('caseCode'),
            confirmed_date:        form.get('dateConfirmed'),
            current_health_status: form.get('currentHealthStatus'),
            admitted:              form.get('admitted'),
            is_pregnant:           form.get('admitted'),
            removal_type:          removalType,
            removal_date:          removalDate,
        }

        $.ajax({
            url: `${ HEALTH_OFFICIAL_API_ROUTE }add-covid19-case`,
            type: 'POST',
            headers: AJAX_HEADERS,
            data: data,
            dataType: 'json',
            success: result => {
                if(result) {
                    const patientInfo = result.data.patientInfo;
                    const caseInfo = result.data.caseInfo;
                    const patientAddress = patientInfo.address;
                    const patientLat = patientAddress.latitude;
                    const patientLng = patientAddress.longitude;

                    // Center location for contact tracing
                    const center = new L.LatLng(patientLat, patientLng);

                    // Find all probable contacts within radius
                    $.ajax({
                        url: `${ HEALTH_OFFICIAL_API_ROUTE }probable-contacts`,
                        type: 'GET',
                        headers: AJAX_HEADERS,
                        success: result2 => {
                            const probContactsData = result2.data;
                            console.log(probContactsData);

                            probContactsData.forEach(probContact => {
                                if(probContact.user_ID !== patientInfo.user_ID) {

                                    // Get the location of probable patients
                                    const probContactAddress = probContact.address;
                                    const probContactLat = probContactAddress.latitude;
                                    const probContactLng = probContactAddress.longitude;
                                    
                                    // Check if within 1k radius
                                    probContactLatLng = new L.LatLng(probContactLat, probContactLng);
                                    if(probContactLatLng.distanceTo(center) < 1000) {
                                        $.ajax({
                                            url: `${ HEALTH_OFFICIAL_API_ROUTE }add-contact`,
                                            type: 'POST',
                                            headers: AJAX_HEADERS,
                                            data: {
                                                case_ID: caseInfo.case_ID,
                                                citizen_ID: probContact.user_ID
                                            },
                                            dataType: 'json'
                                        })
                                    } else {
                                        console.log('Outside Radius');
                                    }
                                }
                            });
                        }
                    });

                    // Request sessioned alert
                    $.ajax({
                        url: `${ BASE_URL_MAIN }alert`,
                        type: 'POST',
                        data: {
                            theme: 'success',
                            message: 'Success! Your new COVID-19 Case record has been added including its contacts'
                        },
                        success: () => location.replace(`${ BASE_URL_MAIN }h/cases`)
                    });
                }
            }
        })
        .fail(() => console.error('There was an error in adding new case'));
    }
}


/**
 * ====================================================================
 * * UPDATE COVID-19 CASES RECORD
 * ====================================================================
 */

const updateCHSModal = $('#updateCHSModal');
const updateCHSForm = $('#updateCHSForm');

// Update Current Health Status
updateCurrHealthStatus = (case_ID) => {
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }covid19-cases/${ case_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                const data = result.data;
                const chs = data.current_health_status;

                $('#caseIDForUCHS').val(data.case_ID);

                if(chs === 'Asymptomatic') $('#asymptomaticForUCHS').prop('checked', true)
                if(chs === 'Mild')         $('#mildForUCHS').prop('checked', true)
                if(chs === 'Severe')       $('#severeForUCHS').prop('checked', true)
                if(chs === 'Ciritical')    $('#criticalForUCHS').prop('checked', true)
                if(chs === 'Died')         $('#diedForUCHS').prop('checked', true)
                if(chs === 'Recovered')    $('#recoveredForUCHS').prop('checked', true)

                updateCHSModal.modal('show');
            }
        }
    })
    .fail(() => console.error('There was a problem in getting current health status'))
}

// Reset update current health status form if its modals was hidden
updateCHSModal.on('hide.bs.modal', () => updateCHSForm.trigger('reset'));

// Validate update cuurent health status form
updateCHSForm.validate({ submitHandler: () => updateCaseRecordAJAX() })

// Update case record AJAX
updateCaseRecordAJAX = () => {
    const form = new FormData(updateCHSForm[0]);
    const caseID = form.get('caseID');
    data = { current_health_status: form.get('currentHealthStatus') }
    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }covid19-cases/${caseID}`,
        type: 'PUT',
        headers: AJAX_HEADERS,
        data: data,
        dataType: 'json',
        success: result => {
            if(result) {
                updateCHSModal.modal('hide');
                showAlert('success', 'A case record is successfully updated');
                reloadDataTable('#COVID19CasesDT');
            }
        }
    })
    .fail(() => console.error('There was an error in updating a case record'));
}

/**
 * ====================================================================
 * * DELETE COVID-19 CASES RECORD
 * ====================================================================
 */

const removeCaseRecordModal = $('#removeCaseRecordModal');
const removeCaseRecordForm = $('#removeCaseRecordForm');

// Remove Case Record
removeCaseRecord = (case_ID) => {
    $('#caseIDForDelete').val(case_ID);
    removeCaseRecordModal.modal('show');
}

// Validate Case Record Form 
removeCaseRecordForm.validate(validateOptions({
    rules: {
        caseID: {
            required: true
        },
        confirm: {
            required: true,
            equalTo: '#confirmRef'
        }
    },
    messages: {
        caseID: {
            required: 'Visiting Log ID must display here'
        },
        confirm: {
            required: 'You must enter "CONFIRM" if you wish to delete this record',
            equalTo: 'You must enter "CONFIRM" if you wish to delete this record'
        }
    },
    submitHandler: () => deleteCaseRecordAJAX()
}))

// Delete Case Record AJAX
deleteCaseRecordAJAX = () => {
    const form = new FormData(removeCaseRecordForm[0]);
    const caseID = form.get('caseID');

    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }covid19-cases/${ caseID }`,
        type: 'DELETE',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                removeCaseRecordModal.modal('hide');
                showAlert('blue', 'A case record has been removed');
                reloadDataTable('#COVID19CasesDT');
            }
        }
    })
    .fail(() => console.error('There was an error in deleting a case'));
}

// Reset Remove Case Record Form
removeCaseRecordModal.on('hide.bs.modal', () => removeCaseRecordForm.trigger('reset'));

/**
 * ====================================================================
 * * HEATMAP CASES
 * ====================================================================
 */

function renderHeatmap() {

    // Replace the map container body to map
    $('#mapContainer').html(`<div class="rounded-lg" id="casesHeatmap" style="height: 500px"></div>`)

    $.ajax({
        url: `${ HEALTH_OFFICIAL_API_ROUTE }covid19-cases/heatmap-data`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                const data = result.data;
                
                // Heatmap Data
                var heatmapData = { max: 8, data: data };
                
                // Base Layer
                var baseLayer = L.tileLayer(`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=${ LEAFLET_ACCESS_TOKEN }`, {
                    attribution: LEAFLET_ATTRIBUTION,
                    zoom: 5,
                    maxZoom: 12,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'your.mapbox.access.token'
                });
                
                // Heatmap Layer
                var heatmapLayer = new HeatmapOverlay({
                    "radius": 10,
                    "maxOpacity": .8,
                    "scaleRadius": false,
                    "useLocalExtrema": true,
                    latField: 'lat',
                    lngField: 'lng',
                    valueField: 'count'
                });
                
                // Map
                var map = new L.Map('casesHeatmap', {
                    center: new L.LatLng(12.512,122.212),
                    zoom: 5,
                    maxZoom: 12,
                    minZoom: 3,
                    layers: [baseLayer, heatmapLayer]
                });
                
                // Set Data to Heatmap
                heatmapLayer.setData(heatmapData);
            }
        }
    })
    .fail(() => console.error('There was an error in getting heatmap data'))
}