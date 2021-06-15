<div class="container px-3 py-4">

    <!-- Title Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">Vaccination Appointments</h2>
            <div class="text-secondary">Manage here the appointments of citizens for vaccination</div>
        </div>

        <div class="card d-none d-md-block">
            <div class="card-body text-monospace">
                <span id="clockDate"></span>,
                <span id="clockTime"></span>
                <span id="clockSession"></span>
            </div>
        </div>
    </div>

    <!-- Vaccination Appointments Card -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-list mr-1"></i>
                <span>Records</span>
            </div>
        </div>
        <div class="card-body">

            <!-- Vaccination Appointments Table -->
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th>Citizen</th>
                            <th>Age</th>
                            <th>Preferred Vaccine</th>
                            <th>Preferred Date</th>
                            <th>Status Approval</th>
                            <th>Approved By</th>
                            <th>Date & Time Approved</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < 20; $i++) { ?>
                            <tr>
                                <td>
                                    <i class="fas fa-user-circle icon-container"></i>
                                    <span>Dela Cruz, Juan</span>
                                </td>
                                <td>21</td>
                                <td>Moderna COVID-19 Vaccine PF</td>
                                <td>March 2, 2021</td>
                                <td>
                                    <span data-toggle="tooltip" title="Click to change the current status approval">
                                        <div 
                                            class       = "badge alert-blue text-blue p-2 w-100"
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#changeApprovalStatusModal" 
                                        >
                                            <i class="fas fa-stopwatch mr-1"></i>
                                            <span>Pending</span>
                                        </div>
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted font-weight-normal font-italic">No data yet</span>
                                </td>
                                <td>
                                    <span class="text-muted font-weight-normal font-italic">No data yet</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <div data-toggle="dropdown">
                                            <div 
                                                class       = "btn btn-white-muted btn-sm" 
                                                data-toggle = "tooltip"
                                                title       = "More"
                                            ><i class="fas fa-ellipsis-v"></i></div>
                                        </div>

                                        <div class="dropdown-menu dropdown-menu-right border-0">
                                            <div 
                                                class       = "dropdown-item"
                                                role        = "button"
                                                data-toggle = "modal"
                                                data-target = "#vaccAppointmentDetailsModal"    
                                            >
                                                <i class="fas fa-list icon-container"></i>
                                                <span>View full details</span>
                                            </div>
                                            <div 
                                                class       = "dropdown-item" 
                                                role        = "button"
                                                data-toggle = "modal"
                                                data-target = "#changeApprovalStatusModal"  
                                            >
                                                <i class="far fa-edit icon-container"></i>
                                                <span>Change Status Approval</span>
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