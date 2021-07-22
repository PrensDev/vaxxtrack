<!-- Create Appointment Modal -->
<div class= "modal" id="createAppointmentModal" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="createAppointmentForm">

            <div class="modal-header">
                <h5 class="fas fa-file-signature modal-title-icon"></h5>
                <h5 class="modal-title">Create Appointment</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>

            <div class="modal-body">

                <!-- Requested Date Field -->
                <div class="form-group">
                    <label for="requestedDateForAdd">When do you want to get vaccinated?</label>
                    <input 
                        type        = "date" 
                        class       = "form-control" 
                        id          = "requestedDateForAdd"
                        name        = "requestedDate"
                        placeholder = "Select a date"
                    >
                </div>

                <!-- Preferred Vaccine Field -->
                <div class="form-group">
                    <label for="preferredVaccine">What vaccine do you prefer?</label>
                    <select 
                        class            = "selectpicker w-100" 
                        id               = "preferredVaccineForAdd"
                        name             = "preferredVaccine"
                        data-style       = "border btn"
                        data-size        = "2"
                        data-live-search = "true"
                        title            = "Select a vaccine"
                    >
                        <option class="text-center small" disabled>No available vaccine yet</option>
                    </select>
                </div>

                <!-- Know more about vaccines -->
                <div class="form-group text-center">
                    <a href="<?= base_url() ?>c/available-vaccines" class="btn btn-sm btn-muted">Know more about vaccines?</a>
                </div>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-blue" >
                    <span>Create</span>
                    <i class="fas fa-plus ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Appointment Modal -->
<div class= "modal" id="editAppointmentModal" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="editAppointmentForm">

            <div class="modal-header">
                <h5 class="fas fa-file-signature modal-title-icon"></h5>
                <h5 class="modal-title">Edit Appointment</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>

            <div class="modal-body">

                <!-- Vaccination Appointment ID -->
                <input type="hidden" id="vaccinationAppointmentIDForEdit" name="vaccinationAppointmentID">

                <!-- Requested Date Field -->
                <div class="form-group">
                    <label for="requestedDateForEdit">When do you want to get vaccinated?</label>
                    <input 
                        type        = "date" 
                        class       = "form-control" 
                        id          = "requestedDateForEdit"
                        name        = "requestedDate"
                        placeholder = "Select a date"
                    >
                </div>

                <!-- Preferred Vaccine Field -->
                <div class="form-group">
                    <label for="preferredVaccineForEdit">What vaccine do you prefer?</label>
                    <select 
                        class="selectpicker form-control" 
                        id="preferredVaccineForEdit"
                        name="preferredVaccine"
                        data-style="border form-control"
                        data-size="2"
                        data-live-search="true"
                        title="Select a vaccine"
                        title="Select a vaccine"
                    ></select>
                </div>

                <!-- Know more about vaccines -->
                <div class="form-group text-center">
                    <a href="<?= base_url() ?>c/available-vaccines" class="btn btn-sm btn-muted">Know more about vaccines?</a>
                </div>
            </div>

            <div class="modal-footer border-0">
                <button 
                    type="button" 
                    class="btn btn-muted" 
                    data-dismiss="modal"
                >Cancel</button>
                <button 
                    type="submit" 
                    class="btn btn-blue" 
                >
                    <span>Create</span>
                    <i class="fas fa-plus ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Appointment Details Modal -->
<div class= "modal fade" id= "appointmentDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-file-alt"></h5>
                <h5 class="modal-title">Appointment Details</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table border-bottom">
                    <tr>
                        <th>Date & Time Requested</th>
                        <td>
                            <span id = "DayDate"></span>
                            <span id = "Time"></span>
                            <div class="small text-secondary" id = "Daymoments"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>Preferred Vaccine</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-success"></i>
                                </div>
                                <div>
                                    <div id="productName"></div>
                                    <div 
                                        class="small text-secondary" 
                                        id="vaccineName"
                                        data-toggle="tooltip" 
                                        data-placement="left"
                                        title="Vaccine Name" 
                                    ></div>
                                    <div 
                                        class="small text-secondary" 
                                        id="manufacturer" 
                                        data-toggle="tooltip" 
                                        data-placement="left"
                                        title="Manufacturer"
                                    ></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Preferred Date for Vaccination</th>
                        <td>
                            <div id="PreDayDate"></div>
                            <div id="PreTime"></div>
                            <div class="small text-secondary" id = "PreDayMoment"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>Status Approval</th>
                        <td id="status"></td>
                    </tr>
                    <tr>
                        <th>Approved By</th>
                        <td><span id="aprrovedby"></span></td>
                    </tr>
                    <tr>
                        <th>Date & Time Approved</th>
                        <td><span id="datatimeapproved"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer p-3 bg-white"></div>
        </div>
    </div>
</div>

<!-- Remove Appointment modal -->
<div class= "modal" id= "removeAppointmentModal" tabindex= "-1" data-backdrop= "static">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="removeAppointmentForm">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-trash-alt"></h5>
                <h5 class="modal-title">Remove Appointment</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex">
                    <div class="display-4 mr-3">
                        <img 
                            src="<?= base_url() ?>public/images/brand/warning.svg" 
                            alt="Warning" 
                            style="width: 8rem"
                            draggable="false"
                        >
                    </div>
                    <p>Are you sure you want to remove this appoitment?</p>
                </div>

                <!-- Vaccination Appointment ID -->
                <div class="form-group d-none">
                    <input type="text" name="vaccinationAppointmentID">
                </div>
            </div>
            <div class="modal-footer bg-muted border-0 py-1">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button 
                    type="submit" 
                    class="btn btn-danger" 
                >
                    <span>Remove</span>
                    <i class="fas fa-trash-alt ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Cancel Appointment modal -->
<div class= "modal" id= "cancelAppointmentModal" tabindex= "-1" data-backdrop= "static">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="cancelAppointmentForm">
            <div class="modal-header">
                <h5 class="modal-title-icon far fa-times-circle"></h5>
                <h5 class="modal-title">Cancel Appointment</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex">
                    <div class="display-4 mr-3">
                        <img 
                            src="<?= base_url() ?>public/images/brand/warning.svg" 
                            alt="Warning" 
                            style="width: 8rem"
                            draggable="false"
                        >
                    </div>
                    <p>Are you sure you want to cancel this appoitment?</p>
                </div>

                <!-- Vaccination Appointment ID -->
                <div class="form-group d-none">
                    <input type="text" name="vaccinationAppointmentID">
                </div>
            </div>
            <div class="modal-footer bg-muted border-0 py-1">
                <button type="button" class="btn btn-muted" data-dismiss="modal">No</button>
                <button 
                    type="submit" 
                    class="btn btn-warning" 
                >Yes</button>
            </div>
        </form>
    </div>
</div>