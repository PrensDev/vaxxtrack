/**
 * ====================================================================
 * * ACCOUNT METHODS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * user accounts
 * ====================================================================
 */



/**
 * ====================================================================
 * Declare functions here that are required to call on page load
 * ====================================================================
 */

$(() => {
    getAllAccountsAJAX()
});


/**
 * ====================================================================
 * * GET ALL ACCOUNTS
 * ====================================================================
 */

// Get All Accounts AJAX
getAllAccountsAJAX = () => {
    const accountList = $('#accountsList');
    if(accountList.length) {
        $.ajax({
            url: `${ SUPER_ADMIN_API_ROUTE }accounts`,
            type: 'GET',
            headers: AJAX_HEADERS,
            success: result => {
                if(result) {
                    const data = result.data;

                    // Get total account count
                    const accountsCount = data.length;
                    $('#accountListSummary').html(
                        `You already have <b>${ accountsCount }</b> current account` 
                            + (accountsCount > 1 ? 's'  : '')
                    );

                    // Initialize Account Blade
                    var accountBlade = '';

                    // Get all user accounts
                    data.forEach(a => {
                        
                        // Set account icon
                        var accountIcon;
                        if(a.type == 'Email') accountIcon = '<i class="fas fa-envelope"></i>';
                        if(a.type == 'Contact Number') accountIcon = '<i class="fas fa-phone-alt"></i>';
                        
                        // Set account status
                        const accountStatus = a.verified 
                            ? `<i class="fas fa-check text-success ml-1"></i>` 
                            : `<i class="fas fa-info text-warning ml-1"></i>`
                                
                        // Account Blade
                        if(!a.verified) {
                            accountBlade += `
                                <div class="list-group-item px-3 d-flex align-items-start align-sm-items-center">
                                    <div class="icon-container-circle">${ accountIcon }</div>
                                    <div class="ml-1 flex-grow-1 d-sm-flex align-items-center justify-content-between">
                                        <div>
                                            <div>
                                                <span class="font-weight-semibold">${ a.details }</span>
                                                ${ accountStatus }
                                            </div>
                                            <div class="small text-secondary">Added ${ humanizeDate(a.created_datetime) }</div>
                                        </div>
                                        <div class="mt-1 mt-sm-0">
                                            <button 
                                                class       = "btn btn-sm btn-info"
                                                onclick     = "verify('${ a.user_account_ID }')"
                                            >
                                                <i class="fas fa-check mr-sm-1"></i>
                                                <span class="d-none d-sm-inline-block">Verify</span>
                                            </button>
                                            <button 
                                                class       = "btn btn-sm btn-danger"
                                                onclick     = "removeAccount('${ a.user_account_ID }')"
                                            >
                                                <i class="fas fa-trash-alt mr-sm-1"></i>
                                                <span class="d-none d-sm-inline-block">Remove</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            `;
                        } else {
                            accountBlade += `
                                <div class="list-group-item px-3 d-flex align-items-center">
                                    <div class="icon-container-circle">${ accountIcon }</div>
                                    <div>
                                        <div>
                                            <span class="font-weight-semibold">${ a.details }</span>
                                            ${ accountStatus }
                                        </div>
                                        <div class="small text-secondary">Added ${ humanizeDate(a.created_datetime) }</div>
                                    </div>
                                </div>
                            `
                        }
                    });

                    accountList.html(accountBlade);
                }
            }
        });
    }
}


/**
 * ====================================================================
 * * ADD ACCOUNTS
 * ====================================================================
 */

const addAccountForm = $('#addAccountForm');
const addAccountModal = $('#addAccountModal');

// When add account modal is hiddden
addAccountModal.on('hide.bs.modal', () => addAccountForm.trigger('reset'));1

// Validate Add Account Form
addAccountForm.validate(validateOptions({
    rules: {
        email: {
            required: true,
            email: true
        },
    },
    messages: {
        email: {
            required: 'Your email is required',
            email: 'This must be a valid email'
        },
    },
    submitHandler: () => addAccountAJAX()
}));

// Add Account AJAX
addAccountAJAX = () => {
    const form = new FormData(addAccountForm[0]);
    
    data = {
        details: form.get('email'),
        type: 'Email',
        verified: false
    }

    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }add-account`,
        type: 'POST',
        headers: AJAX_HEADERS,
        data: data,
        dataType: 'json',
        success: result=> {
            const data = result.data;
            if(data) {

                // Update accounts list
                getAllAccountsAJAX();

                // Show success alert
                showAlert('success', 'Success! Your account has been added');

                // Hide modal
                addAccountModal.modal('hide');
            } else {
                $('#accountExistsAlertContainer').html(`
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" id="accountExistsAlert">
                        <span class="font-weight-semibold">That account is already used.</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `);
        
                setTimeout(() => $('#accountExistsAlert').alert('close'), 5000);
            }
        }
    })
    .fail(() => console.error('There was an error in adding account'))
}

/**
 * ====================================================================
 * * REMOVE ACCOUNT
 * ====================================================================
 */

// Remove Account
removeAccount = (userAccountID) => {
    alert(userAccountID);
}


/**
 * ====================================================================
 * * CHANGE PASSWORD
 * ====================================================================
 */

const changePasswordForm = $('#changePasswordForm');
const changePasswordModal = $('#changePasswordModal');

// Validate change password form
changePasswordForm.validate(validateOptions({
    rules: {
        currentPassword: {
            required: true
        },
        newPassword: {
            minlength: '8',
            required: true
        },
        retypePassword: {
            required: true,
            equalTo: '#newPassword'
        }
    },
    messages: {
        currentPassword: {
            required: 'Your current password is required'
        },
        newPassword: {
            minlength: 'New password must be 8 random characters and above',
            required: 'Your new password is required'
        },
        retypePassword: {
            required: 'Please re-type your new password here',
            equalTo: 'This must be matched with your new password'
        }
    },
    submitHandler: () => changePasswordAJAX()
}));


// When change password modal is going to be hidden
changePasswordModal.on('hide.bs.modal', () => changePasswordForm.trigger('reset'));


// Change Password AJAX
changePasswordAJAX = () => {
    const form = new FormData(changePasswordForm[0]);

    data = {
        current_password: form.get('currentPassword'),
        new_password: form.get('newPassword'),
        retype_password: form.get('retypePassword')
    }

    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }change-password`,
        type: 'PUT',
        headers: AJAX_HEADERS,
        data: data,
        dataType: 'json',
        success: result => {
            const data = result.data;
            if(data) {

                // Hide change password modal
                changePasswordModal.modal('hide');

                // Show success alert
                showAlert('success', 'Success! Your password has been updated');
            } else {
                $('#passwordAlertContainer').html(`
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" id="passwordAlert">
                        <span class="font-weight-semibold">You current password is wrong</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `);
        
                setTimeout(() => $('#passwordAlert').alert('close'), 5000);
            }
        }
    })
    .fail(() => console.error('There was an error in updating password'));
}