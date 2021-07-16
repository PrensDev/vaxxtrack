/**
 * ====================================================================
 * * VISITING LOG METHODS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * visiting log methods
 * ====================================================================
 */


/**
 * ====================================================================
 * Declare functions here that are required to render data on the page
 * ====================================================================
 */

$(() => {
    getAllVisitingLogsAJAX();
});


/**
 * ====================================================================
 * * GET ALL VISITING LOGS
 * ====================================================================
 */

// Get all visiting logs AJAX
getAllVisitingLogsAJAX = () => {
    const dt = $('#visitingLogsDT');

    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ CITIZEN_API_ROUTE }visiting-logs`,
                headers: AJAX_HEADERS,
                // success: result => console.log(result.data)
            },
            columns: [

                // Date and Time Entered
                { data: 'created_datetime', visible: false },

                // Establishment
                {
                    data: null,
                    render: data => {
                        const e = data.visiting_log_for;

                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-building text-secondary"></i>
                                </div>
                                <div>
                                    <div>${ e.name }</div>
                                    <div class="text-secondary small"> ${ e.type }</div>
                                </div>
                            </div>
                        `;
                    }
                },

                // Date and Time Entered
                {
                    data: null,
                    render: data => {
                        const entered = data.created_datetime;
                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i  class="fas fa-walking text-secondary"></i>
                                </div>
                                <div>
                                    <div>${ moment(entered).format('MMM. D, YYYY; hh:mm A') }</div>
                                    <div class="text-secondary small"> ${ moment(entered).fromNow() }</span></div>
                                </div>
                            </div>
                        `
                    }
                },

                // Purpose
                { data: 'purpose' },

                // Temperature
                {
                    data: null,
                    render: data => {
                        const temp = data.temperature;
                        if(temp == null) {
                            return `<span class="badge alert-dark text-dark p-2 w-100">No data</span>`
                        } else {
                            if(temp >= 37.5) {
                                return `<span class="badge alert-danger text-danger p-2 w-100">${ temp }&deg;C</span>`
                            } else {
                                return `<span class="badge alert-success text-success p-2 w-100">${ temp }&deg;C</span>`
                            }
                        }
                    }
                },

                // Health Status
                {
                    data: null,
                    render: data => {
                        const h = data.health_status_log_ID;
                        if(h == null) {
                            return `<span class="badge alert-dark text-dark p-2 w-100">No data</span>`
                        } else {
                            return `<span class="badge alert-success text-success p-2 w-100">Healthy</span>`
                        }
                    }
                },

                // Allowed
                {
                    data: null,
                    render: data => {
                        return `
                            <span class="badge alert-success text-success p-2 w-100 text-uupercase">
                                <i class="fas fa-check mr-1"></i>
                                <span>Allowed</span>
                            </span>
                        `
                    }
                },

                // User Actions
                {
                    data: null,
                    class: 'text-center',
                    render: data => {
                        return `
                            <div 
                                class="btn btn-sm btn-white-muted" 
                                role="button"
                                onclick="viewVisitingLogDetails('${ data.visiting_log_ID }')"
                            >
                                <div class="far fa-file-alt"></i>
                            </div>
                        `
                    }
                }
            ],
            columnDefs: [{
                targets: [7],
                orderable: false
            }],
            order: [[0, 'desc']]
        });
    }
}

/**
 * ====================================================================
 * * GET ONE VISITING LOG
 * ====================================================================
 */

// View visiting details
viewVisitingLogDetails = (visitingLogID) => {
    $.ajax({
        url: `${ CITIZEN_API_ROUTE }visiting-logs/${ visitingLogID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                const data = result.data;
                console.log(data);

                const establishment = data.visiting_log_for;
                
                $('#establishmentName').html(establishment.name);
                $('#establishmentType').html(establishment.type);
                
                const location = establishment.address;

                $('#establishmentRegion').html(location.region);
                $('#establishmentProvince').html(location.province);
                $('#establishmentCityBrgy').html(location.barangay_district + ', ' + location.city_municipality);
                $('#establishmentSpecificLocation').html(location.specific_location)
                $('#establishmentZipCode').html(location.zip_code);
                
                $('#visitingPurpose').html(data.purpose);

                const enteredAt = data.created_datetime;

                $('#dateEntered').html(moment(enteredAt).format('dddd, MMMM D, YYYY'));
                $('#timeEntered').html(moment(enteredAt).format('hh:mm A'));
                $('#enteredFromNow').html(moment(enteredAt).fromNow());

                const tempWhenVisit = data.temperature;
                var tempWhenVisitBlade;
                if(tempWhenVisit == null) {
                    tempWhenVisitBlade = `<div class="badge alert-dark text-dark p-2">No data</div>`;
                } else if(tempWhenVisit >= 37.5) {
                    tempWhenVisitBlade = `<div class="badge alert-danger text-danger p-2">${ tempWhenVisit }&deg;C</div>`;
                } else {
                    tempWhenVisitBlade = `<div class="badge alert-success text-success p-2">${ tempWhenVisit }&deg;C</div>`;
                }
                $('#tempWhenVisit').html(tempWhenVisitBlade);

                var healthStatusWhenVisitBlade;
                if(data.health_status_log_ID == null) {
                    healthStatusWhenVisitBlade = `<div class="badge alert-dark text-dark p-2">No data</div>`
                } else {
                    const hsls = data.visiting_log_by.health_status_logs;
                    hsls.forEach(hsl => {
                        if(hsl.health_status_log_ID === data.health_status_log_ID) {
                            healthStatusWhenVisitBlade = `<div class="badge alert-success text-success p-2">No Symptoms</div>`
                        }
                    });
                }
                $('#healthStatusWhenVisit').html(healthStatusWhenVisitBlade);

                var allowedStatusBlade = `
                    <div class="badge alert-success text-success p-2">
                        <i class="fas fa-check mr-1"></i>
                        <span>Allowed</span>
                    </div>
                `;
                $('#allowedStatus').html(allowedStatusBlade);

                // Show visiting details modal
                $('#visitingLogDetailsModal').modal('show');
            }
        }
    })
    .fail(() => console.error('There was an error in getting visiting logs'));
}