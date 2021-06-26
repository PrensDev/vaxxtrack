<!-- Vaccination Appointment Details Modal -->
<div 
    class           = "modal fade" 
    id              = "vaccAppointmentDetailsModal" 
    tabindex        = "-1" 
    aria-labelledby = "vaccAppointmentDetailsModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-file-medical modal-title-icon"></h5>
                <h5 class="modal-title">Vaccination Appointment Details</h5>
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
            <div class="modal-body" id="QRCodeContainer">
                <table class="table">
                    <tr>
                        <th>Citizen</th>
                        <td>Juan Dela Cruz</td>
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
                        <th>Preffered Date</th>
                        <td>
                            <div>Tuesday, January 1, 2021</div>    
                            <div class="text-secondary small">4 weeks from now</div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Date and Time Collected</th>
                        <td>
                            <div>Tuesday, January 1, 2021</div>    
                            <div>11:00:00 AM</div>    
                            <div class="text-secondary small">2 weeks ago</div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Apporval Status</th>
                        <td>
                            <div class="badge alert-blue text-blue p-2">
                                <i class="fas fa-stopwatch mr-1"></i>
                                <span>Pending</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Approved By</th>
                        <td><span class="font-weight-norma text-muted font-italic">Not yet approved</span></td>
                    </tr>
                    <tr>
                        <th>Date & Time Approved</th>
                        <td><span class="font-weight-norma text-muted font-italic">No data yet</span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Change Approval Status Modal -->
<div 
    class           = "modal" 
    id              = "changeApprovalStatusModal" 
    data-backdrop   = "static"
    tabindex        = "-1" 
    aria-labelledby = "changeApprovalStatusModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="far fa-edit modal-title-icon"></h5>
                <h5 class="modal-title">Change Approval Status</h5>
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
            <form id="changeApprovalStatusForm">
                <div class="modal-body" id="QRCodeContainer">
                    <label>Select the new status of this appointment</label>
                    <div class="custom-control custom-radio py-2">
                        <input type="radio" id="pending" name="approvalStatus" class="custom-control-input">
                        <label class="custom-control-label font-weight-semibold" for="pending">
                            <i class="fas fa-stopwatch icon-container text-blue"></i>
                            <span>Pending</span>
                        </label>
                    </div>
                    <div class="custom-control custom-radio py-2">
                        <input type="radio" id="approved" name="approvalStatus" class="custom-control-input">
                        <label class="custom-control-label font-weight-semibold" for="approved">
                            <i class="fas fa-check icon-container text-success"></i>
                            <span>Approve</span>
                        </label>
                    </div>
                    <div class="custom-control custom-radio py-2">
                        <input type="radio" id="rejected" name="approvalStatus" class="custom-control-input">
                        <label class="custom-control-label font-weight-semibold" for="rejected">
                            <i class="fas fa-times icon-container text-danger"></i>
                            <span>Reject</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-blue">
                        <span>Save</span>
                        <i class="fas fa-check ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>