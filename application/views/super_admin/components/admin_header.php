<!-- Navbars -->
<div class="sb-nav-fixed">

    <!-- Top Bar -->
    <?php $this->load->view('all/components/admin_topbar') ?> 

    <!-- Main Body -->
    <div id="layoutSidenav">
        
        <!-- Sidebar -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light">

                <!-- Sidebar Menu -->
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        
                        <!-- Dashboard -->
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= base_url() ?>admin" draggable="false">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-bar icon-container"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>

                        <div class="sb-sidenav-menu-divider"></div>

                        <!-- Establishments -->
                        <div class="sb-sidenav-menu-heading">Establishments</div>
                        
                        <!-- Registered Establishment Menu -->
                        <a class="nav-link" href="<?= base_url() ?>r" draggable="false">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-building icon-container"></i>
                            </div>
                            <span>Registered Establishments</span>
                        </a>

                        <div class="sb-sidenav-menu-divider"></div>

                        <!-- Contact Tracing -->
                        <div class="sb-sidenav-menu-heading">Contact Tracing</div>
                        
                        <!-- Health Officers Menu -->
                        <a class="nav-link" href="<?= base_url() ?>r" draggable="false">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users icon-container"></i>
                            </div>
                            <span>Health Officers</span>
                        </a>

                        <!-- Cases Menu -->
                        <a class="nav-link" href="<?= base_url() ?>r" draggable="false">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-list icon-container"></i>
                            </div>
                            <span>Cases</span>
                        </a>

                        <!-- Contacts Menu -->
                        <a class="nav-link" href="<?= base_url() ?>r">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users icon-container"></i>
                            </div>
                            <span>Contacts</span>
                        </a>

                        <div class="sb-sidenav-menu-divider"></div>
                        
                        <!-- Vaccination -->
                        <div class="sb-sidenav-menu-heading">Vaccination</div>
                        
                        <!-- Records Menu -->
                        <a 
                            class   = "nav-link align-items-start" 
                            href    = "<?= base_url() ?>h/vaccination_records"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-syringe icon-container"></i>
                            </div>
                            <span>Records</span>
                        </a>
                        
                        <!-- Appointments Menu -->
                        <a 
                            class   = "nav-link align-items-start" 
                            href    = "<?= base_url() ?>h/vaccination_appointments"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-calendar-alt icon-container"></i>
                            </div>
                            <span>Appointments</span>
                        </a>
                        
                        <!-- Vaccines Menu -->
                        <a 
                            class   = "nav-link align-items-start" 
                            href    = "<?= base_url() ?>#"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-vial icon-container"></i>
                            </div>
                            <span>Vaccines</span>
                        </a>

                        <!-- COVID-19 Status -->
                        <?php $this->load->view('all/components/c19status_menus') ?>

                    </div>
                </div>

                <!-- Sidenav Footer -->
                <div class="sb-sidenav-footer">
                    <div class="small">
                        <div>You're logged in as:</div>
                        <div class="font-weight-semibold mb-2">Super Admin</div>
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