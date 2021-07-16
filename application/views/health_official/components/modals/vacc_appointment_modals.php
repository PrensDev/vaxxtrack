<!-- Vaccination Appointment Details Modal -->
<div class="modal fade" id="vaccAppointmentDetailsModal" tabindex="-1">
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
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body" id="QRCodeContainer">
                <table class="table">
                    <tr>
                        <th>Citizen</th>
                        <td id="Patientname">Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <th>Preferred Vaccine</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-success"></i>
                                </div>
                                <div>
                                    <div id="Productname"></div>
                                    <div class="small text-secondary">
                                        <span 
                                            data-toggle="tooltip" 
                                            data-placement="left"
                                            title="Vaccine Name" 
                                            id="Vaccinename"
                                        ></span>
                                    </div>
                                    <div class="small text-secondary">
                                        <span 
                                            data-toggle="tooltip" 
                                            data-placement="left"
                                            title="Manufacturer" 
                                            id="Manufacturer"
                                        ></span>    
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Preferred Date</th>
                        <td>
                            <div id="PreDate"></div>    
                            <div class="text-secondary small" id="PreMoment"></div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Date & Time Requested</th>
                        <td>
                            <div id="ColDate"></div>    
                            <div id="ColTime"></div>    
                            <div class="text-secondary small" id="ColMoment"></div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Apporval Status</th>
                        <td id="Status"></td>
                    </tr>
                    <tr>
                        <th>Approved By</th>
                        <td id="Approvedby"></span></td>
                    </tr>
                    <tr>
                        <th>Date & Time Approved</th>
                        <td id="ApprovedDandT"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer bg-white p-3"></div>
        </div>
    </div>
</div>


<!-- Change Approval Status Modal -->
<div class="modal" id="changeStatusApprovalModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="changeStatusApprovalForm">
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
            <div class="modal-body" id="QRCodeContainer">
                <label>Select the new status of this appointment</label>
                <input type="hidden" id="vaccAppointmentID" name="vaccAppointmentID">
                <div class="custom-control custom-radio py-2">
                    <input 
                        type="radio" 
                        id="pending" 
                        name="statusApproval" 
                        class="custom-control-input"
                        value="Pending"
                    >
                    <label class="custom-control-label font-weight-semibold" for="pending">
                        <i class="fas fa-stopwatch icon-container text-blue"></i>
                        <span>Pending</span>
                    </label>
                </div>
                <div class="custom-control custom-radio py-2">
                    <input 
                        type="radio" 
                        id="approved" 
                        name="statusApproval" 
                        class="custom-control-input"
                        value="Approved"
                    >
                    <label class="custom-control-label font-weight-semibold" for="approved">
                        <i class="fas fa-check icon-container text-success"></i>
                        <span>Approve</span>
                    </label>
                </div>
                <div class="custom-control custom-radio py-2">
                    <input 
                        type="radio" 
                        id="rejected" 
                        name="statusApproval" 
                        class="custom-control-input"
                        value="Rejected"
                    >
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