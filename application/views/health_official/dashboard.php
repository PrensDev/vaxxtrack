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
                    <h5>Manage your activities using our dashboard designed for your!</h5>
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
        <a href="<?= base_url() ?>h/cases" class="btn btn-info btn-sm">More about COVID-19 Cases</a>
    </div>
    <?php $this->load->view('all/components/cases_summary'); ?>

    <!-- Vaccination Record Summary -->
    <div class="mb-2">
        <h4>Vaccinated Individuals</h4>
    </div>
    <div class="card bg-primary mb-4">
        <div class="card-body py-2 ml-1 bg-white rounded-lg">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mr-1">
                    <h6 class="text-primary">Vaccinated Individuals</h6>
                    <h2 class="font-weight-bold mb-0">300,384</h2>  
                    
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