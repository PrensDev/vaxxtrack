<!-- Vaccination Appointments Summary -->
<div id="vaccAppointmentsCountContainer">
    <div class="card bg-danger mb-4 mb-md-2">
        <div class="card-body py-1 ml-1 bg-white rounded-lg">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mr-1">
                    <h6 class="text-danger">Total Appointments</h6>
                    <h2 class="font-weight-bold mb-0" id="vaccAppointmentsCountData">0</h2>
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
    
    <!-- Vaccination Appointment Status Summary -->
    <div class="form-row">
    
        <!-- Pending -->
        <div class="col-12 col-md-4">
            <div class="card bg-blue mb-4">
                <div class="card-body py-3 bg-white ml-1 rounded-lg">
                    <div class="flex-separated">
                        <div>
                            <h6 class="text-blue">Pending</h6>
                            <h3 class="font-weight-bold mb-0" id="vaccPendingAppointmentsCountData">0</h3>
                        </div>
                        <div class="alert-blue flex-center rounded-lg" style="height: 60px; width: 60px">
                            <h1 class="mb-0">
                                <i class="fas fa-stopwatch text-blue"></i>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Approved -->
        <div class="col-12 col-md-4">
            <div class="card bg-success mb-4">
                <div class="card-body py-3 bg-white ml-1 rounded-lg">
                    <div class="flex-separated">
                        <div>
                            <h6 class="text-success">Approved</h6>
                            <h3 class="font-weight-bold mb-0" id="vaccPendingApprovedCountData">0</h3>
                        </div>
                        <div class="alert-success flex-center rounded-lg" style="height: 60px; width: 60px">
                            <h1 class="mb-0">
                                <i class="fas fa-check text-success"></i>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Rejected -->
        <div class="col-12 col-md-4">
            <div class="card bg-danger mb-4">
                <div class="card-body py-3 bg-white ml-1 rounded-lg">
                    <div class="flex-separated">
                        <div>
                            <h6 class="text-danger">Rejected</h6>
                            <h3 class="font-weight-bold mb-0" id="vaccRejectedAppointmentsCountData">0</h3>
                        </div>
                        <div class="alert-danger flex-center rounded-lg" style="height: 60px; width: 60px">
                            <h1 class="m-0">
                                <i class="fas fa-times text-danger"></i>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>