<!-- Lab Report Modal -->
<div 
    class           = "modal" 
    id              = "labReportModal" 
    tabindex        = "-1" 
    aria-labelledby = "labReportModal" 
    aria-hidden     = "true"
>
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-file-medical modal-title-icon"></h5>
                <h5 class="modal-title">Lab Report</h5>
                <div 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </div>
            </div>
            <div class="modal-body" id="QRCodeContainer">
                <table class="table">
                    <tr>
                        <th>Code</th>
                        <td>CASE-00001</td>
                    </tr>
                    <tr>
                        <th>Laboratory</th>
                        <td>Philippine General Hospital</td>
                    </tr>
                    <tr>
                        <th>Requested Examination</th>
                        <td>Real-time Polymerase Chain Reaction</td>
                    </tr>
                    <tr>
                        <th>Date and Time Requested</th>
                        <td>
                            <div>Tuesday, January 1, 2021</div>    
                            <div>11:00:00 AM</div>    
                            <div class="text-secondary small">2 weeks ago</div>    
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
                        <th>Date and Time Released</th>
                        <td>
                            <div>Wednesday, January 2, 2021</div>    
                            <div>11:00:00 AM</div>    
                            <div class="text-secondary small">2 weeks ago</div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Specimen ID</th>
                        <td>ABC-123456-BSIT1</td>
                    </tr>
                    <tr>
                        <th>Specimen Type</th>
                        <td>Nasopharyngeal and Oropharyngeal Swab</td>
                    </tr>
                    <tr>
                        <th>Remarks</th>
                        <td>Correlation with clinical and radiologic findings is recommended</td>
                    </tr>
                    <tr>
                        <th>Performed by</th>
                        <td>Dr. Ruth A. Sullivan</td>
                    </tr>
                    <tr>
                        <th>Verified by</th>
                        <td>Dr. Sylvia G. Wilber</td>
                    </tr>
                    <tr>
                        <th>Noted by</th>
                        <td>Dr. Michael J. Davis</td>
                    </tr>
                    <tr>
                        <th>Encoded by</th>
                        <td><span class="font-weight-normal text-muted font-italic">Unknown</span></td>
                    </tr>
                    <tr>
                        <th>Date Uploaded</th>
                        <td>
                            <div>Wednesday, January 10, 2021</div>    
                            <div>11:00:00 AM</div>    
                            <div class="text-secondary small">3 days ago</div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Last Updated</th>
                        <td>
                            <div>Wednesday, January 10, 2021</div>    
                            <div>11:00:00 AM</div>    
                            <div class="text-secondary small">3 days ago</div>    
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-blue">
                    <i class="fas fa-edit mr-1"></i>
                    <span>Edit</span>
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Update Health Status Modal -->
<div 
    class           = "modal" 
    id              = "updateHealthStatusModal" 
    data-backdrop   = "static"
    tabindex        = "-1" 
    aria-labelledby = "updateHealthStatusModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="far fa-edit modal-title-icon"></h5>
                <h5 class="modal-title">Update Health Status</h5>
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
                    <label>Select the new status of patient's health</label>
                    <label class="custom-control custom-radio py-2" for="asymptomatic">
                        <input type="radio" id="asymptomatic" name="approvalStatus" class="custom-control-input">
                        <label class="custom-control-label font-weight-semibold" for="asymptomatic">
                            <i class="fas fa-circle icon-container text-muted"></i>
                            <span>Asymptomatic</span>
                        </label>
                    </label>
                    <label class="custom-control custom-radio py-2">
                        <input type="radio" id="mild" name="approvalStatus" class="custom-control-input">
                        <label class="custom-control-label font-weight-semibold" for="mild">
                            <i class="fas fa-circle icon-container text-info"></i>
                            <span>Mild</span>
                        </label>
                    </label>
                    <div class="custom-control custom-radio py-2">
                        <input type="radio" id="severe" name="approvalStatus" class="custom-control-input">
                        <label class="custom-control-label font-weight-semibold" for="severe">
                            <i class="fas fa-circle icon-container text-warning"></i>
                            <span>Severe</span>
                        </label>
                    </div>
                    <div class="custom-control custom-radio py-2">
                        <input type="radio" id="critical" name="approvalStatus" class="custom-control-input">
                        <label class="custom-control-label font-weight-semibold" for="critical">
                            <i class="fas fa-circle icon-container text-danger"></i>
                            <span>Critical</span>
                        </label>
                    </div>
                    <div class="custom-control custom-radio py-2">
                        <input type="radio" id="died" name="approvalStatus" class="custom-control-input">
                        <label class="custom-control-label font-weight-semibold" for="died">
                            <i class="fas fa-circle icon-container text-dark"></i>
                            <span>Died</span>
                        </label>
                    </div>
                    <div class="custom-control custom-radio py-2">
                        <input type="radio" id="recovered" name="approvalStatus" class="custom-control-input">
                        <label class="custom-control-label font-weight-semibold" for="recovered">
                            <i class="fas fa-circle icon-container text-success"></i>
                            <span>Recovered</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-blue">
                        <span>Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Case Details Modal -->
