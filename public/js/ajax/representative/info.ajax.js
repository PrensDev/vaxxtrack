/**
 * ====================================================================
 * * INFORMATION METHOD
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * user information
 * ====================================================================
 */


/**
 * ====================================================================
 * Declare constant variables here
 * ====================================================================
 */

const headers =  {
    Accept: 'application/json',
    Authorization: `Bearer ${ localStorage.getItem('token') }`
}


/**
 * ====================================================================
 * Declare functions here that are required to call on page load
 * ====================================================================
 */

$(() => {
    getInfoAJAX();
});


/**
 * ====================================================================
 * GET INFORMATION
 * Send GET request for user information
 * ====================================================================
 */
getInfoAJAX = () => {
    $.ajax({
        url: `${ BASE_URL_API }representative/info`,
        type: 'GET',
        headers: headers,
        success: (res) => {
            if(res) {
                
                // Get data from response
                var data = res.data;

                // Check first if user's middle name is null or blank
                var userHasNoMiddleName = data.middle_name == null || data.middle_name === '';
                var userMiddleName = userHasNoMiddleName ?  ' ' : ' ' + data.middle_name + ' ';

                // Get user full name
                var userFullName = data.first_name + userMiddleName + data.last_name;
                
                // Display Name for Topbar
                $('#userFullNameForTopbar').html(userFullName);
                $('#userFirstNameForTopbar').html(data.first_name);

                // Display First Name for Greetings
                $('#userFirstNameForGreet').html(data.first_name);

                $('#userFullNamePreviewForEdit').html(userFullName);

                // Set Form Values for Updating User Information
                $('#firstNameInput').val(data.first_name);
                $('#middleNameInput').val(data.middle_name);
                $('#lastNameInput').val(data.last_name);
                $('#suffixNameInput').val(data.suffix_name);
            } else {
                showFetchErrModal('No data has been retrieved');
            }
        },
        error: () => {
            // showFetchErrModal('Your session has been expired');
        }
    })
    .fail(() => showConnErrModal('Cannot connect to the server'));
}


/**
 * ====================================================================
 * UPDATE INFORMATION
 * Send PUT request for updating user information
 * ====================================================================
 */

// Update Information AJAX
updateInfoAJAX = () => {
    
    // Get data from form to rawData
    var rawData = new FormData($('#editRepInfoForm')[0]);
    
    // Set property with rawData values
    var data = {
        first_name: rawData.get('firstName'),
        middle_name: rawData.get('middleName'),
        last_name: rawData.get('lastName'),
        suffix_name: rawData.get('suffixName'),
    }

    // Send PUT request
    $.ajax({
        url: `${ BASE_URL_API }representative/info`,
        type: 'PUT',
        headers: AJAX_HEADERS,
        data: data,
        success: () => location.reload(),
        error: (err) => console.log(err) 
    })
    .fail(() => showConnErrModal('Cannot connect to the server'));
}


// Validate Edit Representative Information Form and handle submit
$('#editRepInfoForm').validate(validateOptions({
    rules: {
        firstName: {
            required: true
        },
        lastName: {
            required: true
        },
    },
    messages: {
        firstName: {
            required: 'Your first name is required'
        },
        lastName: {
            required: 'Your last name is required'
        },
    },
    submitHandler: () => updateInfoAJAX()
}));