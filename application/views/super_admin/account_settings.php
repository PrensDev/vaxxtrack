<div class="container p-3">

    <!-- Form header -->
    <div class="my-4">
        <h2 class="m-0">Account Settings</h2>
        <p class="text-secondary mb-0">Select the information you want to change settings</p>
    </div>

    <div id="alertContainer"></div>

    <!-- User Accounts -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-user-lock mr-1"></i>
                <span>Your accounts</span>
            </div>
        </div>
        <div class="card-body">
            <p id="accountListSummary"></p>
            
            <!-- Accounts List -->
            <div class="list-group" id="accountsList"></div>

            <!-- Add Account -->
            <div class="mt-3 text-center">
                <button 
                    class       = "btn btn-primary btn-sm"
                    data-toggle = "modal"
                    data-target = "#addAccountModal"
                >
                    <i class="fas fa-plus mr-1"></i>
                    <span>Add another account</span>
                </button>
            </div>
        </div>
    </div>

    <!-- User Password -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-key mr-1"></i>
                <span>Password</span>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <p>Choose the settings you want to proceed</p>
            </div>

            <div class="list-group list-group-flush">
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="font-weight-semibold">Change you password?</div>
                    <div>
                        <button 
                            class="btn btn-blue btn-sm"
                            data-toggle = "modal"
                            data-target = "#changePasswordModal"
                        >
                            <i class="fas fa-edit mr-1"></i>
                            <span>Change</span>
                        </button>
                    </div>
                </div>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="font-weight-semibold">Did you forgotten your password?</div>
                    <div>
                        <button 
                            class       = "btn btn-primary btn-sm"
                            data-toggle = "modal"
                            data-target = "#recoverModal"
                        >
                            <i class="fas fa-sync mr-1"></i>
                            <span>Recover</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>