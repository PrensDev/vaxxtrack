<div class="container px-3 py-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'COVID-19 Cases',
        'subtitle' => 'Manage the list of COVID-19 cases here'
    ]); ?>

    <!-- COVID-19 Cases Summary -->
    <?php $this->load->view('all/components/case_summary_detailed'); ?>
    
    <!-- Cases Card -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-list mr-1"></i>
                <span>Cases</span>
            </div>
        </div>
        <div class="card-body">

            <!-- User Actions -->
            <div class="form-group d-flex flex-column flex-md-row justify-content-between align-items-center">
                <a href="<?= base_url() ?>h/heatmap" class="btn btn-sm btn-danger mb-2 mb-md-0">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    <span>View COVID-19 Cases Heatmap</span>
                </a>
                <a href="<?= base_url() ?>h/add-new-case" class="btn btn-blue btn-sm">
                    <i class="fas fa-plus mr-1"></i>
                    <span>Add new case</span>
                </a>
            </div>
            
            <!-- Cases Table -->
            <div class="table-responsive">
                <table 
                    class       = "table border-bottom" 
                    id          = "COVID19CasesDT" 
                    width       = "100%" 
                    cellspacing = "0"
                >
                    <thead class="thead">
                        <tr>
                            <th>Case Code</th>
                            <th>Confirmed Date</th>
                            <th>Admitted</th>
                            <th>Current Health Status</th>
                            <th>Lab Report</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>