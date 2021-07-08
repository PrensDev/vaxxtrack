<div class="container px-3 py-sm-3 py-sm-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Your Vaccination Appointments',
        'subtitle' => 'Request and manage your vaccination appointments here'
    ]); ?>

    <div id="alertContainer"></div>

    <?php $this->load->view('all/components/vacc_registered_summary_detailed'); ?>

    <!-- Appointments Card -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-file-signature mr-1"></i>
                <span>Vaccination Appointments</span>
            </div>
        </div>
        <div class="card-body">

            <!-- User Actions -->
            <div class="form-group text-center">
                <button 
                    class="btn btn-primary btn-sm" 
                    type="button"
                    data-toggle="modal" 
                    data-target="#createAppointmentModal"
                >
                    <i class="fas fa-plus mr-1"></i>
                    <span>Create new appointment</span>
                </button>
            </div>

            <!-- Vaccination Appointments DataTable -->
            <div class="table-responsive">
                <table class="table w-100" id="vaccAppointmentsDT">
                    <thead class="thead">
                        <th>Date & Time Requested (hidden)</th>
                        <th>Date & Time Requested</th>
                        <th>Preferred Vaccine</th>
                        <th>Preferred Date</th>
                        <th>Status Approval</th>
                        <th>Approved By</th>
                        <th>Date & Time Approved</th>
                        <th></th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</div>