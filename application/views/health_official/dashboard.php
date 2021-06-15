<div class="container px-3 py-4">

    <!-- Title Header -->
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

</div>