/**
 * ====================================================================
 * * HEALTH STATUS LOGS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * user accounts
 * ====================================================================
 */


$(() => {
    checkHealthStatusTodayAJAX();
    LoadhealthStatusLogsDT();
});

// Check Health Status Today
checkHealthStatusTodayAJAX = () => {
    $.ajax({
        url: `${ CITIZEN_API_ROUTE }health-status-logs/today`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                if(result.data.length == 0) $('#healthStatusModal').modal('show');
            } else {
                console.log('No result was found');
            }
        }
    })
    .fail(() => {
        console.log('There was an error in getting today\'s health status log');
    });
}

// Create Health Status Log
createHealthStatusLogAJAX = () => {
    const form = new FormData($('#healthStatusForm')[0]);

    const onOrOff = (name) => {
        if(form.get(name) == 'on')
            return true
        else
            return false
    }

    data = {
        temperature:      form.get('temperature'),
        fever:            onOrOff('fever'),
        dry_cough:        onOrOff('dryCough'),
        sore_throat:      onOrOff('soreThroat'),
        breath_shortness: onOrOff('breathShortness'),
        smell_taste_loss: onOrOff('smellTasteLoss'),
        fatigue:          onOrOff('fatigue'),
        aches_pain:       onOrOff('achesPain'),
        runny_nose:       onOrOff('runnyNose'),
        diarrhea:         onOrOff('diarrhea'),
        headache:         onOrOff('headache'),
    }

    $.ajax({
        url: `${ CITIZEN_API_ROUTE }add-health-status-log`,
        type: 'POST',
        data: data,
        dataType: 'json',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                $('#healthStatusModal').modal('hide');
                showAlert('success', 'Success! Your health status for today has been recorded!');
            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => {
        console.log('There is a problem in adding health status log');
    });
}

// Validate Health Status Form
$('#healthStatusForm').validate(validateOptions({
    rules: {
        temperature: {
            required: true,
            range: [30, 42]
        }
    },
    messages: {
        temperature: {
            required: 'Your temperature (in &deg;C) is required',
            range: 'Invalid body temperature'
        }
    },
    submitHandler: () => createHealthStatusLogAJAX()
}))
 

// GET ALL CITIZEN RECORDS

// LOAD CITIZEN DATATABLE
LoadhealthStatusLogsDT = () => {
    const dt = $('#healthStatusLogsDT');

    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ BASE_URL_API }citizen/health-status-logs`,
                type: 'GET',
                headers: AJAX_HEADERS,
            },
            columns: [

                // DATE AND TIME
                {
                    data: null,
                    render: data => {
                    const Createdtime = data.created_datetime;
                    
                    return `
                    <div>${moment(Createdtime).format("MMM. D, YYYY; hh:mm A")}</div>
                    `
                    }
                },

                // TEMPERATURE
                { data: 'temperature' },

                // Overall status

                {
                    data: null,
                    render: data => {
                        const OAS = data.health_status_logs;
                        if(OAS) {
                            overAllStatus = false;
                            if(OAS.fever)            overAllStatus = true;
                            if(OAS.dry_cough)        overAllStatus = true;
                            if(OAS.sore_throat)      overAllStatus = true;
                            if(OAS.breath_shortness) overAllStatus = true;
                            if(OAS.smell_taste_loss) overAllStatus = true;
                            if(OAS.fatigue)          overAllStatus = true;
                            if(OAS.aches_pain)       overAllStatus = true;
                            if(OAS.runny_nose)       overAllStatus = true;
                            if(OAS.diarrhea)         overAllStatus = true;
                            if(OAS.headache)         overAllStatus = true;

                            if(overAllStatus) {
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
                                        <span class="text-uppercase">Healthy</span>
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
                                        data-toggle = "modal"
                                        data-target = "#viewHealthStatusModal"
                                        // onclick     = "viewHealthStatusModal('${ data.Health_Status_Logs}')"
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View Log Details</span>
                                    </div>
                                </div>
                            </div>
                        `
                    }
                },
            ],
            columnDefs: [{
                targets: [3],
                orderable: false,
            }]
        });
    }
}




function getAllHealthStatusLogsAJAX() {
    $.ajax({
        url: `${ BASE_URL_API }citizen/health-status-logs`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                const data = result.data;

                console.log(data);
            } else {
                console.log('No result')
            }
        }
    })
    .fail(() => {
        console.log('Failed to get records')
    })
}

getAllHealthStatusLogsAJAX();