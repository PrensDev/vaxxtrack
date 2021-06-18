<div class="container px-3 py-sm-3 py-sm-4">

    <!-- Title Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">Your Vaccination Appointments</h2>
            <div class="text-secondary">Request and manage your appointments here</div>
        </div>
        
        <div class="card d-none d-md-block">
            <div class="card-body text-monospace">
                <span id="clockDate"></span>,
                <span id="clockTime"></span>
                <span id="clockSession"></span>
            </div>
        </div>
    </div>

    <!-- Appointments Card -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-file-signature mr-1"></i>
                <span>Vaccination Appointments</span>
            </div>
        </div>
        <div class="card-body">

            <!-- Appointments Controls -->
            <div class="form-group">
                <a href="<?= base_url() ?>c/create-appointment" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i>
                    <span>Create new appointment</span>
                </a>
            </div>

            <!-- Appointments DataTable -->
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead class="thead text-center">
                        <th>Date & Time Requested</th>
                        <th>Preferred Vaccine</th>
                        <th>Date Preferred</th>
                        <th>Status Approval</th>
                        <th>Approved By</th>
                        <th>Date & Time Approved</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>March 10, 2021; 11:00 A.M.</td>
                            <td>Pfizer BioTech</td>
                            <td>April 1, 2021</td>
                            <td>
                                <div class="badge alert-blue text-blue p-2 w-100">
                                    <i class="fas fa-stopwatch mr-1"></i>
                                    <span>Pending</span>
                                </div>
                            </td>
                            <td><span class="font-weight-normal font-italic text-muted">No approval yet</span></td>
                            <td><span class="font-weight-normal font-italic text-muted">No data yet</span></td>
                            <td class="text-center">
                                <div class="dropdown text-center">
                                    <div data-toggle="dropdown">
                                        <div 
                                            class       = "btn btn-sm btn-white-muted text-secondary"
                                            data-toggle = "tooltip"
                                            title       = "More"
                                        >
                                            <i class="fas fa-ellipsis-v"></i>
                                        </div>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right border-0">
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#appointmentDetailsModal"
                                        >
                                            <i class="icon-container fas fa-list"></i>
                                            <span>View Details</span>
                                        </div>
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#appointmentDetailsModal"
                                        >
                                            <i class="icon-container far fa-edit"></i>
                                            <span>Edit Appointment</span>
                                        </div>
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#cancelAppointmentModal"
                                        >
                                            <i class="icon-container far fa-times-circle"></i>
                                            <span>Cancel Appointment</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>March 10, 2021; 11:00 A.M.</td>
                            <td>Pfizer BioTech</td>
                            <td>April 1, 2021</td>
                            <td>
                                <div class="badge alert-danger text-danger p-2 w-100">
                                    <i class="fas fa-times mr-1"></i>
                                    <span>Rejected</span>
                                </div>
                            </td>
                            <td><span class="font-weight-normal font-italic text-muted">No approval yet</span></td>
                            <td><span class="font-weight-normal font-italic text-muted">No data yet</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <div data-toggle="dropdown">
                                        <div 
                                            class       = "btn btn-sm btn-white-muted text-secondary"
                                            data-toggle = "tooltip"
                                            title       = "More"
                                        ><i class="fas fa-ellipsis-v"></i></div>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right border-0">
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#appointmentDetailsModal"
                                        >
                                            <i class="icon-container fas fa-list"></i>
                                            <span>View Details</span>
                                        </div>
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#removeAppointmentModal"    
                                        >
                                            <i class="icon-container far fa-trash-alt"></i>
                                            <span>Remove from list</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>March 10, 2021; 11:00 A.M.</td>
                            <td>Pfizer BioTech</td>
                            <td>April 1, 2021</td>
                            <td>
                                <div class="badge alert-success text-success p-2 w-100">
                                    <i class="fas fa-check mr-1"></i>
                                    <span>Approved</span>
                                </div>
                            </td>
                            <td>Health Officer</td>
                            <td>March 13, 2021; 5:00 AM</td>
                            <td>
                                <div class="dropdown text-center">
                                    <div data-toggle="dropdown">
                                        <div 
                                            class       = "btn btn-sm btn-white-muted text-secondary"
                                            data-toggle = "tooltip"
                                            title       = "More"
                                        ><i class="fas fa-ellipsis-v"></i></div>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right border-0">
                                        <div 
                                            class       = "dropdown-item" 
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#appointmentDetailsModal"
                                        >
                                            <i class="icon-container fas fa-list"></i>
                                            <span>View Details</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>