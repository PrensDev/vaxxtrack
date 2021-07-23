<!-- Establishment QR Code Modal -->
<div class="modal" id="QRCodeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-qrcode modal-title-icon"></h5>
                <h5 class="modal-title">QR Code for Entry</h5>
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
                <div class="d-flex align-items-center justify-content-center" id="QRCodeContainer">
                    <div class="border rounded p-3" id="establishmentQRCodeInModal"></div>
                </div>
                <p class="mt-3 mb-1">Print this QR Code and post this beside of any entrance of your establishment</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-blue" id="printQRCodeBtn">
                    <i class="fas fa-print mr-1"></i>
                    <span>Print</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Change Position Modal -->
<div class="modal fade" id="changePositionModal" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title-icon fas fa-edit"></h5>
                    <h5 class="modal-title">Change position</h5>
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
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input 
                            class = "form-control" 
                            type  = "text" 
                            id    = "position" 
                            name  = "position"
                            value = "Dean"
                        >
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" disabled>Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Establishment Details Modal -->
<div class="modal fade" id="establishmentDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-building modal-title-icon"></h5>
                <h5 class="modal-title">Establishment Details</h5>
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

                    <!-- Establishment Details -->
                    <tr>
                        <th>Establishment</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-building text-secondary"></i>
                                </div>
                                <div>
                                    <div id="establishmentName"></div>
                                    <div 
                                        class="small text-secondary" 
                                        id="establishmentType"
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Establishment Type"
                                    ></div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Address -->
                    <tr>
                        <th>Address</th>
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
                                        id="establishmentRegion"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Province"
                                        id="establishmentProvince"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="City"
                                        id="establishmentCity"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Street & Barangay"
                                        id="establishmentStreetAndBarangay"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Specific Location"
                                        id="establishmentSpecificLocation"
                                    ></div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Zip/Postal Code"
                                        id="establishmentZipCode"
                                    ></div>
                                    <div 
                                        class="small text-secondary"
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Latitude and Longitude"
                                    >
                                        <span>(Lat: <span id="establishmentLatitude"></span>, Lng: <span id="establishmentLongitude"></span>)</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Map Location -->
                    <tr>
                        <td colspan="2">
                            <h6 class="font-weight-semibold mb-3">
                                <i class="fas fa-map-marker-alt mr-1 text-danger"></i>
                                <span>Map Location</span>
                            </h6>
                            <div id="establishmentLocationContainer">
                                <div class="flex-center bg-muted rounded-lg" style="height: 300px">
                                    <div class="text-center">
                                        <div class="mb-3">
                                            <input type="hidden" id="estLat">
                                            <input type="hidden" id="estLng">
                                            <input type="hidden" id="estName">
                                            <input type="hidden" id="estLoc">
                                            <button class="btn btn-primary" type="button" onclick="renderEstablishmentLocation()">
                                                <i class="fas fa-map-marker-alt mr-1"></i>
                                                <span>Show location</span>
                                            </button>
                                        </div>
                                        <i 
                                            class="fas fa-question-circle"
                                            data-toggle="tooltip"
                                            title="We used not to show the map after the page was loaded for some users that have limited Internet data"
                                        ></i>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Position -->
                    <tr>
                        <th>Your position</th>
                        <td id="position"></td>
                    </tr>

                    <!-- Added At -->
                    <tr>
                        <th>Added at</th>
                        <td>
                            <div id="establishmentAddedDate"></div>
                            <div id="establishmentAddedTime"></div>
                            <div class="small text=secondary" id="establishmentAddedAtHumanized"></div>
                        </td>
                    </tr>

                    <!-- Last Updated -->
                    <tr>
                        <th>Last Updated</th>
                        <td>
                            <div id="establishmentUpdatedDate"></div>
                            <div id="establishmentUpdatedTime"></div>
                            <div class="small text=secondary" id="establishmentUpdatedAtHumanized"></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-blue" href    ="<?= base_url() ?>r/edit-establishment/1">
                    <i class="fas fa-edit mr-1"></i>
                        
                    <span>Edit</span>
                </a>
            </div>
        </div>
    </div>
</div>