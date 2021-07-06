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
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
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
                            <div id="Productname">Pfizer-BioNTech</div>
                            <div class="small text-secondary">
                                <span data-toggle="tooltip" title="Vaccine Name" id="Vaccinename">BNT162b2</span>
                            </div>
                            <div class="small text-secondary">
                                <span data-toggle="tooltip" title="Manufacturer" id="Manufacturer">Pfizer, Inc., and BioNTech</span>    
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Preffered Date</th>
                        <td>
                            <div id="PreDate">Tuesday, January 1, 2021</div>    
                            <div class="text-secondary small" id="PreMoment">4 weeks from now</div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Date and Time Collected</th>
                        <td>
                            <div id="ColDate">Tuesday, January 1, 2021</div>    
                            <div id="ColTime">11:00:00 AM</div>    
                            <div class="text-secondary small" id="ColMoment">2 weeks ago</div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Apporval Status</th>
                        <td>
                            <div id="Status">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Approved By</th>
                        <td><span class="font-weight-norma text-muted font-italic" id="Approvedby">Not yet approved</span></td>
                    </tr>
                    <tr>
                        <th>Date & Time Approved</th>
                        <td><span class="font-weight-norma text-muted font-italic" id="ApprovedDandT">No data yet</span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>