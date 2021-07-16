<!-- Add Another Account Modal -->
<div class="modal" id="addAccountModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form id="addAccountForm" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-user-plus"></h5>
                <h5 class="modal-title">Add another account</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    class        = "close" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div id="accountExistsAlertContainer"></div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email" 
                        class="form-control"
                        placeholder="Type your email here"
                    >
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-blue">
                    <span>Add</span>
                    <i class="fas fa-plus ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form id="changePasswordForm" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-user-lock"></h5>
                <h5 class="modal-title">Change Password</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    class        = "close" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div id="passwordAlertContainer"></div>
                
                <!-- Current Password -->
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <input 
                        type="password" 
                        id="currentPassword" 
                        name="currentPassword" 
                        class="form-control"
                        placeholder="Type your current password here"
                    >
                </div>

                <!-- New Password -->
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input 
                        type="password" 
                        id="newPassword" 
                        name="newPassword" 
                        class="form-control"
                        placeholder="Type your new password here"
                    >
                </div>

                <!-- Re-type Password -->
                <div class="form-group">
                    <label for="retypePassword">Re-type new password to confirm</label>
                    <input 
                        type="password" 
                        id="retypePassword" 
                        name="retypePassword" 
                        class="form-control"
                        placeholder="Re-type your password here to confirm"
                    >
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-blue">
                    <span>Save</span>
                    <i class="fas fa-check ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>
