/**
 * ===========================================================================
 * * COMMON FUNCTIONS FOR SUPER ADMIN PAGES
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

initDataTables([

    // COVID-19 Cases
    'covidCasesDT',

    // User Management
    'citizensDT',
    'representativesDT',
    'healthOfficialsDT',
    'superAdminsDT',

    // Vaccination Management
    'vaccAppointmentsDT',
    'vaccRecordsDT',
]);