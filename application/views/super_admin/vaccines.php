<div class="container px-3 py-4">
    
    <?php $this->load->view('all/components/header_title', [
        'title' => 'Vaccines',
        'subtitle' => 'Manage the list of available vaccines here'
    ]); ?>

    <div id="alertContainer"></div>

    <!-- Vaccines Card -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-syringe mr-1"></i>
                <span>Vaccines</span>
            </div>
        </div>
        <div class="card-body">

            <!-- User Actions -->
            <div class="text-center mb-2">
                <button class="btn btn-sm btn-blue" data-toggle="modal" data-target="#addVaccineModal">
                    <i class="fas fa-plus mr-1"></i>
                    <span>Add Vaccine</span>
                </button>
            </div>

            <!-- Vaccines DataTable -->
            <div class="table-responsive">
                <table class="table w-100 border-bottom" id="vaccinesDT" width="100%" cellspacing="0">
                    <thead class="thead">
                        <th>Date Created (Hidden)</th>
                        <th>Vaccine</th>
                        <th>Type</th>
                        <th>Manufacturer</th>
                        <th>Shot Details</th>
                        <th>Availability</th>
                        <th></th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</div>