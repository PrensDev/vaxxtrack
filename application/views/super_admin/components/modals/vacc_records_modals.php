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
                                        <tbody id="vaccCardDataRows"></tbody>
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
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
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
                <table class="table border-bottom">

                    <!-- Citizen Information Row -->
                    <tr>
                        <th>Citizen Information</th>
                        <td>
                            <div>
                                <div class="d-flex align-items-baseline">
                                    <div class="icon-container">
                                        <i class="fas fa-user-circle text-secondary"></i>
                                    </div>
                                    <div>
                                    <div id="vaccinatedFullName">Juan Dela Cruz</div>
                                    <div class="text-secondary small" id="vaccinatedDetails"></div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div>
                                <div class="d-flex align-items-baseline">
                                    <div class="icon-container">
                                        <i class="fas fa-map-marker-alt text-danger"></i>
                                    </div>
                                    <div>
                                        <div
                                            data-toggle="tooltip"
                                            data-placement="left"
                                            title="Region"
                                            id="vaccinatedRegion"
                                        ></div>
                                        <div
                                            data-toggle="tooltip"
                                            data-placement="left"
                                            title="Province"
                                            id="vaccinatedProvince"
                                        ></div>
                                        <div
                                            data-toggle="tooltip"
                                            data-placement="left"
                                            title="City"
                                            id="vaccinatedCity"
                                        ></div>
                                        <div
                                            data-toggle="tooltip"
                                            data-placement="left"
                                            title="Street & Barangay"
                                            id="vaccinatedStreetAndBrgy"
                                        ></div>
                                        <div
                                            data-toggle="tooltip"
                                            data-placement="left"
                                            title="Specific Location"
                                            id="vaccinatedSpecificLocation"
                                        ></div>
                                        <div
                                            data-toggle="tooltip"
                                            data-placement="left"
                                            title="Zip Code"
                                            id="vaccinatedZipCode"
                                        ></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Vaccine Used Row -->
                    <tr>
                        <th>Vaccine Used</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-success"></i>
                                </div>
                                <div>
                                    <div id="productName">Pfizer-BioNTech</div>
                                    <div class="small text-secondary">
                                        <span 
                                            data-toggle="tooltip" 
                                            data-placement="left"
                                            title="Vaccine Name" 
                                            id="vaccineName"
                                        ></span>
                                    </div>
                                    <div class="small text-secondary">
                                        <span 
                                            data-toggle="tooltip" 
                                            data-placement="left"
                                            title="Manufacturer" 
                                            id="vaccManufacturer"
                                        ></span>    
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Date Vaccinated Row -->
                    <tr>
                        <th>Date Vaccinated</th>
                        <td>
                            <div id="vaccDate">Thursday, March 2, 2021</div>
                            <div class="text-secondary small" id="vaccDateHumanized">2 weeks ago</div>
                        </td>
                    </tr>

                    <!-- Vaccinated By Row -->
                    <tr>
                        <th>Vaccinated By</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user-md text-info"></i>
                                </div>
                                <div>
                                    <div id="vaccinatedBy">Dr. Mariel Valero</div>
                                    <div class="text-secondary small">Healthcare Professional</div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Vaccinated In Row -->
                    <tr>
                        <th>Vaccinated In</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-hospital-alt text-danger"></i>
                                </div>
                                <div>
                                    <div id="vaccinatedIn">Philippine General Hospital</div>
                                    <div class="text-secondary small">Healthcare Establishment</div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Remarks Row -->
                    <tr>
                        <th>Remarks</th>
                        <td id="remarks"></td>
                    </tr>

                    <!-- Record Added At Row -->
                    <tr>
                        <th>Record Added At</th>
                        <td>
                            <div id="recordAddedAt"></div>
                            <div class="text-secondary small" id="recordAddedAtHumanized"></div>
                        </td>
                    </tr>

                    <!-- Record Updated At Row -->
                    <tr>
                        <th>Record Updated At</th>
                        <td>
                            <div id="recordUpdatedAt"></div>
                            <div class="text-secondary small" id="recordUpdatedAtHumanized"></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer bg-white p-3"></div>
        </div>
    </div>
</div>