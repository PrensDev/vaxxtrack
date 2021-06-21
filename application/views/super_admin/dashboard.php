<div class="container px-3 py-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Dashboard',
        'subtitle' => 'Manage your overall activities using this dashboard'
    ]); ?>

    <!-- Dashboard Hero -->
    <div class="card mb-4">
        <div class="card-body bg-waves p-3 p-sm-5">
            <div class="row">
                <div class="col-12 col-md-7 order-1 order-md-0 text-center text-sm-left">
                    <h1>Good Day, <span id="userFirstNameForGreet"></span>!</h1>
                    <h5>Manage your activities using this productive dashboard!</h5>
                    <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum praesentium velit possimus pariatur amet eum.</p>
                </div>
                <div class="col-12 col-md-5 order-0 order-md-1 mb-3 mb-md-0 d-flex justify-content-center">
                    <img 
                        class     = "w-75" 
                        src       = "<?= base_url() ?>public/images/brand/dashboard.svg" 
                        alt       = "Person Fighting Virus"
                        draggable = "false"
                    >
                </div>
            </div>
        </div>
    </div>

    <!-- COVID-19 Cases Summary -->
    <div class="flex-separated align-items-center mb-2">
        <h4>COVID-19 Cases</h4>
        <a href="<?= base_url() ?>admin/covid-cases" class="btn btn-info btn-sm">More about COVID-19 Cases</a>
    </div>
    <?php $this->load->view('all/components/cases_summary'); ?>

    <!-- Vaccination Record and Registered for Vaccination Summary -->
    <div class="form-row">

        <!-- Vaccination Record Summary -->
        <div class="col-12 col-md-6">    
            <div class="mb-3">
                <h4>Vaccinated Individuals</h4>
            </div>
            <div class="card bg-primary mb-4" id="vaccRecordsCountContainer">
                <div class="card-body py-2 ml-1 bg-white rounded-lg">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-1">
                            <h6 class="text-primary">Vaccinated Individuals</h6>
                            <h2 class="font-weight-bold mb-0" id="vaccRecordsCountData">0</h2>  
                            
                            <div class="mt-3">
                                <a href="<?= base_url() ?>h/vaccination-records" class="btn btn-sm btn-primary">Click here for more details</a>
                            </div>
                        </div>
                        <div>
                            <img 
                                style     = "width: 125px" 
                                src       = "<?= base_url() ?>public/images/brand/vaccinating_individual.jpg"
                                draggable = "false"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Registered for Vaccination Summary -->
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <h4>Registered for Vaccination</h4>
            </div>
            <div class="card bg-danger mb-4" id="vaccAppointmentsCountContainer">
                <div class="card-body py-3 ml-1 bg-white rounded-lg">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-1">
                            <h6 class="text-danger">Registered for Vaccination</h6>
                            <h2 class="font-weight-bold mb-0" id="registeredForVaccCountData">0</h2>

                            <div class="mt-3">
                                <a href="<?= base_url() ?>h/vaccination-appointments" class="btn btn-sm btn-danger">Click here for more details</a>
                            </div>
                        </div>
                        <div>
                            <img 
                                style     = "width: 100px" 
                                src       = "<?= base_url() ?>public/images/brand/defend_from_virus.jpg"
                                draggable = "false"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registered Users Summary -->
    <div class="mb-3">
        <h4>Registered Users</h4>
    </div>
    <div class="form-row" id="usersCountContainer">
                
        <!-- Citizens Summary -->
        <div class="col-12 col-md-6 mb-md-2 mb-4">
            <div class="card bg-blue h-100">
                <div class="card-body ml-1 bg-white py-3 rounded-lg">
                    <div class="flex-separated mb-2">
                        <div class="mr-1">
                            <h6 class="text-blue">Citizens</h6>
                            <h2 class="font-weight-bold" id="citizensCount">0</h2>
                        </div>
                        <div class="flex-center alert-blue rounded-lg" style="min-width:75px; min-height:75px;">
                            <h1 class="text-blue m-0">
                                <i class="fas fa-users"></i>
                            </h1>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="<?= base_url() ?>admin/users/citizens" class="btn btn-sm btn-blue">
                            <span>Click here for more details</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
                
        <!-- Establishment Representatives Summary -->
        <div class="col-12 col-md-6 mb-md-2 mb-4">
            <div class="card bg-blue h-100">
                <div class="card-body ml-1 bg-white py-3 rounded-lg">
                    <div class="flex-separated mb-2">
                        <div class="mr-1">
                            <h6 class="text-blue">Establishment Representatives</h6>
                            <h2 class="font-weight-bold" id="representativesCount">0</h2>
                        </div>
                        <div class="flex-center alert-blue rounded-lg" style="min-width:75px; min-height:75px;">
                            <h1 class="text-blue m-0">
                                <i class="fas fa-users"></i>
                            </h1>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="<?= base_url() ?>admin/users/establishment-representatives" class="btn btn-sm btn-blue">
                            <span>Click here for more details</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
                
        <!-- Health Officials Summary -->
        <div class="col-12 col-md-6 mb-md-2 mb-4">
            <div class="card bg-blue h-100">
                <div class="card-body ml-1 bg-white py-3 rounded-lg">
                    <div class="flex-separated mb-2">
                        <div class="mr-1">
                            <h6 class="text-blue">Health Officials</h6>
                            <h2 class="font-weight-bold" id="healthOfficialsCount">0</h2>
                        </div>
                        <div class="flex-center alert-blue rounded-lg" style="min-width:75px; min-height:75px;">
                            <h1 class="text-blue m-0">
                                <i class="fas fa-users"></i>
                            </h1>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="<?= base_url() ?>admin/users/health-officials" class="btn btn-sm btn-blue">
                            <span>Click here for more details</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
                
        <!-- Super Admins Summary -->
        <div class="col-12 col-md-6 mb-md-2 mb-4">
            <div class="card bg-blue h-100">
                <div class="card-body ml-1 bg-white py-3 rounded-lg">
                    <div class="flex-separated mb-2">
                        <div class="mr-1">
                            <h6 class="text-blue">Super Admins</h6>
                            <h2 class="font-weight-bold" id="superAdminsCount">0</h2>
                        </div>
                        <div class="flex-center alert-blue rounded-lg" style="min-width:75px; min-height:75px;">
                            <h1 class="text-blue m-0">
                                <i class="fas fa-users"></i>
                            </h1>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="<?= base_url() ?>admin/users/super-admins" class="btn btn-sm btn-blue">
                            <span>Click here for more details</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>