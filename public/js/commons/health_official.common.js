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
 * ===========================================================================
 */



/**
 * ===========================================================================
 * * ADD VACCININATION RECORDS
 * ===========================================================================
 */

// Reset Patient Information Fields
$('#resetPatientInfoFields').on('click', () => {
    resetFields([
        'firstName',
        'middleName',
        'lastName',
        'suffixName',
        'birthDate',
        'sex'
    ]);
});

// Reset Vaccination Information Fields
$('#resetVaccInfoFields').on('click', () => {
    resetFields([
        'vaccineUsed',
        'vaccinationDate',
        'vaccinatedBy',
        'vaccinatedIn',
        'remarks'
    ]);
});