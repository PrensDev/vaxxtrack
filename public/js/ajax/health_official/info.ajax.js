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
       url: `${ BASE_URL_API }health-official/info`,
       type: 'GET',
       headers: {
           Accept: 'application/json',
           Authorization: `Bearer ${ localStorage.getItem('token') }`
       },
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
               
               // Display Full Name for QR Code ID
               $('#userFullNameForQRCodeID').html(userFullName);
   
               // Display First Name for Greetings
               $('#userFirstNameForGreet').html(data.first_name);
   
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