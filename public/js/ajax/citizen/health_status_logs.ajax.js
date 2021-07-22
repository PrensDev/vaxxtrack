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


/**
 * ====================================================================
 * * CHECK HEALTH STATUS TODAY
 * ====================================================================
 */

// Check Health Status Today
checkHealthStatusTodayAJAX = () => {
    $.ajax({
        url: `${ CITIZEN_API_ROUTE }health-status-logs/check-today`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                if(result.data.length == 0) $('#healthStatusModal').modal('show');
                else {
                    $('#healthStatusModal').modal('hide'); 
                    $('#healthStatusModal').modal('dispose');
                } 
            } else {
                console.log('No result was found');
            }
        }
    })
    .fail(() => console.error('There was an error in getting today\'s health status log'));
}

// Create Health Status Log
createHealthStatusLogAJAX = () => {
    $('#saveHealthStatus').prop('disabled', true);
    $('#saveHealthStatus').html(`
        <span class="spinner-border spinner-border-sm mx-3" role="status" aria-hidden="true"></span>
    `);
    
    const form = new FormData($('#healthStatusForm')[0]);

    const onOrOff = (name) => { return form.get(name) === 'on' }

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
                $('#healthStatusModal').modal('dispose');
                if($('#healthStatusLogsDT').length) reloadDataTable('#healthStatusLogsDT');
                showAlert('success', 'Success! Your health status for today has been recorded!');
            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => console.error('There is a problem in adding health status log'));
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
}));



