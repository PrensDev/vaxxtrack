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
 * UPDATE INFORMATION
 * Send PUT request for updating user information
 * ====================================================================
 */
// TODO: Please insert the update information method here