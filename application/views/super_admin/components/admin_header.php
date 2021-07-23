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
                        <!-- <div class="sb-sidenav-menu-heading">Establishments</div> -->
                        
                        <!-- Registered Establishment Menu -->
                        <!-- <a class="nav-link" href="<?= base_url() ?>admin/registered-establishments" draggable="false">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-building icon-container"></i>
                            </div>
                            <span>Registered Establishments</span>
                        </a> -->

                        <!-- <div class="sb-sidenav-menu-divider"></div> -->

                        <!-- Contact Tracing -->
                        <div class="sb-sidenav-menu-heading">COVID-19 Cases</div>

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
                                    <a class="nav-link" href="<?= base_url() ?>admin/covid-cases" draggable="false">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-list icon-container"></i>
                                        </div>
                                        <span>Case List</span>
                                    </a>
                                    <a class="nav-link" href="<?= base_url() ?>admin/heatmap-cases" draggable="false">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-map-marked icon-container"></i>
                                        </div>
                                        <span>Heatmap</span>
                                    </a>
                                </div>
                            </nav>
                        </div>

                        <!-- Contacts Menu -->
                        <a class="nav-link" href="<?= base_url() ?>admin/contacts">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-user-friends icon-container"></i>
                            </div>
                            <span>Contacts</span>
                        </a>

                        <div class="sb-sidenav-menu-divider"></div>
                        
                        <!-- Vaccination -->
                        <div class="sb-sidenav-menu-heading">Vaccination</div>
                        
                        <!-- Records Menu -->
                        <a 
                            class   = "nav-link align-items-start" 
                            href    = "<?= base_url() ?>admin/vaccination-records"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-syringe icon-container"></i>
                            </div>
                            <span>Records</span>
                        </a>
                        
                        <!-- Appointments Menu -->
                        <a 
                            class   = "nav-link align-items-start" 
                            href    = "<?= base_url() ?>admin/vaccination-appointments"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-calendar-alt icon-container"></i>
                            </div>
                            <span>Appointments</span>
                        </a>
                        
                        <!-- Vaccines Menu -->
                        <a 
                            class   = "nav-link align-items-start" 
                            href    = "<?= base_url() ?>admin/vaccines"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-vial icon-container"></i>
                            </div>
                            <span>Vaccines</span>
                        </a>

                        <div class="sb-sidenav-menu-divider"></div>

                        <!-- User Management -->
                        <div class="sb-sidenav-menu-heading">User Management</div>

                        <!-- Users Toggler Menu -->
                        <div
                            class           = "nav-link collapsed" 
                            role            = "button"
                            data-toggle     = "collapse" 
                            data-target     = "#collapseUsersMenus"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users-cog icon-container"></i>
                            </div>
                            <span>Users</span>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-caret-down"></i></div>
                        </div>
                        <div class="collapse" id="collapseUsersMenus">
                            <nav class="nav">
                                <div class="sb-sidenav-menu-nested">
                                    <a 
                                        class     = "nav-link" 
                                        href      = "<?= base_url() ?>admin/users/citizens" 
                                        draggable = "false"
                                    >
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-user-circle icon-container"></i>
                                        </div>
                                        <span>Citizens</span>
                                    </a>
                                    <a 
                                        class     = "nav-link" 
                                        href      = "<?= base_url() ?>admin/users/establishment-representatives" 
                                        draggable = "false"
                                    >
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-user-circle icon-container"></i>
                                        </div>
                                        <span>Establishment Representative</span>
                                    </a>
                                    <a 
                                        class     = "nav-link" 
                                        href      = "<?= base_url() ?>admin/users/health-officials" 
                                        draggable = "false"
                                    >
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-user-circle icon-container"></i>
                                        </div>
                                        <span>Health Officials</span>
                                    </a>
                                    <a 
                                        class     = "nav-link" 
                                        href      = "<?= base_url() ?>admin/users/super-admins" 
                                        draggable = "false"
                                    >
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-user-circle icon-container"></i>
                                        </div>
                                        <span>Super Admins</span>
                                    </a>
                                </div>
                            </nav>
                        </div>

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