// Update Health Status Log
updateHealthStatusLogAJAX = () => {
    makeBtnLoading('saveHealthStatusForUpdate');
    
    const form = new FormData($('#updateHealthStatForm')[0]);

    const onOrOff = (name) => { return form.get(name) === 'on' }

    data = {
        health_status_log_ID: form.get('healthStatusLogID'),
        temperature:          form.get('temperature'),
        fever:                onOrOff('fever'),
        dry_cough:            onOrOff('dryCough'),
        sore_throat:          onOrOff('soreThroat'),
        breath_shortness:     onOrOff('breathShortness'),
        smell_taste_loss:     onOrOff('smellTasteLoss'),
        fatigue:              onOrOff('fatigue'),
        aches_pain:           onOrOff('achesPain'),
        runny_nose:           onOrOff('runnyNose'),
        diarrhea:             onOrOff('diarrhea'),
        headache:             onOrOff('headache'),
    }

    $.ajax({
        url: `${ CITIZEN_API_ROUTE }health-status-logs/today`,
        type: 'PUT',
        data: data,
        dataType: 'json',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                $('#updateCurrHealthStatModal').modal('hide');
                if($('#healthStatusLogsDT').length) reloadDataTable('#healthStatusLogsDT');
                showAlert('success', 'Success! Your health status for today has been updated!');
                makeBtnDefault('saveHealthStatusForUpdate', `<span>Save</span><i class="fas fa-check ml-1"></i>`);
            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => console.error('There is a problem in updating health status log'));
}

// Validate Health Status Form
$('#updateHealthStatForm').validate(validateOptions({
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
    submitHandler: () => updateHealthStatusLogAJAX()
}));



/**
 * ====================================================================
 * * GET ALL HEALTH STATUS LOGS
 * ====================================================================
 */

// Load Health Status Log DataTable
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

                // Date and Time recorded (hidden for default sort)
                { data: 'created_datetime', visible: false },

                // Date and Time recorded
                {
                    data: null,
                    class: 'text-nowrap',
                    render: data => {
                        const recorded = moment(data.created_datetime).format("MMMM D, YYYY; hh:mm A");
                        const humanizedRecorded = humanizeDate(data.created_datetime);
                        const today= moment(data.created_datetime).format('MMMM D, YYYY') ==  moment().format('MMMM D, YYYY');
                        
                        if(today) return `
                                <div class="d-flex align-items-baseline">
                                    <div class="icon-container">
                                        <i class="fas fa-edit text-info"></i>
                                    </div>
                                    <div>
                                        <div>${recorded} <span class="badge alert-info text-info ml-2">Today</span></div>
                                        <div class="text-secodnary small">You recorded this ${humanizedRecorded}</div>
                                    </div>
                                </div>
                            `;
                        else return `
                                <div class="d-flex align-items-baseline">
                                    <div class="icon-container">
                                        <i class="fas fa-edit text-info"></i>
                                    </div>
                                    <div>
                                        <div>${recorded}</div>
                                        <div class="text-secodnary small">Recorded ${humanizedRecorded}</div>
                                    </div>
                                </div>
                            `;
                    }
                },

                // Temperature
                { 
                    data: null,
                    render: data => {
                        const temp = data.temperature;
                        if(temp >= 37.5) return `
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
                    }
                },

                // Overall status

                {
                    data: null,
                    render: data => {
                        symptomatic = false;
                        if(data.fever)            symptomatic = true;
                        if(data.dry_cough)        symptomatic = true;
                        if(data.sore_throat)      symptomatic = true;
                        if(data.breath_shortness) symptomatic = true;
                        if(data.smell_taste_loss) symptomatic = true;
                        if(data.fatigue)          symptomatic = true;
                        if(data.aches_pain)       symptomatic = true;
                        if(data.runny_nose)       symptomatic = true;
                        if(data.diarrhea)         symptomatic = true;
                        if(data.headache)         symptomatic = true;

                        if(symptomatic) return `
                                <span class="badge alert-warning text-warning p-2 w-100">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    <span class="text-uppercase">With Symptoms</span>
                                </span>
                            `;
                        else return `
                                <span class="badge alert-success text-success p-2 w-100">
                                    <i class="fas fa-check mr-1"></i>
                                    <span class="text-uppercase">Healthy</span>
                                </span>
                            `;
                    }
                },

                // Actions
                {
                    data: null,
                    class: 'text-center',
                    render: data => {
                        const id = data.health_status_log_ID;
                        return `
                            <button class="btn btn-sm btn-white-muted" onclick="viewHealthStatusLog('${ id }')">
                                <i class="far fa-file-alt"></i>
                            </button
                        `;
                    }
                },
            ],
            columnDefs: [{
                targets: [4],
                orderable: false,
            }],
            order: [[0, 'desc']],
            language: {
                emptyTable: `<div class="py-5 rounded-lg text-secondary">No health status log yet</div>`
            }
        });
    }
}

// View Health Status Log
viewHealthStatusLog = (id) => {
    $.ajax({
        url: `${ CITIZEN_API_ROUTE }health-status-logs/${ id }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                const data = result.data;
                console.log(data);

                // Get Date and Time Recorded
                const recorded = data.created_datetime;
                const recordedBlade = `
                    <div class="d-flex align-items-baseline">
                        <div class="icon-container">
                            <i class="fas fa-edit text-info"></i>
                        </div>
                        <div>
                            <div>${ moment(recorded).format('dddd, MMMM D, YYYY') }</div>
                            <div>${ moment(recorded).format('hh:mm A') }</div>
                            <div class="text-secondary small">${ humanizeDate(recorded) }</div>
                        </div>
                    </div>
                `;
                $('#recordedDatetime').html(recordedBlade);

                // Get Temperature
                const temp = data.temperature;
                if(temp >= 37.5) {
                    $('#recordedTemp').html(`
                        <span class="badge alert-danger text-danger p-2">
                            <i class="fas fa-temperature-high mr-1"></i>
                            <span>${ temp }&deg;C</span>
                        </span>
                    `);
                } else {
                    $('#recordedTemp').html(`
                        <span class="badge alert-success text-success p-2">
                            <i class="fas fa-temperature-low mr-1"></i>
                            <span>${ temp }&deg;C</span>
                        </span>
                    `);
                }

                // Get Health Status and Overall
                var symptomaticOverall = false;
                var healthStatusBlade = '';
                const symptomaticBlade = (symptomatic, label) => {

                    // Set if symtomatic
                    if(symptomatic) symptomaticOverall = true;

                    // Health Status Blade
                    healthStatusBlade += `
                        <div class="d-flex align-items-baseline">
                            <div class="icon-container">
                                <i class="fas
                        `;
                    healthStatusBlade += symptomatic 
                        ? ` fa-exclamation text-warning`
                        : ` fa-times text-danger`;
                    healthStatusBlade += `"></i></div><div>${ label }</div></div>`;
                };
                symptomaticBlade(data.fever            , 'Fever');
                symptomaticBlade(data.dry_cough        , 'Dry Cough');
                symptomaticBlade(data.sore_throat      , 'Sore Throat');
                symptomaticBlade(data.breath_shortness , 'Shortness of breath');
                symptomaticBlade(data.smell_taste_loss , 'Loss of Smell and Taste');
                symptomaticBlade(data.fatigue          , 'Fatigue');
                symptomaticBlade(data.aches_pain       , 'Aches and Pain');
                symptomaticBlade(data.runny_nose       , 'Runny Noses');
                symptomaticBlade(data.diarrhea         , 'Diarrhea');
                symptomaticBlade(data.headache         , 'Headache');
                
                $('#recordedHealthStatus').html(healthStatusBlade);

                if(symptomaticOverall) {
                    const today = moment(data.created_datetime).format('MMMM D, YYYY') == moment().format('MMMM D, YYYY');
                    var withSymptomsBlade = `
                        <span class="badge alert-warning text-warning p-2">
                            <i class="fas fa-exclamation-triangle mr-1"></i>
                            <span class="text-uppercase">With Symptoms</span>
                        </span>
                    `
                    if(today) withSymptomsBlade += `
                            <p class="text-danger small mt-2">You have common symptoms of COVID-19. We suggest to isolate yourself and take a rest. Please take a check up with your doctor or go to any healthcare establishment for assistance.</p>
                        `;
                    $('#overallStatus').html(withSymptomsBlade);
                } else {
                    $('#overallStatus').html(`
                        <span class="badge alert-success text-success p-2">
                            <i class="fas fa-check mr-1"></i>
                            <span class="text-uppercase">Healthy</span>
                        </span>
                    `);
                }

                // Show health status log details modal
                $('#viewHealthStatusLogModal').modal('show');
            } else {
                console.log('No result was found');
            }
        }
    })
    .fail(() => console.error('There was an error in getting a health status log'));
}

