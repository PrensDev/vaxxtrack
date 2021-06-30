<div class="container px-3 py-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Vaccination Records',
        'subtitle' => 'Manage vaccinated individuals and their records'
    ]); ?>

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
                    class="table" 
                    id="vaccinationRecordsDT" 
                    width="100%" 
                >
                    <thead class="thead">
                        <tr>
                            <th>Vaccinated Individual</th>
                            <th>Age</th>
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