<div 
    class           = "modal" 
    id              = "caseDetailsModal" 
    tabindex        = "-1" 
    aria-labelledby = "caseDetailsModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-file-medical modal-title-icon"></h5>
                <h5 class="modal-title">Case Details</h5>
                <div 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </div>
            </div>
            <div class="modal-body" id="QRCodeContainer">
                <table class="table">
                    <tr>
                        <th>Case Code</th>
                        <td>CASE-00001</td>
                    </tr>
                    <tr>
                        <th>Patient Name</th>
                        <td>
                            <div>Alejandro S. Matuta</div>
                            <div class="text-secondary small">
                                <i class="fas fa-mars"></i>
                                <span>Male, 21 years old. (Feb. 23, 1998)</span>
                            </div>
                            <div class="text-secondary small">Single</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Patient Address</th>
                        <td>
                            <div>NATIONAL CAPITAL REGION</div>
                            <div>NCR, 3<sup>rd</sup> (THIRD) DISTRICT</div>
                            <div>CITY OF CALOOCAN</div>
                            <div>Damong Maliit Street</div>
                            <div>Blk. 1 Lot 2, Sunrise Village</div>
                            <div>1124</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Date Confirmed</th>
                        <td>
                            <div>Tuesday, January 1, 2021</div>    
                            <div class="text-secondary small">2 weeks ago</div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Admmitted</th>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <th>Current Health Status</th>
                        <td><div class="badge alert-success text-success p-2">Recovered</div></td>
                    </tr>
                    <tr>
                        <th>Date Added</th>
                        <td>
                            <div>Tuesday, January 3, 2021</div>    
                            <div class="text-secondary small">2 weeks ago</div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Last Updated</th>
                        <td>
                            <div>Tuesday, January 3, 2021</div>    
                            <div class="text-secondary small">2 weeks ago</div>    
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-blue">
                    <i class="fas fa-edit mr-1"></i>
                    <span>Edit</span>
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Remove Case Record Modal -->
<div 
    class           = "modal" 
    id              = "removeCaseRecordModal" 
    data-backdrop   = "static"
    tabindex        = "-1" 
    aria-labelledby = "removeCaseRecordModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="far fa-trash-alt modal-title-icon"></h5>
                <h5 class="modal-title">Remove Case Record</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                ><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
            </div>
            <div class="modal-body" id="QRCodeContainer">
                <p>Are your sure you want to delete this record?</p>
                
                <!-- Case Record Details -->
                <table class="table">
                    <tr>
                        <th>Case Code</th>
                        <td>CASE-00001</td>
                    </tr>
                    <tr>
                        <th>Patient Name</th>
                        <td>
                            <div>Alejandro S. Matuta</div>
                            <div class="text-secondary small">
                                <i class="fas fa-mars"></i>
                                <span>Male, 21 years old. (Feb. 23, 1998)</span>
                            </div>
                            <div class="text-secondary small">Single</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Patient Address</th>
                        <td>
                            <div>NATIONAL CAPITAL REGION</div>
                            <div>NCR, 3<sup>rd</sup> (THIRD) DISTRICT</div>
                            <div>CITY OF CALOOCAN</div>
                            <div>Damong Maliit Street</div>
                            <div>Blk. 1 Lot 2, Sunrise Village</div>
                            <div>1124</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Date Confirmed</th>
                        <td>
                            <div>Tuesday, January 1, 2021</div>    
                            <div class="text-secondary small">2 weeks ago</div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Admmitted</th>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <th>Current Health Status</th>
                        <td><div class="badge alert-success text-success p-2">Recovered</div></td>
                    </tr>
                    <tr>
                        <th>Date Added</th>
                        <td>
                            <div>Tuesday, January 3, 2021</div>    
                            <div class="text-secondary small">2 weeks ago</div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Last Updated</th>
                        <td>
                            <div>Tuesday, January 3, 2021</div>    
                            <div class="text-secondary small">2 weeks ago</div>    
                        </td>
                    </tr>
                </table>

                <!-- Input Field for Delete Confirmation -->
                <div class="form-group">
                    <div>Type "<b>CONFIRM</b>" if you want to continue and click "Delete"</div>
                    <input type="text" class="form-control">
                </div>
                <p class="small text-danger">Note: You cannot retrieved this record again forever if you continue to delete this</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>