<!-- Main Content -->
<div class="container px-3 py-4">
    <?php $this->load->view('representative/components/establishment_details'); ?>

    <!-- Visiting Logs -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-book mr-1"></i>
                <span>Visiting Logbook</span>
            </div>
        </div>
        <div class="card-body">

            <!-- User Controls -->
            <div class="d-flex justify-content-between mb-4">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="bi-caret-left-fill"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Today</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="bi-caret-right-fill"></i>
                    </button>
                </div>
                <div>
                    <button 
                        class       = "btn btn-blue btn-sm"
                        id          = "scanQrCodeBtn"
                        data-toggle = "modal"
                        data-target = "#QRCodeScannerModal"
                    >
                        <i class="fas fa-camera mr-1"></i>
                        <span>Scan</span>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary">
                        <i class="fas fa-download mr-1"></i>
                        <span>Export</span>
                    </button>
                </div>
            </div>

            <!-- Visiting Logs Table -->
            <div class="table-responsive">
                <table class="table border-bottom w-100" id="visitingLogsDT" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th>Visitor's Name</th>
                            <th>Entry Log</th>
                            <th>Purpose</th>
                            <th>Temp</th>
                            <th>Health Status</th>
                            <th>Allowed</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>