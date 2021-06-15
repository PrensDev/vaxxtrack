<!-- Appointment Details Modal -->
<div 
    class           = "modal fade" 
    id              = "appointmentDetailsModal"
    tabindex        = "-1"
    aria-labelledby = "appointmentDetailsModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Remove Appointment Modal -->
<div 
    class           = "modal" 
    id              = "removeAppointmentModal"
    tabindex        = "-1"
    aria-labelledby = "removeAppointmentModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-trash-alt"></h5>
                <h5 class="modal-title">Remove appointment</h5>
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
                <p>Are you sure you want to remove this appointment from your list?</p>
                <table class="table">
                    <tr>
                        <th>Date & Time Requested</th>
                        <td>
                            <div>Thursday, March 10, 2021</div>
                            <div class="text-secondary small">3 weeks ago</div>
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
                        <th>Preferred Date</th>
                        <td>
                            <div>Thursday, March 10, 2021</div>
                            <div class="text-secondary small">3 weeks ago</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Approval Status</th>
                        <td>
                            <div class="badge alert-danger text-danger p-2">
                                <i class="fas fa-times mr-1"></i>
                                <span>Rejected</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Preferred Date</th>
                        <td>
                            <div>Thursday, March 10, 2021</div>
                            <div class="text-secondary small">3 weeks ago</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Approved By</th>
                        <td>
                            <div>John Doe</div>
                            <div class="text-secondary small">Health Official</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Date & Time of Approval</th>
                        <td>
                            <div>Thursday, March 25, 2021</div>
                            <div class="text-secondary small">A week ago</div>
                        </td>
                    </tr>
                </table>
                <p class="small text-danger">Note: You cannot retrieved this record again forever</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Remove</button>
            </div>
        </div>
    </div>
</div>


<!-- Cancel Appointment Modal -->
<div 
    class           = "modal" 
    id              = "cancelAppointmentModal"
    tabindex        = "-1"
    aria-labelledby = "cancelAppointmentModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon far fa-times-circle"></h5>
                <h5 class="modal-title">Cancel appointment</h5>
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
                <p>Are you sure you want to cancel this appointment from your list?</p>
                <table class="table">
                    <tr>
                        <th>Date & Time Requested</th>
                        <td>
                            <div>Thursday, March 10, 2021</div>
                            <div class="text-secondary small">3 weeks ago</div>
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
                        <th>Preferred Date</th>
                        <td>
                            <div>Thursday, March 10, 2021</div>
                            <div class="text-secondary small">3 weeks ago</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Approval Status</th>
                        <td>
                            <div class="badge alert-blue text-blue p-2">
                                <i class="fas fa-stopwatch mr-1"></i>
                                <span>Pending</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Preferred Date</th>
                        <td>
                            <div>Thursday, March 10, 2021</div>
                            <div class="text-secondary small">3 weeks ago</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Approved By</th>
                        <td>
                            <div>John Doe</div>
                            <div class="text-secondary small">Health Official</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Date & Time of Approval</th>
                        <td>
                            <div>Thursday, March 25, 2021</div>
                            <div class="text-secondary small">A week ago</div>
                        </td>
                    </tr>
                </table>
                <p class="small text-danger">Note: You cannot retrieved this record again forever</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-warning">Yes, Cancel this</button>
            </div>
        </div>
    </div>
</div>