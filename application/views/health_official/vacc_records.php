<div class="container px-3 py-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Vaccination Records',
        'subtitle' => 'Manage vaccinated individuals and their records'
    ]); ?>

    <!-- Alert -->
    <div id="alertContainer"></div>

    <!-- Sessioned Alert -->
    <?php if($this->session->has_userdata('alert')): ?>
        <div class="alert alert-<?= $this->session->alertTheme ?> alert-dismissible fade show mb-4" role="alert" id="alert">
            <div><?= $this->session->alertMessage ?></div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <!-- Vaccination Record Summary -->
    <?php $this->load->view('all/components/vaccination_summary'); ?>

    <!-- Vaccination Records -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-list mr-1"></i>
                <span>Records</span>
            </div>
        </div>
        <div class="card-body">

            <div class="form-group text-center">
                <a href="<?= base_url() ?>h/add-vacc-record" class="btn btn-sm btn-blue">
                    <i class="fas fa-plus mr-1"></i>
                    <span>Add new record</span>
                </a>
            </div>
            
            <!-- Vaccination Records Table -->
            <div class="table-responsive">
                <table 
                    class       = "table border-bottom w-100" 
                    id          = "vaccinationRecordsDT" 
                    width       = "100%" 
                    cellspacing = "0"
                >
                    <thead class="thead">
                        <tr>
                            <th>Added At (hidden)</th>
                            <th>Vaccinated Individual</th>
                            <th>Vaccine Used</th>
                            <th>Date Vaccinated</th>
                            <th>Vaccinated by</th>
                            <th>Vaccinated in</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>