// When update current health status button has been clicked
$('#updateCurrHealthStatBtn').on('click', () => {
    $.ajax({
        url: `${ CITIZEN_API_ROUTE }health-status-logs/today`,
        headers: AJAX_HEADERS,
        type: 'GET',
        success: result => {
            if(result) {
                const data = result.data;
                console.log(data);

                var noSymptoms = true;
                
                const onOrOff = (id, value) => {
                    $(id).prop('checked', value);
                    if(value) noSymptoms = false;
                }

                $('#healthStatusLogIDForToday').val(data.health_status_log_ID);
                $('#temperatureForUpdate').val(data.temperature);
                onOrOff('#feverForUpdate', data.fever);
                onOrOff('#dryCoughForUpdate', data.dry_cough);
                onOrOff('#soreThroatForUpdate', data.sore_throat);
                onOrOff('#breathShortnessForUpdate', data.breath_shortness);
                onOrOff('#smellTasteLossForUpdate', data.smell_taste_loss);
                onOrOff('#fatigueForUpdate', data.fatigue);
                onOrOff('#achesPainForUpdate', data.aches_pain);
                onOrOff('#runnyNoseForUpdate', data.runny_nose);
                onOrOff('#diarrheaForUpdate', data.diarrhea);
                onOrOff('#headacheForUpdate', data.headache);
                
                $('#healthyForUpdate').prop('checked', noSymptoms);

                $('#saveHealthStatusForUpdate').prop('disabled', false);

                $('#updateCurrHealthStatModal').modal('show');
            }
        }
    })
    .fail(() => console.error('There was an error in getting current health status'))
});