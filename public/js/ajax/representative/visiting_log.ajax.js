/**
 * ====================================================================
 * * VISITING LOGS METHOD
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * establishment visiting logs
 * ====================================================================
 */


/**
 * ====================================================================
 * Declare functions here that are required to call on page load
 * ====================================================================
 */

$(() => {});

liveReloadDataTables([
    'visitingLogsDT',
]);

/**
 * ====================================================================
 * GET ALL VISITING LOGS
 * ====================================================================
 */

// Load Visiting Logs DataTable
loadVisitingLogsDT = (establishment_ID) => {
    const dt = $('#visitingLogsDT');

    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ REPRESENTATIVE_API_ROUTE }visiting-logs/${ establishment_ID }`,
                type: 'GET',
                headers: AJAX_HEADERS,
            },
            columns: [

                // Visitor's Name
                {
                    data: null,
                    render: data => {
                        const vlb = data.visiting_log_by;

                        const fullName = vlb.last_name + ', ' + vlb.first_name;

                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user-circle text-secondary"></i>
                                </div>
                                <div>
                                    <div>${ fullName }</div>
                                    <div class="small text-secondary">Visitor</div>
                                </div>
                            </div>
                        `
                    }
                },

                // Entry Log
                {
                    data: null,
                    render: data => {
                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-sign-in-alt text-secondary"></i>
                                </div>
                                <div>
                                    <div>${ moment(data.created_datetime).format('MMM. D, YYYY; hh:mm A') }</div>
                                    <div class="small text-secondary">${ moment(data.created_datetime).fromNow() }</div>
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
                    class: 'text-center',
                    render: data => {
                        const temp = data.health_status_log.temperature;
                        if(temp > 37.5) {
                            return `
                                <span class="badge alert-danger text-danger p-2 w-100">
                                    <i class="fas fa-temperature-high mr-1"></i>
                                    <span>${ temp }&deg;C</span>
                                </span>
                            `
                        } else {
                            return `
                                <span class="badge alert-success text-success p-2 w-100">
                                    <i class="fas fa-temperature-low mr-1"></i>
                                    <span>${ temp }&deg;C</span>
                                </span>
                            `
                        }
                    }
                },

                // Health Status
                { data: 'purpose'},

                // Allowed
                { data: 'purpose'},

                // Actions
                {
                    data: null,
                    render: data => {
                        return `
                            <div class="dropdown text-center">
                                <div data-toggle="dropdown">
                                    <div 
                                        class       = "btn btn-sm btn-white-muted"
                                        role        = "button"
                                        data-toggle = "tooltip"
                                        title       = "More"   
                                    ><i class="fas fa-ellipsis-v"></i></div>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right border-0">
                                    <div 
                                        class       = "dropdown-item"
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#viewVisitLogModal"
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View Log Details</span>
                                    </div>
                                    <div class="dropdown-item">
                                        <i class="far fa-edit icon-container"></i>
                                        <span>Override Log Details</span>
                                    </div>
                                </div>
                            </div>
                        `
                    }
                },
            ],
            columnDefs: [{
                targets: [6],
                orderable: false
            }]
        })
    }
}

// If vistingLogsDt is exist, load visting logs datatable
// by establishment_ID from URL
if($('#visitingLogsDT').length) {
    const URLParams = location.pathname.split('/');
    const establishment_ID = URLParams[URLParams.length-1];
    loadVisitingLogsDT(establishment_ID);
}

