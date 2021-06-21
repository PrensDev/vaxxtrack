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
 * Declare functions here that are required to render data
 * ====================================================================
 */

liveRenderData(() => {
    if($('#casesSummaryContainer').length) getCasesStatusData();
});


/**
 * ====================================================================
 * CASES STATUS
 * ====================================================================
 */

function getCasesStatusData() {
    $.ajax({
        url: `${ BASE_URL_API }covid-cases-status`,
        type: 'GET',
        success: (result) => {
            c = result.cases_status_data;

            $('#totalCasesData').html(c.all);
            $('#activeCasesData').html(c.active.all)
            $('#asymptomaticCasesData').html(c.active.asymptomatic);
            $('#mildCasesData').html(c.active.mild);
            $('#severeCasesData').html(c.active.severe);
            $('#criticalCasesData').html(c.active.critical);
            $('#recoveredCasesData').html(c.recovered);
            $('#diedCasesData').html(c.died);
        }
    });
}