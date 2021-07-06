<!-- Vaccination Card Modal -->
<div class="modal fade" id="vaccCardModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="far fa-id-card modal-title-icon"></h5>
                <h5 class="modal-title">Vaccination Card</h5>
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
            <div class="modal-body bg-muted">
                <div>
                    <div class="flex-center mb-3">
                        <div class="overflow-auto">
                            <div class="card border" id="vaccinationCard" style="min-width: 750px; max-width: 750px;">
                                <div class="card-body">

                                    <!-- Vaccination Card Header -->
                                    <div class="mb-3">
                                        <h3>COVID-19 Vaccination Record Card</h3>
                                        <hr class="my-2">
                                        <div>Please keep this record card, which includes medical information about the vaccines you have received</div>
                                    </div>
                                
                                    <!-- Patient Full Name -->
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <span id="patientLastName">Dela Cruz,</span>
                                            <hr class="my-0">
                                            <span class="font-weight-semibold small">Last Name</span>
                                        </div>
                                        <div class="col-6">
                                            <span id="patientFirstName">Juan</span>
                                            <hr class="my-0">
                                            <span class="font-weight-semibold small">First Name</span>
                                        </div>
                                        <div class="col-1">
                                            <span id="patientMiddleInitial">S.</span>
                                            <hr class="my-0">
                                            <span class="font-weight-semibold small">MI</span>
                                        </div>
                                    </div>

                                    <!-- Patient Details -->
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <span id="patientBirthDate">July 12, 1998,</span>
                                            <hr class="my-0">
                                            <span class="font-weight-semibold small">Date of Birth</span>
                                        </div>
                                        <div class="col-6">
                                            <span id="patientNumber">ABC-00001-BSIT</span>
                                            <hr class="my-0">
                                            <span class="font-weight-semibold small">Patient Number</span>
                                        </div>
                                    </div>

                                    <!-- Patient Vaccination Records -->
                                    <table class="table table-bordered">
                                        <thead class="thead text-center">
                                            <th>Vaccine</th>
                                            <th>Product Name/Manufacturer Name</th>
                                            <th>Date</th>
                                            <th>Health Care Professional/Clinic Site</th>
                                        </thead>
                                        <tbody id="vaccCardDataRows">
                                            <tr>
                                                <td>1<sup>st</sup> Dose</td>
                                                <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                                <td><i class="text-muted font-weight-normal">--:--:--</i></td>
                                                <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                            <tr>
                                                <td>2<sup>nd</sup> Dose</td>
                                                <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                                <td><i class="text-muted font-weight-normal">--:--:--</i></td>
                                                <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                            </tr>
                                            <tr>
                                                <td>Other</td>
                                                <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                                <td><i class="text-muted font-weight-normal">--:--:--</i></td>
                                                <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                            </tr>
                                            <tr>
                                                <td>Other</td>
                                                <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                                <td><i class="text-muted font-weight-normal">--:--:--</i></td>
                                                <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
                <button class="btn btn-blue">
                    <span>Print this card</span>
                    <i class="fas fa-print ml-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Vaccination Record Details Modal -->
<div class="modal fade" id="vaccRecordDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-list modal-title-icon"></h5>
                <h5 class="modal-title">Vaccination Record Details</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                ><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
            </div>
            <div class="modal-body" id="QRCodeContainer">
                <table class="table">
                    <tr>
                        <th>Citizen</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user-circle text-secondary"></i>
                                </div>
                                <div>
                                <div>Juan Dela Cruz</div>
                                <div class="text-secondary small">
                                    <i class="fas fa-mars"></i>
                                    <span>Male, 21 years old</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Vaccine Used</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-secondary"></i>
                                </div>
                                <div>
                                    <div>(1<sup>st</sup> Dose) Pfizer-BioNTech</div>
                                    <div class="small text-secondary">
                                        <span data-toggle="tooltip" title="Vaccine Name">BNT162b2</span>
                                    </div>
                                    <div class="small text-secondary">
                                        <span data-toggle="tooltip" title="Manufacturer">Pfizer, Inc., and BioNTech</span>    
                                    </div>
                                </div>
                            </div>
                            
                            <div class="dropdown-divider"></div>

                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-secondary"></i>
                                </div>
                                <div>
                                    <div>(2<sup>nd</sup> Dose) Pfizer-BioNTech</div>
                                    <div class="small text-secondary">
                                        <span data-toggle="tooltip" title="Vaccine Name">BNT162b2</span>
                                    </div>
                                    <div class="small text-secondary">
                                        <span data-toggle="tooltip" title="Manufacturer">Pfizer, Inc., and BioNTech</span>    
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Date Vaccinated</th>
                        <td>
                            <div>Thursday, March 2, 2021</div>
                            <div class="text-secondary small">2 weeks ago</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Vaccinated By</th>
                        <td>Dr. Jimmy D. Valero</td>
                    </tr>
                    <tr>
                        <th>Vaccinated In</th>
                        <td>Philippine General Hospital</td>
                    </tr>
                    <tr>
                        <th>Remarks</th>
                        <td><span class="font-weight-normal text-muted font-italic">No remarks</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Delete Vaccination Record Modal -->
<div class="modal" id="deleteVaccRecordModal" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="far fa-trash-alt modal-title-icon"></h5>
                <h5 class="modal-title">Delete Vaccination Record</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                ><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
            </div>
            <div class="modal-body" id="QRCodeContainer">
                <p>Are your sure you want to delete this record?</p>

                <!-- Vaccination Record Details -->
                <table class="table">
                    <tr>
                        <th>Citizen</th>
                        <td>
                            <div>Juan Dela Cruz</div>
                            <div class="text-secondary small">
                                <i class="fas fa-mars"></i>
                                <span>Male, 21 years old</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Vaccine Used</th>
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
                        <th>Date Vaccinated</th>
                        <td>
                            <div>Thursday, March 2, 2021</div>
                            <div class="text-secondary small">2 weeks ago</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Vaccinated By</th>
                        <td>Dr. Jimmy D. Valero</td>
                    </tr>
                    <tr>
                        <th>Vaccinated In</th>
                        <td>Philippine General Hospital</td>
                    </tr>
                    <tr>
                        <th>Remarks</th>
                        <td><span class="font-weight-normal text-muted font-italic">No remarks</span></td>
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
                <button type="submit" class="btn btn-danger">
                    <span>Delete</span>
                    <i class="fas fa-trash-alt ml-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>