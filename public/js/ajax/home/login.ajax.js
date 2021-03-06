/**
 * ====================================================================
 * * LOGIN METHOD
 * --------------------------------------------------------------------
 * This file contains the methods and functions for user login
 * ====================================================================
 */


/**
 * ====================================================================
 * LOGIN
 * ====================================================================
 */

// Error Alert Blade For Login
var errAlertBladeForLogin = (errMessage) => {
    return `
        <div class="alert alert-danger alert-dismissible fade show font-weight-semibold" role="alert" id="alert">
            <span>
                <i class="bi-exclamation-octagon mr-1 text-danger"></i>
                <span>${ errMessage }</span>
            </span>
            <button class="close" data-dismiss="alert">
                <i class="bi-x"></i>
            </button>
        </div>
    `
}

// Login AJAX
var loginAJAX = () => {

    makeBtnLoading('loginBtn');
    
    // Get data from the form to rawData
    const rawData = new FormData($('#loginForm')[0]);
    
    // Set data properties with rawData values
    const data = {
        auth_details: rawData.get('authDetails'),
        password: rawData.get('password')
    }

    // POST request for login
    $.ajax({
        url: `${ BASE_URL_API }login`,
        type: 'POST',
        data: data,
        dataType: 'json',
        timeout: AJAX_REQUEST_TIMEOUT,
        success: (res) => {
            if (res) {

                // Check if no data had been returned
                if (res.data == null) {
                    $('#password').val('');
                    $('#loginAlertContainer').html(errAlertBladeForLogin(res.message));
                    hideAlert();
                    makeBtnDefault('loginBtn', () => {
                        return `
                            <span>Log in</span>
                            <i class="fas fa-sign-in-alt ml-1"></i>
                        `
                    });
                } else {

                    // Get result data
                    const data = res.data;
                    
                    // Store important data to local storage for session
                    localStorage.setItem('token', data.token);
                    localStorage.setItem('user_ID', data.user_ID);

                    // Set the session data
                    const sessionData = 
                        'token='      + data.token +
                        '&user_ID='   + data.user_ID +
                        '&user_type=' + data.user_type;
                    
                    // Redirect to oAuth
                    window.location.replace(`${ BASE_URL_MAIN }oAuth?${ sessionData }`);
                }
            } else {
                console.log('Some error occured');
            }
        },
        error: (err) => console.log(err)
    })
    .fail(() => {
        $('#errorLog').html('Cannot connect to the server.');
        $('#connErrorModal').modal('show');
    });
}


// Login Form when submit
$('#loginForm').validate(validateOptions({
    rules: {
        authDetails: {
            required: true
        },
        password: {
            required: true
        }
    },
    messages: {
        authDetails: {
            required: 'Your account details is required'
        },
        password: {
            required: 'Your password is required'
        }
    },
    submitHandler: () => loginAJAX()
}));