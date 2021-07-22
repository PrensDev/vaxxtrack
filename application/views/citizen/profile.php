<div class="container px-3 py-sm-3 py-sm-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Your Profile',
        'subtitle' => 'Welcome to your profile page!'
    ]); ?>

    <div id="alertContainer"></div>

    <!-- QR Code ID & Other Dashboard Components Container -->
    <div class="d-flex flex-column flex-xl-row">

        <!-- QR Code ID Section -->
        <div class="mr-xl-3 mb-4 mb-xl-0">

            <!-- QR Code ID -->
            <div class="flex-center">
                <div class="overflow-auto">
                    <div class="card p-2 mb-2 shadow" style="max-width: 320px; min-width: 320px; max-height: 475px; min-height: 475px;">
                        <div class="card-body d-flex flex-column justify-content-between align-items-center">
                            
                            <!-- ID Header -->
                            <div class="mb-3">
                                <div class="flex-center">
                                    <img src="<?= base_url() ?>public/images/brand/icon.png" alt="" style="width: 20px">
                                    <span class="h5 mb-0 font-weight-bold text-primary ml-2">C19CTAVMS</span>
                                </div>
                                <div class="font-weight-semibold text-center text-secondary small">QR Code ID</div>
                            </div>

                            <!-- Citizen Details -->
                            <div class="mb-2">
                                <h6 class="text-uppercase font-weight-bold my-0 text-center" id="userFullNameForQRCodeID"></h6>
                            </div>
                            
                            <!-- QR Code -->
                            <div 
                                class       = "p-3 my-2 rounded border" 
                                id          = "citizenQRCodeInID"
                                role        = "button"
                                data-toggle = "modal"
                                data-target = "#citizenQRCodeModal"
                            ></div>
                                
                            <div class="badge border border-secondary text-secondary"><?= $this->session-> user_ID ?></div>
                            
                            <!-- ID Usage -->
                            <div class="small text-center mt-3">Use this QR Code when entering to any establishments for the purpose of COVID-19 Contact Tracing</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Actions -->
            <div class="mb-4">
                <button class="btn btn-sm btn-blue btn-block">
                    <span>Print my QR Code ID</span>
                    <i class="fas fa-print ml-1"></i>
                </button>
                <button 
                    class       = "btn btn-sm btn-primary btn-block"
                    data-toggle = "modal"
                    data-target = "#scanQRCodeModal"
                >
                    <span>Scan Establishment QR Code</span>
                    <i class="fas fa-expand ml-1"></i>
                </button>
            </div>
        </div>

        <!-- Dashboard Components Section -->
        <div>

            <!-- COVID-19 News -->
            <div class="card mb-4">
                <div class="card-body bg-waves p-3 p-sm-5">
                    <div class="row">
                        <div class="col-12 col-md-7 order-1 order-md-0 text-center text-sm-left">
                            <h1>Good Day, <span id="userFirstNameForGreet"></span>!</h1>
                            <h5>Everyone's health is our concern</h5>
                            <p class="mt-2">
                                Keep posted on any updates and developments regarding the coronavirus disease (COVID 19). 
                            </p>
                            
                            <a 
                                href   = "https://www.who.int/emergencies/diseases/novel-coronavirus-2019/media-resources/news" 
                                target = "_blank" 
                                class  = "btn btn-primary mt-3"
                            >
                                <span>Check latest news about COVID-19</span>
                                <i class="fas fa-caret-right ml-1"></i>
                            </a>
                        </div>
                        <div class="col-12 col-md-5 order-0 order-md-1 mb-3 mb-md-0">
                            <img 
                                class     = "w-100" 
                                src       = "<?= base_url() ?>public/images/brand/fighting_virus.png" 
                                alt       = "Person Fighting Virus"
                                draggable = "false"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Check/Monitor Health Status -->
            <div class="card mb-4">
                <div class="card-body p-md-5">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8 order-1 order-md-0">
                            <h3>Monitor your health status</h3>
                            <p>
                                Assess your health and check your daily health status.
                            </p>
                            <div class="text-right text-md-left">
                                <a href="<?= base_url() ?>c/health-status" class="btn btn-primary">Check now!</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 order-0 order-md-1 mb-3 mb-md-0 flex-center">
                            <img 
                                class     = "w-100" 
                                src       = "<?= base_url() ?>public/images/brand/health_status.svg" 
                                alt       = ""
                                draggable = "false"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trace Visited Establishments -->
            <div class="card mb-4">
                <div class="card-body p-md-5">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4 mb-3 mb-md-0 flex-center">
                            <img 
                                class     = "w-100" 
                                src       = "<?= base_url() ?>public/images/brand/walk_city.svg" 
                                alt       = ""
                                draggable = "false"
                            >
                        </div>
                        <div class="col-12 col-md-8">
                            <h3>Trace the Establishments you visit</h3>
                            <p>
                                Be mindful of your surroundings. Keep tabs on every establishment you visited for the past few days.
                            </p>
                            <div class="text-right text-md-left">
                                <a href="<?= base_url() ?>c/visiting-logbook" class="btn btn-primary">Check my visiting logbook</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Settings and Edit Information-->
    <div class="row">

        <!-- Account Settings -->
        <div class="col-12 col-md-6 mb-4">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <img 
                            class     = "w-50" 
                            src       = "<?= base_url() ?>public/images/brand/security.svg" 
                            alt       = "Secure Account"
                            draggable = "false"
                        >
                    </div>
                    <div>
                        <h4>Manage your accounts</h4>
                        <p>
                            Manage your information and privacy to make this web application work for you.
                        </p>
                        <div class="text-right">
                            <a href="<?= base_url() ?>r/account-settings" class="btn btn-danger">
                                <span>Manage</span>
                                <i class="fas fa-cogs ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Information -->
        <div class="col-12 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <img 
                            class     = "w-50" 
                            src       = "<?= base_url() ?>public/images/brand/information.svg" 
                            alt       = "Edit Information"
                            draggable = "false"
                        >
                    </div>
                    <div>
                        <h4>Edit your information</h4>
                        <p>
                            Modify and update your personal information.
                        </p>
                        <div class="text-right">
                            <a href="<?= base_url() ?>r/edit-information" class="btn btn-blue">
                                <span>Edit</span>
                                <i class="fas fa-edit ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>