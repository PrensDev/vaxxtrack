<!-- Navbars -->
<div class="sb-nav-fixed">

    <!-- Top Bar -->
    <?php $this->load->view('all/components/admin_topbar') ?> 

    <!-- Main Body -->
    <div id="layoutSidenav">
        
        <!-- Sidebar -->
        <div id="layoutSidenav_nav" class="shadow-sm">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">

                <!-- Sidenav Menu -->
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        
                        <!-- Dashboard -->
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a 
                            class     = "nav-link" 
                            href      = "<?= base_url() ?>r"
                            draggable = "false"
                        >
                            <div class="sb-nav-link-icon mr-1">
                                <i class="fas fa-chart-bar icon-container"></i>
                            </div>
                            <span>Dashboard</span>
                        </a>

                        <div class="sb-sidenav-menu-divider"></div>

                        <!-- Establishments -->
                        <div class="sb-sidenav-menu-heading">Establishments</div>
                       
                        <div id="establishmentsContainer"></div>

                        <div class="mt-2">
                            <a
                                href  = "<?= base_url() ?>r/add-establishment" 
                                class = "btn btn-sm btn-muted btn-block"
                            >   
                                <i class="fas fa-plus mr-1"></i>
                                <span>Add establishment</span>
                            </a>
                        </div>
                        
                        <!-- COVID-19 Status -->
                        <?php $this->load->view('all/components/c19status_menus') ?>

                    </div>
                </div>
                
                <!-- Sidenav Footer -->
                <div class="sb-sidenav-footer">
                    <div class="small">
                        <div>You're logged in as:</div>
                        <div class="font-weight-semibold mb-2">Establishment Representative</div>
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
        <div id="layoutSidenav_content" class="bg-coolLight">
            <main>