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
 * * GET COVID19 CASES RECORDS
 * ====================================================================
 */

// Load COVID-19 Cases DataTable
loadCOVID19CasesDT = () => {
    const dt = $('#COVID19CasesDT');
    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ HEALTH_OFFICIAL_API_ROUTE }covid19-cases`,
                type: 'GET',
                headers: AJAX_HEADERS,
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
                                data-toggle = "modal" 
                                data-target = "#updateHealthStatusModal"
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
                        return `
                            <button 
                                class       = "btn btn-muted btn-block btn-sm"
                                data-toggle = "modal"
                                data-target = "#labReportModal"
                            >
                                <i class="fas fa-file-medical mr-1"></i>
                                <span>View Report</span>
                            </button>
                        `
                    }
                },

                // User Actions
                {
                    data: null,
                    class: 'text-center',
                    render: data => {
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
                                        onclick = "viewCaseDetails('${ data.case_ID }')"
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View case details</span>
                                    </div>
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#updateHealthStatusModal"
                                    >
                                        <i class="fas fa-notes-medical icon-container"></i>
                                        <span>Update health status</span>
                                    </div>
                                    <div class="dropdown-item" role="button">
                                        <i class="far fa-edit icon-container"></i>
                                        <span>Edit case details</span>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#removeCaseRecordModal"
                                    >
                                        <i class="far fa-trash-alt icon-container"></i>
                                        <span>Remove this case</span>
                                    </div>
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

                console.log(data);

                // Set data
                $('#caseCode').html(data.case_code);
                
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
    .fail(() => {
        console.log('There was an error in your request')
    })
}