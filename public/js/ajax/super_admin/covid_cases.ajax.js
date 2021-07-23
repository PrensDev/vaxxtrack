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
    loadCOVID19CasesDT();
});


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
                url: `${ SUPER_ADMIN_API_ROUTE }covid19-cases`,
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
                            <div>
                                <span class="badge alert-${ theme } text-${ theme } p-2 w-100">${ content }</span>
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
                                <div class="badge alert-dark text-dark p-2 w-100">No Data</div>
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
        url: `${ SUPER_ADMIN_API_ROUTE }covid19-cases/${ case_ID }`,
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
 * * HEATMAP CASES
 * ====================================================================
 */

// Render Heatmap
function renderHeatmap() {

    // Replace the map container body to map
    $('#mapContainer').html(`<div class="rounded-lg" id="casesHeatmap" style="height: 500px"></div>`)

    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }covid19-cases/heatmap-data`,
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