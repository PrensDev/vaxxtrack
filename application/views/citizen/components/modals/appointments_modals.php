<!-- Appointment Details Modal -->
<div 
    class           = "modal fade" 
    id              = "appointmentDetailsModal"
    tabindex        = "-1"
>
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
                            <span>Monday, February 24, 2021</span>
                            <span>11:52:24 AM</span>
                            <div class="small text-secondary">3 weeks ago</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Preferred Vaccine</th>
                        <td>
                            <div>Pfizer-BioNTech</div>
                            <div class="small text-secondary">
                                <span data-toggle="tooltip" title="Vaccine Name">BNT162b2</span>
                            </div>
                            <div class="small text-secondary">
                                <span data-toggle="tooltip" title="Manufacturer">Pfizer, Inc., and BioNTech</span>    
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Preferred Date for Vaccination</th>
                        <td>
                            <span>Thursday, April 1, 2021</span>
                            <div class="small text-secondary">1 week from now</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Status Approval</th>
                        <td>
                            <div class="badge alert-blue text-blue p-2">
                                <i class="fas fa-stopwatch mr-1"></i>
                                <span>Pending</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Approved By</th>
                        <td><span class="font-italic text-muted font-weight-normal">Not approved yet</span></td>
                    </tr>
                    <tr>
                        <th>Date & Time Approved</th>
                        <td><span class="font-italic text-muted font-weight-normal">No data yet</span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer p-3 bg-white"></div>
        </div>
    </div>
</div>


<!-- Remove Appointment modal -->
<div 
    class           = "modal" 
    id              = "removeAppointmentModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
>
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
                    id="removeVaccineModal"
                >
                    <span>Remove</span>
                    <i class="fas fa-trash-alt ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Cancel Appointment modal -->
<div 
    class           = "modal" 
    id              = "cancelAppointmentModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
>
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
                    id="removeVaccineModal"
                >Yes</button>
            </div>
        </form>
    </div>
</div>