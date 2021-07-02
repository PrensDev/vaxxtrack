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