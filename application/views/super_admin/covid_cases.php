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

            <div class="form-group text-center">
                <a href="<?= base_url() ?>admin/heatmap-cases" class="btn btn-sm btn-danger">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    <span>View COVID-19 Cases Heatmap</span>
                </a>
            </div>
            
            <!-- Cases Table -->
            <div class="table-responsive">
                <table 
                    class       = "table" 
                    id          = "covidCasesDT" 
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
                    <tbody>
                        <?php for($i = 1; $i <= 25; $i++): ?>
                        <tr>
                            <td>
                                <div 
                                    class       = "btn btn-white-muted btn-sm btn-block"
                                    data-toggle = "modal"
                                    data-target = "#caseDetailsModal"
                                >CASE-00001</div>
                            </td>
                            <td>January 23, 2020</td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                            <td>
                                <span class="badge alert-success text-success p-2 w-100">Recovered</span>
                            </td>
                            <td>
                                <button 
                                    class       = "btn btn-muted btn-block btn-sm"
                                    data-toggle = "modal"
                                    data-target = "#labReportModal"
                                >
                                    <i class="fas fa-file-medical mr-1"></i>
                                    <span>View Report</span>
                                </button>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <div data-toggle="dropdown">
                                        <div class="btn btn-white-muted btn-sm" data-toggle="tooltip" title="More">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="dropdown-menu dropdown-menu-right border-0">
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#caseDetailsModal"
                                        >
                                            <i class="fas fa-list icon-container"></i>
                                            <span>View case details</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>CASE-0001</td>
                            <td>January 23, 2020</td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                            <td>
                                <span class="badge alert-warning text-warning p-2 w-100">Asymptomatic</span>
                            </td>
                            <td>
                                <button 
                                    class       = "btn btn-muted btn-block btn-sm"
                                    data-toggle = "modal"
                                    data-target = "#labReportModal"
                                >
                                    <i class="fas fa-plus mr-1"></i>
                                    <span>Attach Lab Report</span>
                                </button>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-white-muted btn-sm" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    
                                    <div class="dropdown-menu dropdown-menu-right border-0">
                                        <div class="dropdown-item" role="button">
                                            <i class="fas fa-list icon-container"></i>
                                            <span>View case details</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endfor ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>