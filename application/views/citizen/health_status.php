<div class="container px-3 py-sm-3 py-sm-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Your Health Status Logbook',
        'subtitle' => 'Track your daily health status here'
    ]); ?>

    <div id="alertContainer"></div>

    <!-- Health Status Logs -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-book mr-1"></i>
                <span>Health Status Logs</span>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group text-center">
                <button class="btn btn-sm btn-primary">
                    <i class="fas fa-edit mr-1"></i>
                    <span>Update your current health status</span>
                </button>
            </div>

            <div class="table-responsive">
                <table class="table w-100" id="healthStatusLogsDT" width="100%" cellspacing="0">
                    <thead class="thead">
                        <th>Date & Time Recorded (hidden)</th>
                        <th>Date & Time Recorded</th>
                        <th>Temperature</th>
                        <th>Overall Health Status</th>
                        <th></th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>