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
        url: `${ SUPER_ADMIN_API_ROUTE }info`,
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
            showFetchErrModal('Your session has been expired');
        }
    })
}


/**
 * ====================================================================
 * * UPDATE INFORMATION
 * ====================================================================
 */

// Update Information AJAX
updateInfoAJAX = () => {
    const form = new FormData($('#editAdminInfoForm')[0]);

    data = {
        first_name: form.get('firstName'),
        middle_name: form.get('middleName'),
        last_name: form.get('lastName'),
    }

    $.ajax({
        url: `${ BASE_URL_API }super-admin/info`,
        type: 'PUT',
        data: data,
        dataType: 'json',
        headers: AJAX_HEADERS,
        success: () => {
            alert('Your information has been updated');
            getInfoAJAX()
        }
    })
    .fail(() => {
        console.log('There was an error in updating infomation')
    });
}

// Validate Edit Admin Information Form
$('#editAdminInfoForm').validate(validateOptions({
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
    submitHandler: () => updateInfoAJAX()
}));