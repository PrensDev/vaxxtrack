<div class="container p-3">

    <!-- Form header -->
    <div class="my-4">
        <h2 class="m-0">Account Settings</h2>
        <p class="text-secondary mb-0">Select the information you want to change settings</p>
    </div>
 
    <!-- User Accounts -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-user-lock mr-1"></i>
                <span>Your accounts</span>
            </div>
        </div>
        <div class="card-body">
            <p>You already have 2 current active accounts</p>
            
            <!-- Account List -->
            <div class="list-group">
                <div class="list-group-item d-flex align-items-center">
                    <div class="icon-container-circle">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="ml-1">
                        <div>
                            <span class="font-weight-semibold text-truncate mw-100">jetsunprincetorres@gmail.com</span>
                            <i 
                                class          = "fas fa-check text-success ml-1"
                                data-toggle    = "tooltip"
                                data-placement = "top"
                                title          = "Verified"
                            ></i>
                        </div>
                        <div class="mt-1">
                            <div 
                                class          = "badge text-info alert-info p-2 text-uppercase"
                                data-toggle    = "tooltip"
                                data-placement = "top"
                                title          = "This is your primary account"
                            >Primary</div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item d-flex align-items-center">
                    <div class="icon-container-circle">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="ml-1">
                        <div>
                            <span class="font-weight-semibold">0912345679</span>
                            <i 
                                class          = "fas fa-check text-success ml-1"
                                data-toggle    = "tooltip"
                                data-placement = "top"
                                title          = "Verified"
                            ></i>
                        </div>
                        <div class="mt-1">
                            <button 
                                class       = "btn btn-sm btn-info"
                                data-toggle = "modal"
                                data-target = "#makeAsPrimaryModal"
                            >Make as Primary</button>
                            <button 
                                class       = "btn btn-sm btn-danger"
                                data-toggle = "modal"
                                data-target = "#removeAccountModal"
                            >
                                <i class="fas fa-trash-alt mr-1"></i>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="list-group-item d-flex align-items-center">
                    <div class="icon-container-circle">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="ml-1">
                        <div>
                            <span class="font-weight-semibold">0912345679</span>
                            <i 
                                class          = "fas fa-exclamation text-warning ml-1"
                                data-toggle    = "tooltip"
                                data-placement = "top"
                                title          = "Need to verify"
                            ></i>
                        </div>
                        <div class="mt-1">
                            <button 
                                class       = "btn btn-sm btn-blue"
                                data-toggle = "modal"
                                data-target = "#verifyAccountModal"
                            >
                                <span>Verify</span>
                            </button>
                            <button 
                                class       = "btn btn-sm btn-danger"
                                data-toggle = "modal"
                                data-target = "#removeAccountModal"
                            >
                                <i class="fas fa-trash-alt mr-1"></i>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

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
                        <button class="btn btn-blue btn-sm">
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