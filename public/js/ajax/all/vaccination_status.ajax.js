/**
 * ====================================================================
 * * CASES STATUS METHOD
 * --------------------------------------------------------------------
 * This file contains the methods and functions for fetching COVID-19 
 * cases status data
 * ====================================================================
 */

/**
 * ====================================================================
 * Declare functions here that are required to render data on the page
 * ====================================================================
 */

liveRenderData(() => {
    if($('#vaccRecordsCountContainer').length) getVaccRecordsStatusData();
    if($('#vaccAppointmentsCountContainer').length) getVaccAppointmentsStatusData();
});


/**
 * ====================================================================
 * VACCINATION RECORDS STATUS
 * ====================================================================
 */

function getVaccRecordsStatusData() {
    $.ajax({
        url: `${ BASE_URL_API }vaccination-records-status`,
        type: 'GET',
        success: (result) => $('#vaccRecordsCountData').html(result.vaccination_record_status)
    });
}


/**
 * ====================================================================
 * VACCINATION RECORDS STATUS
 * ====================================================================
 */

function getVaccAppointmentsStatusData() {
    $.ajax({
        url: `${ BASE_URL_API }vaccination-appointments-status`,
        type: 'GET',
        success: (result) => {
            v = result.vaccination_appointments_status;

            $('#vaccAppointmentsCountData').html(v.all);
            $('#vaccPendingAppointmentsCountData').html(v.pending);
            $('#vaccApprovedAppointmentsCountData').html(v.approved);
            $('#vaccRejectedAppointmentsCountData').html(v.rejected);

            $('#registeredForVaccCountData').html(v.pending);
        }
    });
}