/**
 * ====================================================================
 * * HEALTH STATUS LOGS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * user accounts
 * ====================================================================
 */

$(() => {
    // $('#healthStatusModal').modal('show');
});


$.ajax({
    url: `${ CITIZEN_API_ROUTE }health-status-logs/today`,
    type: 'GET',
    headers: AJAX_HEADERS,
    success: (result) => {
        if(result) {
            const data = result.data;

            if(data) {
                console.log(data);
            } else {
                console.log('No data');
            }
        } else {
            console.log('No result was found');
        }
    }
})
.fail(() => {
    console.log('There was an error in getting today\'s health status log');
})