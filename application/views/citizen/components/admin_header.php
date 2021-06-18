<!-- Navbars -->
<div class="sb-nav-fixed">

    <!-- Top Bar -->
    <?php $this->load->view('all/components/admin_topbar')?> 

    <!-- Main Body -->
    <div id="layoutSidenav">
        
        <!-- Sidebar -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light">

                <!-- Sidenav Menu -->
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        
                        <!-- Core -->
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= base_url() ?>c" draggable="false">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-id-card-alt icon-container"></i>
                            </div>
                            <span>Your Profile</span>
                        </a>
                        <div 
                            class       = "nav-link" 
                            role        = "button" 
                            data-toggle = "modal" 
                            data-target = "#scanQRCodeModal"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-expand icon-container"></i>
                            </div>
                            <span>Scan QR Code</span>
                        </div>
                        <a class="nav-link" href="<?= base_url() ?>c" draggable="false">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-briefcase-medical icon-container"></i>
                            </div>
                            <span>Health status</span>
                        </a>
                        <a class="nav-link" href="<?= base_url() ?>c/visiting-logbook" draggable="false">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-book icon-container"></i>
                            </div>
                            <span>Visiting Logbook</span>
                        </a>

                        <div class="sb-sidenav-menu-divider"></div>


                        <!-- Contact Tracing -->
                        <div class="sb-sidenav-menu-heading">Vaccination</div>
                        
                        <!-- Cases Menu -->
                        <a 
                            class     = "nav-link" 
                            href      = "<?= base_url() ?>c/vaccination-card" 
                            draggable = "false"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-id-card icon-container"></i>
                            </div>
                            <span>Vaccination Card</span>
                        </a>

                        <!-- Contacts Menu -->
                        <a 
                            class     = "nav-link" 
                            href      = "<?= base_url() ?>c/vaccination-appointments"
                            draggable = "false"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-file-signature icon-container"></i>
                            </div>
                            <span>Appointments</span>
                        </a>

                        <!-- Vaccines Menu -->
                        <a 
                            class     = "nav-link align-items-start" 
                            href      = "<?= base_url() ?>c/available-vaccines"
                            draggable = "false"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-vial icon-container"></i>
                            </div>
                            <span>Available Vaccines</span>
                        </a>

                        <!-- COVID-19 Status -->
                        <?php $this->load->view('all/components/c19status_menus') ?>

                    </div>
                </div>

                <!-- Sidenav Footer -->
                <div class="sb-sidenav-footer">
                    <div class="small">
                        <div>You're logged in as:</div>
                        <div class="font-weight-semibold mb-2">Citizen</div>
                    </div>
                    <button 
                        class       = "btn btn-sm btn-danger btn-block"
                        data-toggle = "modal"
                        data-target = "#logoutModal"
                    >
                        <span>Log out</span>
                        <i class="fas fa-sign-out-alt ml-1"></i>
                    </button>
                </div>
            </nav>
        </div>

        <!-- Content -->
        <div id="layoutSidenav_content" class="bg-muted">
            <main>