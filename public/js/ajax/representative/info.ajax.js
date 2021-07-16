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
 * * GET INFORMATION
 * ====================================================================
 */

// Get Information AJAX
getInfoAJAX = () => {
    $.ajax({
        url: `${ REPRESENTATIVE_API_ROUTE }info`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (res) => {
            if(res) {
                
                // Get data from response
                var data = res.data;

                // Get user full name
                var userFullName = setFullName('F M L', {
                    firstName: data.first_name,
                    middleName: data.middle_name,
                    lastName: data.last_name
                });
                
                // Display Name for Topbar
                $('#userNameForNavbar').html(data.first_name);
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
 * * UPDATE INFORMATION
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
    c19ctavms_API.sendUserRequest({
        url: 'representative/info',
        type: 'PUT',
        data: data,
        success: () => {
            getInfoAJAX()
            $.ajax({
                url: `${ BASE_URL_MAIN }alert`,
                type: 'POST',
                data: {
                    theme: 'success',
                    message: 'Success! Your information has been updated'
                },
                success: () => location.replace(`${ BASE_URL_MAIN }r`)
            });
        }
    });
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