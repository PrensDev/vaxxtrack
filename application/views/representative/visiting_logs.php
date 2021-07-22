<!-- Main Content -->
<div class="container px-3 py-4">
    <?php $this->load->view('representative/components/establishment_details'); ?>

    <div id="alertContainer"></div>

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
            <div class="mb-4 text-center">
                <button 
                    class       = "btn btn-blue btn-sm"
                    id          = "scanQrCodeBtn"
                    data-toggle = "modal"
                    data-target = "#QRCodeScannerModal"
                >
                    <i class="fas fa-camera mr-1"></i>
                    <span>Scan</span>
                </button>
            </div>

            <!-- Visiting Logs Table -->
            <div class="table-responsive">
                <table class="table border-bottom w-100" id="visitingLogsDT" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th>Entry Log (hidden)</th>
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