<div class="container px-3 py-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Vaccination Records',
        'subtitle' => 'Manage vaccinated individuals and their records'
    ]); ?>

    <!-- Vaccination Record Summary -->
    <?php $this->load->view('all/components/vaccination_summary'); ?>

    <div id="alertContainer"></div>

    <!-- Vaccination Records -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-list mr-1"></i>
                <span>Records</span>
            </div>
        </div>
        <div class="card-body">
            
            <!-- Vaccination Records Table -->
            <div class="table-responsive">
                <table class="table w-100" id="vaccinationRecordsDT" width="100%" cellspacing="0">
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