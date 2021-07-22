/**
 * ===========================================================================
 * * COMMON FUNCTIONS FOR HEALTH OFFICIAL PAGES
 * ---------------------------------------------------------------------------
 * This file contains the functions used for citizen views and pages
 * ===========================================================================
 */

/**
 * ====================================================================
 * Declare functions here that are required to call on page load
 * ====================================================================
 */

$(() => {});


/**
 * ===========================================================================
 * * ADD VACCININATION RECORDS
 * ===========================================================================
 */

// Patient Info Fields
patientInfoFields = [
    'patientID',
    'firstName',
    'middleName',
    'lastName',
    'suffixName',
    'birthDate',
    'sex',
    'patientRegion',
    'patientProvince',
    'patientCity',
    'patientBarangay',
    'patientStreet',
    'patientSpecificLocation'
];

// Reset Patient Information Fields
$('#resetPatientInfoFields').on('click', () => {
    patientInfoFields.forEach(f => {
        if(f != 'patientID') {
            const el = $(`#${f}`);
            if(el.hasClass('selectpicker')) {
                el.attr('disabled', false);
                el.selectpicker('refresh');
            } else {
                el.prop('readonly', false);
            }
        }
    })
    resetFields(patientInfoFields)
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

// Reset Vaccination Information Fields
$('#resetCaseInfoFields').on('click', () => {
    resetFields([
        'vaccineUsed',
        'vaccinationDate',
        'vaccinatedBy',
        'vaccinatedIn',
        'remarks'
    ]);
});