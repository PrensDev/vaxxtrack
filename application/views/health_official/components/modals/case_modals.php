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

<!-- Attach Lab Report Modal -->
<div class="modal" id="attachLabReportModal" tabindex="-1">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="attachLabReportForm">
            <div class="modal-header">
                <h5 class="fas fa-file-medical modal-title-icon"></h5>
                <h5 class="modal-title">Attach Lab Report</h5>
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
            <div class="modal-body">
                
                <!-- Case ID -->
                <input type="hidden" id="caseID" name="caseID">

                <!-- Form -->
                <div class="form-row">

                    <!-- Laboratory -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="laboratory">Laboratory</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="laboratoryForAdd"
                                name="laboratory"
                                placeholder="Type laboratory here"
                            >
                        </div>
                    </div>

                    <!-- Requested Exam -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="requestedExamForAdd">Requested Examination</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="requestedExamForAdd"
                                name="requestedExam"
                                placeholder="Type requested examination here"
                            >
                        </div>
                    </div>

                    <!-- Requested Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="requestedDateForAdd">Requested Date</label>
                            <input 
                                type="date" 
                                class="form-control"
                                id="requestedDateForAdd"
                                name="requestedDate"
                                placeholder="Select requested date"
                            >
                        </div>
                    </div>

                    <!-- Collected Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="collectedDateForAdd">Collected Date</label>
                            <input 
                                type="date" 
                                class="form-control"
                                id="collectedDateForAdd"
                                name="collectedDate"
                                placeholder="Select collected date"
                            >
                        </div>
                    </div>

                    <!-- Released Date -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="releasedDateForAdd">Released Date</label>
                            <input 
                                type="date" 
                                class="form-control"
                                id="releasedDateForAdd"
                                name="releasedDate"
                                placeholder="Select released date"
                            >
                        </div>
                    </div>

                    <!-- Specimen ID -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="specimenIDForAdd">Specimen ID</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="specimenIDForAdd"
                                name="specimenID"
                                placeholder="Type specimen ID here"
                            >
                        </div>
                    </div>

                    <!-- Specimen Type -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="specimenTypeForAdd">Specimen Type</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="specimenTypeForAdd"
                                name="specimenType"
                                placeholder="Type specimen type here"
                            >
                        </div>
                    </div>

                    
                    <!-- Result -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="resultForAdd">Result</label>
                            <select 
                                class="selectpicker form-control"
                                id="resultForAdd"
                                data-style="form-control border"
                                name="result"
                                title="Please select result here"
                            >
                                <option value="Positive for SARS-CoV-2">Positive for SARS-CoV-2</option>
                                <option value="Negative for SARS-CoV-2">Negative for SARS-CoV-2</option>
                                <option value="Negative for test internal control">Negative for test internal control</option>
                            </select>
                        </div>
                    </div>

                    <!-- Remarks -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="remarksForAdd">Remarks</label>
                            <textarea 
                                class="form-control"
                                name="remarks" 
                                id="remarksForAdd" 
                                rows="5"
                                placeholder="Type remarks here"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Performed By -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="performedByForAdd">Performed By</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="performedByForAdd"
                                name="performedBy"
                                placeholder="Type who perform examination"
                            >
                        </div>
                    </div>

                    <!-- Verified By -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="verifiedByForAdd">Verified By</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="verifiedByForAdd"
                                name="verifiedBy"
                                placeholder="Type who verified examination"
                            >
                        </div>
                    </div>

                    <!-- Noted By -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="notedByForAdd">Noted By</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="notedByForAdd"
                                name="notedBy"
                                placeholder="Type who noted examination"
                            >
                        </div>
                    </div>

                    <!-- Encoded By -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="encodedByForAdd">Encoded By</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="encodedByForAdd"
                                name="encodedBy"
                                placeholder="Type who encoded examination"
                            >
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-blue">
                    <i class="fas fa-plus mr-1"></i>
                    <span>Attach</span>
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Update Health Status Modal -->
<div class="modal" id="updateCHSModal" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="updateCHSForm">
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
            <div class="modal-body" id="QRCodeContainer">
                
                <!-- Case ID (hidden) -->
                <div class="form-group d-none">
                    <input 
                        type="hidden" 
                        class="form-control" 
                        id="caseIDForUCHS" 
                        name="caseID"
                    >
                </div>

                <label>Select the new status of patient's health</label>

                <!-- Asymptomatic -->
                <label class="custom-control custom-radio py-2" for="asymptomatic">
                    <input 
                        type="radio" 
                        id="asymptomaticForUCHS" 
                        name="currentHealthStatus" 
                        class="custom-control-input"
                        value="Asymptomatic"
                    >
                    <label class="custom-control-label font-weight-semibold" for="asymptomatic">
                        <i class="fas fa-circle icon-container text-muted"></i>
                        <span>Asymptomatic</span>
                    </label>
                </label>

                <!-- Mild -->
                <label class="custom-control custom-radio py-2">
                    <input 
                        type="radio" 
                        id="mildForUCHS" 
                        name="currentHealthStatus" 
                        class="custom-control-input"
                        value="Mild"
                    >
                    <label class="custom-control-label font-weight-semibold" for="mildForUCHS">
                        <i class="fas fa-circle icon-container text-info"></i>
                        <span>Mild</span>
                    </label>
                </label>

                <!-- Severe -->
                <label class="custom-control custom-radio py-2">
                    <input 
                        type="radio" 
                        id="severeForUCHS" 
                        name="currentHealthStatus" 
                        class="custom-control-input"
                        value="Severe"
                    >
                    <label class="custom-control-label font-weight-semibold" for="severeForUCHS">
                        <i class="fas fa-circle icon-container text-warning"></i>
                        <span>Severe</span>
                    </label>
                </label>

                <!-- Critical -->
                <label class="custom-control custom-radio py-2">
                    <input 
                        type="radio" 
                        id="criticalForUCHS" 
                        name="currentHealthStatus" 
                        class="custom-control-input"
                        value="Critical"
                    >
                    <label class="custom-control-label font-weight-semibold" for="criticalForUCHS">
                        <i class="fas fa-circle icon-container text-danger"></i>
                        <span>Critical</span>
                    </label>
                </label>

                <!-- Died -->
                <label class="custom-control custom-radio py-2">
                    <input 
                        type="radio" 
                        id="diedForUCHS" 
                        name="currentHealthStatus" 
                        class="custom-control-input"
                        value="Died"
                    >
                    <label class="custom-control-label font-weight-semibold" for="diedForUCHS">
                        <i class="fas fa-circle icon-container text-dark"></i>
                        <span>Died</span>
                    </label>
                </label>

                <!-- Recovered -->
                <label class="custom-control custom-radio py-2">
                    <input 
                        type="radio" 
                        id="recoveredForUCHS" 
                        name="currentHealthStatus" 
                        class="custom-control-input"
                        value="Recovered"
                    >
                    <label class="custom-control-label font-weight-semibold" for="recoveredForUCHS">
                        <i class="fas fa-circle icon-container text-success"></i>
                        <span>Recovered</span>
                    </label>
                </label>
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


