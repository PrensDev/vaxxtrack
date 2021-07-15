<div class="container px-3 py-sm-3 py-sm-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Your Health Status Logbook',
        'subtitle' => 'Track your daily health status here'
    ]); ?>

    <!-- Visiting Records -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-book mr-1"></i>
                <span>Health Status Logs</span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="healthStatusLogsDT">
                    <thead class="thead">
                        <th>Date Recorded</th>
                        <th>Temperature</th>
                        <th>Overall Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- View Health Status Log Details Modal -->
<div class="modal" id="viewHealthStatusModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-list"></h5>
                <h5 class="modal-title">Health Status Log Details</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Citizen Details</th>
                        <td id="citizenDetails"></td>
                    </tr>
                    <tr>
                        <th>Entry Log</th>
                        <td id="entryLog"></td>
                    </tr>
                    <tr>
                        <th>Temperature</th>
                        <td id="citizenTemp"></td>
                    </tr>
                    <tr>
                        <th>Overall Status</th>
                        <td id="Status"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer p-3 bg-white"></div>
        </div>
    </div>
</div>