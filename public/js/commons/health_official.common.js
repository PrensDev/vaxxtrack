/**
 * ===========================================================================
 * * COMMON FUNCTIONS FOR HEALTH OFFICIAL PAGES
 * ---------------------------------------------------------------------------
 * This file contains the functions used for citizen views and pages
 * ===========================================================================
 */

/**
 * ===========================================================================
 * ON PAGE LOAD
 * Declare functions and methods that is required to be called when a page is
 * fully loaded
 * ===========================================================================
 */


$('#resetCitizenFields').on('click', () => {
    resetFields([
        'firstName',
        'middleName',
        'lastName',
        'suffixName',
        'birthDate',
        'sex'
    ]);
})