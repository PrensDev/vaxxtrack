<!-- Create Appointment Modal -->
<div class= "modal" id="createAppointmentModal" tabindex= "-1" >
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
                    <label for="requestedDate">When do you want to get vaccinated?</label>
                    <input 
                        type        = "date" 
                        class       = "form-control" 
                        id          = "requestedDate"
                        name        = "requestedDate"
                        placeholder = "Select a date"
                    >
                </div>

                <!-- Preferred Vaccine Field -->
                <div class="form-group">
                    <label for="preferredVaccine">What vaccine do you prefer?</label>
                    <select 
                        class="selectpicker w-100" 
                        id="preferredVaccine"
                        name="preferredVaccine"
                        data-style="border btn"
                        data-size="3"
                        data-live-search="true"
                        title="Select a vaccine"
                    >
                    </select>
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
<div class= "modal fade" id= "appointmentDetailsModal"tabindex= "-1">
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
                <table class="table">
                    <tr>
                        <th>Date & Time Requested</th>
                        <td>
                            <span id = "DayDate">Monday, February 24, 2021</span>
                            <span id = "Time">11:52:24 AM</span>
                            <div class="small text-secondary" id = "Daymoments">3 weeks ago</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Preferred Vaccine</th>
                        <td>
                            <div id = "productname">Pfizer-BioNTech</div>
                            <div class="small text-secondary" id = "vaccname">
                                <span data-toggle="tooltip" title="Vaccine Name">BNT162b2</span>
                            </div>
                            <div class="small text-secondary" id = "manufacturer">
                                <span data-toggle="tooltip" title="Manufacturer">Pfizer, Inc., and BioNTech</span>    
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Preferred Date for Vaccination</th>
                        <td>
                            <span id = "PreDayDate">Thursday, April 1, 2021</span>
                            <span id = "PreTime">11:52:24 AM</span>
                            <div class="small text-secondary" id = "PreDayMoment">1 week from now</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Status Approval</th>
                        <td>
                            <div class="badge alert-blue text-blue p-2" id = "status">
                                <i class="fas fa-stopwatch mr-1"></i>
                                <span>Pending</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Approved By</th>
                        <td><span class="font-italic text-muted font-weight-normal" id = "aprrovedby">Not approved yet</span></td>
                    </tr>
                    <tr>
                        <th>Date & Time Approved</th>
                        <td><span class="font-italic text-muted font-weight-normal" id = "datatimeapproved">No data yet</span></td>
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