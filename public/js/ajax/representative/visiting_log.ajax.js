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
 * * GET ALL VISITING LOGS
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

                // Entry log (hidden for default sort)
                { data: 'created_datetime', visible: false },

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
                    class: 'text-nowrap',
                    render: data => {
                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-walking text-secondary"></i>
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
                    render: data => {
                        if(data.health_status_log) {
                            const temp = data.health_status_log.temperature;
                            if(temp > 37.5) return `
                                    <span class="badge alert-danger text-danger p-2 w-100">
                                        <i class="fas fa-temperature-high mr-1"></i>
                                        <span>${ temp }&deg;C</span>
                                    </span>
                                `;
                            else return `
                                    <span class="badge alert-success text-success p-2 w-100">
                                        <i class="fas fa-temperature-low mr-1"></i>
                                        <span>${ temp }&deg;C</span>
                                    </span>
                                `;
                        } else {
                            return `
                                <span class="badge alert-secondary text-secondary p-2 w-100">
                                    <i class="fas fa-thermometer-empty mr-1"></i>
                                    <span>No data</span>
                                </span>
                            `
                        }
                    }
                },

                // Health Status
                {
                    data: null,
                    render: data => {
                        const h = data.health_status_log;
                        if(h) {
                            healthStatus = false;
                            if(h.fever)            healthStatus = true;
                            if(h.dry_cough)        healthStatus = true;
                            if(h.sore_throat)      healthStatus = true;
                            if(h.breath_shortness) healthStatus = true;
                            if(h.smell_taste_loss) healthStatus = true;
                            if(h.fatigue)          healthStatus = true;
                            if(h.aches_pain)       healthStatus = true;
                            if(h.runny_nose)       healthStatus = true;
                            if(h.diarrhea)         healthStatus = true;
                            if(h.headache)         healthStatus = true;

                            if(healthStatus) {
                                return `
                                    <span 
                                        class           = "badge alert-warning text-warning p-2 w-100"
                                        data-toggle     = "tooltip"
                                        data-placement  = "top"
                                        title           = "Has common symptoms"
                                    >
                                        <i class="fas fa-exclamation-triangle mr-1"></i>
                                        <span class="text-uppercase">With Symptoms</span>
                                    </span>
                                `;
                            } else {
                                return `
                                    <span class="badge alert-success text-success p-2 w-100">
                                        <i class="fas fa-check mr-1"></i>
                                        <span class="text-uppercase">No symptoms</span>
                                    </span>
                                `;
                            }
                        } else {
                            return `
                                <span class="badge alert-secondary text-secondary p-2 w-100">
                                    <span class="text-uppercase">No data</span>
                                </span>
                            `;
                        }
                    }
                },
                
                // Allowed
                {
                    data: null,
                    render: data => {
                        const h = data.health_status_log;

                        if(h) {
                            healthStatus = false;
                            if(h.fever)            healthStatus = true;
                            if(h.dry_cough)        healthStatus = true;
                            if(h.sore_throat)      healthStatus = true;
                            if(h.breath_shortness) healthStatus = true;
                            if(h.smell_taste_loss) healthStatus = true;
                            if(h.fatigue)          healthStatus = true;
                            if(h.aches_pain)       healthStatus = true;
                            if(h.runny_nose)       healthStatus = true;
                            if(h.diarrhea)         healthStatus = true;
                            if(h.headache)         healthStatus = true;
    
                            const temp = data.health_status_log.temperature;
    
                            if(healthStatus || temp > 37.5) {
                                return `
                                    <span 
                                        class           = "badge alert-danger text-danger p-2 w-100"
                                        data-toggle     = "tooltip"
                                        data-placement  = "top"
                                        title           = "Not allowed to enter in the establishment"
                                    >
                                        <i class="fas fa-times mr-1"></i>
                                        <span class="text-uppercase">Not allowed</span>
                                    </span>
                                `;
                            } else {
                                return `
                                    <span 
                                        class           = "badge alert-success text-success p-2 w-100"
                                        data-toggle     = "tooltip"
                                        data-placement  = "top"
                                        title           = "Allowed to enter on the establishment"
                                    >
                                        <i class="fas fa-check mr-1"></i>
                                        <span class="text-uppercase">Allowed</span>
                                    </span>
                                `;
                            }
                        } else {
                            return `
                                <span 
                                    class           = "badge alert-success text-success p-2 w-100"
                                    data-toggle     = "tooltip"
                                    data-placement  = "top"
                                    title           = "Allowed to enter on the establishment"
                                >
                                    <i class="fas fa-check mr-1"></i>
                                    <span class="text-uppercase">Allowed</span>
                                </span>
                            `;
                        }
                        
                    }
                },

                // Actions
                {
                    data: null,
                    render: data => {
                        return `
                            <div class="dropdown text-center d-inline-block">
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
                                        onclick     = "viewVisitLog('${ data.visiting_log_ID }')"
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
                targets: [7],
                orderable: false
            }],
            order: [[0, 'desc']],
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

// View Visiting Log
viewVisitLog = (visiting_log_ID) => {
    const URLParams = location.pathname.split('/');
    const establishment_ID = URLParams[URLParams.length-1];

    $.ajax({
        url: `${ REPRESENTATIVE_API_ROUTE }visiting-logs/${ establishment_ID }/${ visiting_log_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                const data = result.data;
                const vlb = data.visiting_log_by;
                const hsl = data.health_status_log;

                // Visitor Details
                $('#visitorDetails').html(`
                    <div class="d-flex align-items-baseline">
                        <div class="icon-container">
                            <i class="fas fa-user-circle text-secondary"></i>
                        </div>
                        <div>
                            <div>${ setFullName('L, F Mi', {
                                firstName: vlb.first_name,
                                middleName: vlb.middle_name,
                                lastName: vlb.last_name
                            }) }</div>
                            <div class="small text-secondary">${ vlb.sex + ', ' + moment().diff(vlb.birth_date, 'years', false) + ' years old' }</div>
                        </div>
                    </div>
                `);
                
                // Entry log
                $('#entryLog').html(`
                    <div class="d-flex align-items-baseline">
                        <div class="icon-container">
                            <i class="fas fa-sign-in-alt text-secondary"></i>
                        </div>
                        <div>
                            <div>${ moment(data.created_datetime).format('dddd, MMMM D, YYYY') }</div>
                            <div>${ moment(data.created_datetime).format('hh:mm A') }</div>
                            <div class="small text-secondary">${ moment(data.created_datetime).fromNow() }</div>
                        </div>
                    </div>
                `);
                
                // Purpose of Visit
                $('#purposeOfVisit').html(data.purpose);
                
                var temp = 0;
                var symptomatic = false;

                if(hsl) {
                    temp = hsl.temperature;

                    if(temp >= 37.5) {
                        $('#visitorTemp').html(`
                            <span class="badge alert-danger text-danger p-2">
                                <i class="fas fa-thermometer-full mr-1"></i>
                                <span>${ temp }</span>
                            </span>
                        `);
                    } else {
                        $('#visitorTemp').html(`
                            <span class="badge alert-success text-success p-2">
                                <i class="fas fa-thermometer-half mr-1"></i>
                                <span>${ temp }</span>
                            </span>
                        `);
                    }

                    symptomatic = 
                        hsl.fever            ||
                        hsl.dry_cough        ||
                        hsl.sore_throat      ||
                        hsl.breath_shortnes  ||
                        hsl.smell_taste_loss ||
                        hsl.fatigue          ||
                        hsl.aches_pain       ||
                        hsl.runny_nose       ||
                        hsl.diarrhea         ||
                        hsl.headache;

                    if(symptomatic) {
                        $('#healthStatus').html(`
                            <span class="badge alert-warning text-warning p-2 text-uppercase">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                <span>With Symptoms</span>
                            </span>
                        `);
                    } else {
                        $('#healthStatus').html(`
                            <span class="badge alert-success text-success p-2 text-uppercase">
                                <i class="fas fa-check mr-1"></i>
                                <span>No symptoms</span>
                            </span>
                        `);
                    }
                } else {
                    $('#visitorTemp').html(`
                        <span class="badge alert-secondary text-secondary p-2">
                            <i class="fas fa-thermometer-empty mr-1"></i>
                            <span>No data</span>
                        </span>
                    `);

                    $('#healthStatus').html(`
                        <span class="badge alert-secondary text-secondary p-2 text-uppercase">
                            <span>No data</span>
                        </span>
                    `);
                }

                if(temp >= 37.5 || symptomatic) {
                    $('#allowedToEnter').html(`
                        <span class="badge alert-danger text-danger p-2 text-uppercase">
                            <i class="fas fa-times mr-1"></i>
                            <span>Not allowed</span>
                        </span>
                    `);
                } else {
                    $('#allowedToEnter').html(`
                        <span class="badge alert-success text-success p-2 text-uppercase">
                            <i class="fas fa-check mr-1"></i>
                            <span>Allowed</span>
                        </span>
                    `);
                }
                
                // Show View Visit Log Modal
                $('#viewVisitLogModal').modal('show');
            } else {
                console.log('No result was found');
            }
        }
    })
    .catch(() => console.error('There was an error while getting the information of a visiting log'));

}