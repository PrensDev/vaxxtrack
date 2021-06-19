<?php 
    $user_type = $this->session->user_type;

    if ($user_type === 'Citizen') {
        $main_link = 'c';
    } else if ($user_type === 'Representative') {
        $main_link = 'r';
    } else if ($user_type === 'Health Official'){
        $main_link = 'h';
    } else if ($user_type === 'Super Admin') {
        $main_link = 'admin';
    }

    $user_path = base_url() . $main_link . '/';
?>

<!-- Top Navigation Bar -->
<nav class="sb-topnav navbar navbar-expand navbar-light bg-white border-bottom shadow">
    
    <!-- Brand Container -->
    <div class="navbar-container d-flex align-items-center">
    
        <!-- Toggler Button For Sidebar -->
        <div 
            class = "btn btn-white-muted ml-lg-0" 
            id    = "sidebarToggle"
        ><i class="fas fa-bars"></i></div>

        <!-- Brand Name -->
        <a 
            class = "nav-link text-primary d-flex align-items-center" 
            href  = "<?= $user_path ?>"
        >
            <img src="<?= base_url() ?>public/images/brand/icon.png" alt="" style="height: 20px;">
            <span class="font-weight-semibold ml-2">C19CTAVMS</span>
        </a>    
    </div>

    <!-- Navbar-->
    <ul class="navbar-nav navbar-container justify-content-end w-100 d-flex">
        <li class="nav-item dropdown">

            <!-- User -->
            <div 
                class         = "btn btn-white-muted" 
                role          = "button" 
                data-toggle   = "dropdown" 
                aria-haspopup = "true" 
                aria-expanded = "false"
            >   
                <i class="fas fa-user-tie"></i>
            </div>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu dropdown-user-menu dropdown-menu-right shadow border-0" aria-labelledby="userDropdown">
                
                <!-- Profile -->
                <div class="flex-center flex-column text-center py-2 rounded-lg">
                    <div class="flex-center bg-muted border rounded-circle mb-2" style="width: 100px; height: 100px;">
                        <div style="font-size: 3rem">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                    <h5 class="font-weight-semibold mb-1 mx-3" id="userFullNameForTopbar"></h5>
                    <div class="badge alert-primary border border-primary text-primary bg-light px-2 py-1">
                        <?= $user_type !== 'Representative' ? $user_type : 'Establishment Representative' ?>
                    </div>
                </div>

                <div class="dropdown-divider"></div>
                
                <!-- Settings Heading -->
                <h5 class="m-3">Settings</h5>

                <!-- Edit Information Menu -->
                <a 
                    class     = "dropdown-icon-item"  
                    href      = "<?= $user_path ?>edit-info"
                    draggable = "false"
                >
                    <div class="dropdown-icon-container">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <span>Edit information</span>
                </a>

                <!-- Account Settings Menu -->
                <a 
                    class     = "dropdown-icon-item" 
                    href      = "<?= $user_path ?>account-settings"
                    draggable = "false"
                >
                    <div class="dropdown-icon-container">
                        <i class="fas fa-user-lock"></i>
                    </div>
                    <span>Account Settings</span></a>
                </a>

                <div class="dropdown-divider"></div>
                
                <!-- Log out Menu -->
                <div
                    class       = "dropdown-icon-item" 
                    data-toggle = "modal"
                    data-target = "#logoutModal"
                    role        = "button"
                >
                    <div class="dropdown-icon-container">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <span>Log out</span></a>
                </div>

                <!-- Dropdown Footer -->
                <div class="text-center mt-1">
                    <a 
                        href   = "<?= base_url() ?>about-us" 
                        class  = "small"
                        target = "_blank"
                    >About us</a>
                    <span>&middot;</span>
                    <a 
                        href   = "<?= base_url() ?>data-privacy" 
                        class  = "small"
                        target = "_blank"
                    >Data Privacy</a>
                    <span>&middot;</span>
                    <a 
                        href   = "<?= base_url() ?>terms-and-conditions" 
                        class  = "small"
                        target =  "_blank"
                    >Terms and Conditions</a>
                </div>
            </div>
        </li>
    </ul>
</nav>