<!-- Navbars -->
<div class="sb-nav-fixed">

    <!-- Top Bar -->
    <?php $this->load->view('all/components/admin_topbar') ?> 

    <!-- Main Body -->
    <div id="layoutSidenav">
        
        <!-- Sidebar -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light">

                <!-- Sidenav Menu -->
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        
                        <!-- Dashboard -->
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= base_url() ?>h" draggable="false">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-bar icon-container"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>

                        <div class="sb-sidenav-menu-divider"></div>

                        <!-- Contact Tracing -->
                        <div class="sb-sidenav-menu-heading">Contact Tracing</div>
                        
                        <!-- COVID-19 Cases Menu -->
                        <div
                            class           = "nav-link collapsed" 
                            role            = "button"
                            data-toggle     = "collapse" 
                            data-target     = "#collapseCasesMenus"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-virus icon-container"></i>
                            </div>
                            <span>COVID-19 Cases</span>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-caret-down"></i></div>
                        </div>
                        <div class="collapse" id="collapseCasesMenus">
                            <nav class="nav">
                                <div class="sb-sidenav-menu-nested">
                                    <a class="nav-link" href="<?= base_url() ?>h/cases" draggable="false">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-list icon-container"></i>
                                        </div>
                                        <span>Case List</span>
                                    </a>
                                    <a class="nav-link" href="<?= base_url() ?>h/heatmap" draggable="false">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-map-marked icon-container"></i>
                                        </div>
                                        <span>Heatmap</span>
                                    </a>
                                </div>
                            </nav>
                        </div>

                        <!-- Contacts Menu -->
                        <a 
                            class     = "nav-link" 
                            href      = "<?= base_url() ?>h/contacts"
                            draggable = "false"
                        >
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
                            class     = "nav-link align-items-start" 
                            href      = "<?= base_url() ?>h/vaccination-records"
                            draggable = "false"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-syringe icon-container"></i>
                            </div>
                            <span>Records</span>
                        </a>
                        
                        <!-- Appointments Menu -->
                        <a 
                            class     = "nav-link align-items-start" 
                            href      = "<?= base_url() ?>h/vaccination-appointments"
                            draggable = "false"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-calendar-alt icon-container"></i>
                            </div>
                            <span>Appointments</span>
                        </a>
                        
                        <!-- Vaccines Menu -->
                        <a 
                            class   = "nav-link align-items-start" 
                            href    = "<?= base_url() ?>h/vaccines"
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
                        <div class="font-weight-semibold mb-2">Health Official</div>
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