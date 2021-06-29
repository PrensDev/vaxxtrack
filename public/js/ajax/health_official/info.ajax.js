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
        url: `${ HEALTH_OFFICIAL_API_ROUTE }info`,
        type: 'GET',
        headers: AJAX_HEADERS,
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
                
                // Display Full Name for Edit Preview
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

// Update Info AJAX
updateInfoAJAX = () => {
    const form = new FormData($('#editHealthOfficialInfoForm')[0]);

    const data = {
        first_name: form.get('firstName'),
        middle_name: form.get('middleName'),
        last_name: form.get('lastName'),
    }

    $.ajax({
        url: `${ BASE_URL_API }health-official/update-info`,
        type: 'PUT',
        data: data,
        dataType: 'json',
        headers: AJAX_HEADERS,
        success: () => {
            alert('Your information has been updated');
            getInfoAJAX();
        }
    })
    .fail(() => {
        console.log('There was an error in updating information')
    })
}

// Validate Health Official Form
$('#editHealthOfficialInfoForm').validate(validateOptions({
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
            required: 'First name is required'
        },
        lastName: {
            required: 'Last name is required'
        },
    },
    submitHandler: () => updateInfoAJAX()
}))