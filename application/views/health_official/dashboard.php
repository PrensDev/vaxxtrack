<div class="container px-3 py-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Dashboard',
        'subtitle' => 'Manage your overall activities using this dashboard'
    ]); ?>

    <div id="alertContainer"></div>

    <!-- Alert -->
    <?php if($this->session->has_userdata('alert')): ?>
        <div class="alert alert-<?= $this->session->alertTheme ?> alert-dismissible fade show mb-4" role="alert" id="alert">
            <div><?= $this->session->alertMessage ?></div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <!-- Dashboard Hero -->
    <div class="card mb-4">
        <div class="card-body bg-waves p-3 p-sm-5">
            <div class="row">
                <div class="col-12 col-md-7 order-1 order-md-0 text-center text-sm-left">
                    <h1>Good Day, <span id="userFirstNameForGreet"></span>!</h1>
                    <h5>Everyone's health is our concern</h5>
                    <p class="mt-2">
                    As many facets of life have been altered by the coronavirus (COVID-19), 
                    it is important to bear in mind the goal to stop the spread of the virus.
                    </p>
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
        <a href="<?= base_url() ?>h/cases" class="btn btn-info btn-sm">More about COVID-19 Cases</a>
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

</div>