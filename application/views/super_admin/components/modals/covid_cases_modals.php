<!-- Case Details Modal -->
<div class="modal fade" id="viewCaseDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
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
                        <td id="caseCodeForView"></td>
                    </tr>
                    <tr>
                        <th>Patient Name</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user text-secondary"></i>
                                </div>
                                <div>
                                    <div id="patientFullName"></div>
                                    <div class="text-secondary small" id="patientInfo"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Patient Address</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-map-marker-alt text-danger"></i>
                                </div>
                                <div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Region" 
                                        id="patientRegion"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Province" 
                                        id="patientProvince"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="City" 
                                        id="patientCity"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Street & Barangay" 
                                        id="patientStreetAndBrgy"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Specific Location" 
                                        id="patientSpecificLocation"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Zip Code" 
                                        id="patientZipCode"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Latitude & Longitude"
                                        class="text-secondary small"
                                        id="patientLongLat"
                                    ></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Date Confirmed</th>
                        <td>
                            <div id="confirmedDate"></div>    
                            <div class="text-secondary small"  id="confirmedDateHumanized"></div>    
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <span>Admitted?</span>
                            <i 
                                class="fas fa-question-circle text-secondary ml-1"
                                data-toggle="tooltip"
                                title="This indicate if the patient is admitted on any healthcare facility or establishment"
                            ></i>
                        </th>
                        <td id="admitted"></td>
                    </tr>
                    <tr>
                        <th>Current Health Status</th>
                        <td id="currentHealthStatus"></td>
                    </tr>
                    <tr>
                        <th>Record Added At</th>
                        <td>
                            <div id="addedAt"></div>    
                            <div id="addedAtHumanized" class="text-secondary small"></div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Record Updated At</th>
                        <td>
                            <div id="updatedAt"></div>    
                            <div id="updatedAtHumanized" class="text-secondary small"></div>    
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer bg-white p-3"></div>
        </div>
    </div>
</div>

<!-- Lab Report Modal -->
<div class="modal" id="labReportModal" tabindex="-1">
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
                        <th>Case Code</th>
                        <td id="caseCode"></td>
                    </tr>
                    <tr>
                        <th>Laboratory</th>
                        <td id="laboratory"></td>
                    </tr>
                    <tr>
                        <th>Requested Examination</th>
                        <td id="requestedExam"></td>
                    </tr>
                    <tr>
                        <th>Date & Time Requested</th>
                        <td>
                            <div id="requestedDate"></div>    
                            <div id="requestedTime"></div>    
                            <div class="text-secondary small" id="requestedDateTimeHumanized"></div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Date & Time Collected</th>
                        <td>
                            <div id="collectedDate"></div>    
                            <div id="collectedTime"></div>    
                            <div class="text-secondary small" id="collectedDateTimeHumanized"></div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Date & Time Released</th>
                        <td>
                            <div id="releasedDate"></div>    
                            <div id="releasedTime"></div>    
                            <div class="text-secondary small" id="releasedDateTimeHumanized"></div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Specimen ID</th>
                        <td id="specimenID"></td>
                    </tr>
                    <tr>
                        <th>Specimen Type</th>
                        <td id="specimenType"></td>
                    </tr>
                    <tr>
                        <th>Remarks</th>
                        <td id="remarks"></td>
                    </tr>
                    <tr>
                        <th>Performed by</th>
                        <td id="performedBy"></td>
                    </tr>
                    <tr>
                        <th>Verified by</th>
                        <td id="verifiedBy"></td>
                    </tr>
                    <tr>
                        <th>Noted by</th>
                        <td id="notedBy"></td>
                    </tr>
                    <tr>
                        <th>Encoded by</th>
                        <td id="encodedBy"></td>
                    </tr>
                    <tr>
                        <th>Date & Time Uploaded</th>
                        <td>
                            <div id="uploadedDate"></div>    
                            <div id="uploadedTime"></div>    
                            <div id="uploadedDateTimeHumanized" class="text-secondary small"></div>    
                        </td>
                    </tr>
                    <tr>
                        <th>Last Updated</th>
                        <td>
                            <div id="updatedDate"></div>    
                            <div id="updatedTime"></div>    
                            <div id="updatedDateTimeHumanized" class="text-secondary small"></div>    
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>