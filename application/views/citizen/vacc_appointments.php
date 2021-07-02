<div class="container px-3 py-sm-3 py-sm-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Your Vaccination Appointments',
        'subtitle' => 'Request and manage your vaccination appointments here'
    ]); ?>

    <div id="alertContainer"></div>

    <!-- Appointments Card -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-file-signature mr-1"></i>
                <span>Vaccination Appointments</span>
            </div>
        </div>
        <div class="card-body">

            <!-- User Actions -->
            <div class="form-group text-center">
                <button 
                    class="btn btn-primary btn-sm" 
                    type="button"
                    data-toggle="modal" 
                    data-target="#createAppointmentModal"
                >
                    <i class="fas fa-plus mr-1"></i>
                    <span>Create new appointment</span>
                </button>
            </div>

            <!-- Vaccination Appointments DataTable -->
            <div class="table-responsive">
                <table class="table w-100" id="vaccAppointmentsDT">
                    <thead class="thead">
                        <th>Date & Time Requested</th>
                        <th>Preferred Vaccine</th>
                        <th>Preferred Date</th>
                        <th>Status Approval</th>
                        <th>Approved By</th>
                        <th>Date & Time Approved</th>
                        <th></th>
                    </thead>
                    <tbody>

                        <!-- Pending -->
                        <tr>
                            <td>
                                <div>March 10, 2021; 11:00 A.M.</div>
                                <div class="small text-secondary">3 months ago</div>
                            </td>
                            <td>
                                <div>Pfizer NBioTech</div>
                                <div class="small text-secondary">Pfizer-001</div>
                            </td>
                            <td>
                                <div>June 1, 2021</div>
                                <div class="small text-secondary">in 3 weeks</div>
                            </td>
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

                        <!-- Rejected -->
                        <tr>
                            <td>
                                <div>March 10, 2021; 11:00 A.M.</div>
                                <div class="small text-secondary">3 months ago</div>
                            </td>
                            <td>
                                <div>Pfizer NBioTech</div>
                                <div class="small text-secondary">Pfizer-001</div>
                            </td>
                            <td>
                                <div>June 1, 2021</div>
                                <div class="small text-secondary">in 3 weeks</div>
                            </td>
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

                        <!-- Approved -->
                        <tr>
                            <td>
                                <div>March 10, 2021; 11:00 A.M.</div>
                                <div class="small text-secondary">3 months ago</div>
                            </td>
                            <td>
                                <div>Pfizer NBioTech</div>
                                <div class="small text-secondary">Pfizer-001</div>
                            </td>
                            <td>
                                <div>June 1, 2021</div>
                                <div class="small text-secondary">in 3 weeks</div>
                            </td>
                            <td>
                                <div class="badge alert-success text-success p-2 w-100">
                                    <i class="fas fa-check mr-1"></i>
                                    <span>Approved</span>
                                </div>
                            </td>
                            <td>Health Official</td>
                            <td>
                                <div>June 1, 2021</div>
                                <div class="small text-secondary">2 weeks ago</div>
                            </td>
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