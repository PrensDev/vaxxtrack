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
        url: `${ CITIZEN_API_ROUTE }info`,
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
                userNameForNavbar
                $('#userNameForNavbar').html(data.first_name);
                $('#userFullNameForTopbar').html(userFullName);
                $('#userFirstNameForTopbar').html(data.first_name);

                // Display First Name for Greetings
                $('#userFirstNameForGreet').html(data.first_name);

                // Display Full Name for Edit Preview
                $('#userFullNameForQRCodeID').html(userFullName);

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
    const form = new FormData($('#editCitizenInfoForm')[0]);

    data = {
        first_name: form.get('firstName'),
        middle_name: form.get('middleName'),
        last_name: form.get('lastName'),
        suffix_name: form.get('suffixName'),
    }

    c19ctavms_API.sendUserRequest({
        url: 'citizen/info',
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
                success: () => location.replace(`${ BASE_URL_MAIN }c`)
            });
        }
    });
}
// Validate Edit Representative Information Form
$('#editRepInfoForm').validate(validateOptions({
    rules: {
        firstName: {
            required: true
        },
        lastName: {
            required: true
        }
    },
    messages: {
        firstName: {
            required: 'First name is required'
        },
        lastName: {
            required: 'Last name is required'
        }
    },
    submitHandler: () => alert('Form is submitted')
}))