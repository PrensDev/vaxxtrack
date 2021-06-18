<div class="container px-3 py-4">

    <!-- Dashboard Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">COVID-19 Cases</h2>
            <div class="text-secondary">Manage the list of COVID-19 cases here</div>
        </div>
        
        <div class="card d-none d-md-block">
            <div class="card-body text-monospace">
                <span id="clockDate"></span>,
                <span id="clockTime"></span>
                <span id="clockSession"></span>
            </div>
        </div>
    </div>
    
    <!-- Cases Card -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-list mr-1"></i>
                <span>Cases</span>
            </div>
        </div>
        <div class="card-body">

            <div class="form-group d-flex justify-content-between align-items-center">
                <a href="<?= base_url() ?>h/heatmap" class="btn btn-sm btn-danger">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    <span>View COVID-19 Cases Heatmap</span>
                </a>
                <a href="<?= base_url() ?>h/add-new-case" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i>
                    <span>Add new case</span>
                </a>
            </div>
            
            <!-- Cases Table -->
            <div class="table-responsive">
                <table 
                    class       = "table" 
                    id          = "dataTable" 
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
                        <?php for($i = 1; $i <= 25; $i++) { ?>
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
                                <div
                                    role        = "button" 
                                    data-toggle = "modal" 
                                    data-target = "#updateHealthStatusModal"
                                >
                                    <span 
                                        class       = "badge alert-success text-success p-2 w-100"
                                        data-toggle = "tooltip"
                                        title       = "Click to update current health status"
                                    >Recovered</span>
                                </div>
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
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#updateHealthStatusModal"
                                        >
                                            <i class="fas fa-notes-medical icon-container"></i>
                                            <span>Update health status</span>
                                        </div>
                                        <div class="dropdown-item" role="button">
                                            <i class="far fa-edit icon-container"></i>
                                            <span>Edit case details</span>
                                        </div>
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#removeCaseRecordModal"
                                        >
                                            <i class="far fa-trash-alt icon-container"></i>
                                            <span>Remove this case</span>
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
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#updateHealthStatusModal"
                                        >
                                            <i class="fas fa-notes-medical icon-container"></i>
                                            <span>Update health status</span>
                                        </div>
                                        <div class="dropdown-item" role="button">
                                            <i class="far fa-edit icon-container"></i>
                                            <span>Edit case details</span>
                                        </div>
                                        <div class="dropdown-item" role="button">
                                            <i class="far fa-trash-alt icon-container"></i>
                                            <span>Remove this case</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>