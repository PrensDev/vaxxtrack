<div class="container px-3 py-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Vaccination Appointments',
        'subtitle' => 'Manage here the appointments of citizens for vaccination'
    ]); ?>

    <div id="alertContainer"></div>

    <?php $this->load->view('all/components/vacc_registered_summary_detailed'); ?>

    <!-- Vaccination Appointments List -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-file-signature mr-1"></i>
                <span>Appointments</span>
            </div>
        </div>
        <div class="card-body">

            <!-- Vaccination Appointments Table -->
            <div class="table-responsive">
                <table class="table" id="vaccAppointmentsDT" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th>Citizen</th>
                            <th>Age</th>
                            <th>Preferred Vaccine</th>
                            <th>Preferred Date</th>
                            <th>Status Approval</th>
                            <th>Approved By</th>
                            <th>Date & Time Approved</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>