<!-- For Citizens Section -->
<div class="bg-light">
    <div class="container px-4 py-5 px-sm-2">
        <div class="row align-items-center">

            <!-- Hero Content -->
            <div class="col-12 col-md-6 order-1 order-md-0">
                <div class="d-flex align-items-center display-4 text-primary font-weight-semibold mb-2">
                    <img 
                        class     = "mr-3" 
                        src       = "<?= base_url() ?>public/images/brand/icon.png" 
                        alt       = "brand" 
                        style     = "height: 55px"
                        draggable = "false"
                    >
                    <span>VaxxTrack</span>
                </div>
                <h3>Stay Protected in COVID-19!</h3>
                <p>
                    Protect yourself, your loved ones, and your community. 
                    Help us to stop the spread of coronavirus through registering to contact tracing and vaccine management system. 
                    The faster you know, the quicker you can alert and protect your loved ones and community.
                </p>
                
                <a 
                    href  = "<?= base_url() ?>register/c" 
                    class = "btn btn-lg btn-blue my-1"
                >Register Here, Citizen!</a>
                <a 
                    href  = "<?= base_url() ?>login" 
                    class = "btn btn-lg btn-primary my-1"
                >Login</a>
            </div>

            <!-- Hero Image -->
            <div class="col-12 col-md-6 order-0 order-md-1 mb-3 mb-md-0">
                <img 
                    src       = "<?= base_url() ?>public/images/brand/contact_tracing.png" 
                    alt       = "" 
                    class     = "w-100 rounded"
                    draggable = "false"
                > 
            </div>
        </div>
    </div>
</div>

<!-- For Establishment Representatives Section -->
<div>
    <div class="container px-4 py-5 px-sm-2">
        <div class="row">

            <!-- Hero Content -->
            <div class="col-12 col-md-6 order-1 order-md-0">
                <h3>For Establishment Representatives</h3>
                <p>
                    Protect your customers and employees from COVID 19 
                    by monitoring your establishment's visiting log.
                </p>

                <a 
                    href  = "<?php echo base_url() ?>register/r" 
                    class = "btn btn-danger my-1"
                >Create an account</a>

                <a 
                    href  = "<?php echo base_url() ?>login" 
                    class = "btn btn-primary my-1"
                >Login</a>
            </div>

            <!-- Hero Image -->
            <div class="col-12 col-md-6 order-0 order-md-1 mb-4 mb-md-0">
                <div class="d-flex justify-content-center">
                    <img 
                        src       = "<?= base_url() ?>public/images/brand/establishments.jpg" 
                        alt       = "" 
                        class     = "w-75 rouded"
                        draggable = "false"
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<!-- COVID-19 Updates -->
<div class="bg-muted pt-5 pb-1">
    <div class="container">
        <h2 class="text-center text-dark mb-4">COVID-19 Updates</h2>

        <h3 class="mb-1">Cases</h3>
        <p class="text-secondary">Live updates about COVID-19 cases</p>
        <?php $this->load->view('all/components/case_summary_detailed'); ?>

        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <h3 class="mb-1">Vaccinated Individuals</h3>
                <p class="text-secondary">Live updates about vaccinated individuals</p>
                <?php $this->load->view('all/components/vaccination_summary'); ?>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <h3 class="mb-1">Registered for Vaccination</h3>
                <p class="text-secondary">Live updates about individuals to be vaccinated</p>
                <?php $this->load->view('all/components/vaccinated_summary'); ?>
            </div>
        </div>
    </div>
</div>

<!-- More Updates from DOH -->
<div class="bg-waves py-5">
    <div class="container px-5 px-sm-0 py-0 py-sm-3">
        <div class="row">
            <div class="col-12 col-sm-7 col-md-8 order-1 order-sm-0">
                <h1>Get More Updates from DOH</h1>
                <h5>Latest news is always there! Go and check it!</h5>
                <p>Go to DOH website by clicking the button below</p>

                <a 
                    href   = "https://www.who.int/emergencies/diseases/novel-coronavirus-2019/media-resources/news" 
                    target = "_blank" 
                    class  = "btn btn-primary mt-3"
                >
                    <span>Check latest news about COVID-19</span>
                    <i class="fas fa-caret-right ml-1"></i>
                </a>
            </div>
            <div class="col-12 col-sm-5 col-md-4 order-0 order-sm-1">
                <img 
                    class     = "w-100" 
                    src       = "<?= base_url() ?>public/images/brand/fighting_virus.png" 
                    alt       = "Person Fighting Virus"
                    draggable = "false"
                >
            </div>
        </div>
    </div>
</div>