<!-- Visiting Log Details Modal -->
<div class="modal fade" id="visitingLogDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon far fa-file-alt"></h5>
                <h5 class="modal-title">Visiting Log Details</h5>
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
                        <th>Establishment</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-building text-secondary"></i>
                                </div>
                                <div>
                                    <div id="establishmentName"></div>
                                    <div class="small text-secondary" id="establishmentType"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>
                            <div class="d-flex align-item-baseline">
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
                                        title="Street & Barangay"
                                        id="establishmentCityBrgy"
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
                                        title="Zip Code"
                                        id="establishmentZipCode"
                                    ></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Purpose</th>
                        <td id="visitingPurpose"></td>
                    </tr>
                    <tr>
                        <th>Date & Time Entered</th>
                        <td>
                            <div id="dateEntered"></div>
                            <div id="timeEntered"></div>
                            <div class="small text-secondary" id="enteredFromNow"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>Your temperature</th>
                        <td id="tempWhenVisit"></td>
                    </tr>
                    <tr>
                        <th>Your health status</th>
                        <td id="healthStatusWhenVisit"></td>
                    </tr>
                    <tr>
                        <th>Allowed?</th>
                        <td id="allowedStatus"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer bg-white p-2"></div>
        </div>
    </div>
</div>