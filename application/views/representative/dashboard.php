<div class="container px-3 py-3 py-sm-4">

    <!-- Dashboard Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">Dashboard</h2>
            <div class="text-secondary">Manage your overall activities using this dashboard</div>
        </div>
        
        <div class="card d-none d-md-block">
            <div class="card-body text-monospace">
                <span id="clockDate"></span>,
                <span id="clockTime"></span>
                <span id="clockSession"></span>
            </div>
        </div>
    </div>

    <!-- COVID-19 News -->
    <div class="bg-white bg-waves shadow p-4 p-sm-5 mb-4 rounded">
        <div class="row">
            <div class="col-12 col-md-7 order-1 order-md-0 text-center text-sm-left">
                <h1>Good Day, <span id="userFirstNameForGreet"></span>!</h1>
                <h5>Everyone's health is our concern</h5>
                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum praesentium velit possimus pariatur amet eum.</p>
                
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
    
    <!-- Establishments -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-building mr-1"></i>
                <span>Your Establishments</span>
            </div>
        </div>
        <div class="card-body">
            
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
                        <h4>Manage your accounts!</h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium, porro aperiam explicabo tenetur nam praesentium dolorum saepe obcaecati nostrum ipsa?</p>
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
                        <h4>Edit your information!</h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium, porro aperiam explicabo tenetur nam praesentium dolorum saepe obcaecati nostrum ipsa?</p>
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