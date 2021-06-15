<div class="container px-3 py-4">

    <!-- Title Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">Vaccination Records</h2>
            <div class="text-secondary">Manage vaccinated individuals and their records</div>
        </div>
        
        <div class="card d-none d-md-block">
            <div class="card-body text-monospace">
                <span id="clockDate"></span>,
                <span id="clockTime"></span>
                <span id="clockSession"></span>
            </div>
        </div>
    </div>

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
                <table 
                    class       = "table" 
                    id          = "dataTable" 
                    width       = "100%" 
                    cellspacing = "0"
                >
                    <thead class="thead">
                        <tr>
                            <th>Citizen</th>
                            <th>Age</th>
                            <th>Vaccine</th>
                            <th>Date Vaccinated</th>
                            <th>Vaccinated by</th>
                            <th>Vaccinated in</th>
                            <th>Remarks</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<20;$i++) { ?>
                        <tr>
                            <td>
                                <i class="fas fa-user-circle icon-container"></i>
                                <span>Dela Cruz, Juan</span>
                            </td>
                            <td>21</td>
                            <td>Moderna COVID-19 Vaccine PF</td>
                            <td>March 2, 2021</td>
                            <td>Dr. Jimmy D. Valero</td>
                            <td>Philippine General Hospital</td>
                            <td>
                                <span class="text-muted font-weight-normal font-italic">No remarks</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <div class="d-inline" data-toggle="dropdown">
                                        <div 
                                            class       = "btn btn-white-muted btn-sm" 
                                            role        = "button"
                                            data-toggle = "tooltip" 
                                            title       = "More"
                                        ><i class="fas fa-ellipsis-v"></i></div>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right border-0">
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#vaccCardModal"
                                        >
                                            <i class="far fa-id-card icon-container"></i>
                                            <span>View citizen's card</span>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#vaccRecordDetailsModal"    
                                        >
                                            <i class="fas fa-list icon-container"></i>
                                            <span>View full details</span>
                                        </div>
                                        <div class="dropdown-item" role="button">
                                            <i class="far fa-edit icon-container"></i>
                                            <span>Edit this details</span>
                                        </div>
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#deleteVaccRecordModal"    
                                        >
                                            <i class="far fa-trash-alt icon-container"></i>
                                            <span>Delete this record</span>
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