<!-- Remove Case Record Modal -->
<div class="modal" id="removeCaseRecordModal" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <form id="removeCaseRecordForm" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-trash-alt"></h5>
                <h5 class="modal-title">Delete Visiting Log</h5>
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
                <div class="d-sm-flex">
                    <div class="flex-center mb-3 mb-sm-0 mr-sm-3">
                        <img 
                            src="<?= base_url() ?>public/images/brand/warning.svg" 
                            alt="Warning" 
                            style="width: 8rem"
                            draggable="false"
                        >
                    </div>
                    <div>
                        
                        <!-- Visiting Log ID -->
                        <div class="form-group d-none">
                            <input 
                                type="hidden" 
                                class="form-control" 
                                id="caseIDForDelete" 
                                name="caseID"
                            >
                        </div>

                        <p>Are you sure you want to delete this record?</p>

                        <!-- Confirmation -->
                        <div class="form-group">
                            <label class="mb-0" for="confirmDeleteForVaccRecord">Type "CONFIRM" to continue</label>
                            <div class="small text-danger mb-3">Note: You cannot retrieved this record again forever if you are going to continue to delete this</div>
                            <input type="hidden" id="confirmRef"value="CONFIRM">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="confirmDeleteForVaccRecord"
                                name="confirm"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-muted border-0 py-1">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">
                    <span>Delete</span>
                    <i class="fas fa-trash-alt ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>
