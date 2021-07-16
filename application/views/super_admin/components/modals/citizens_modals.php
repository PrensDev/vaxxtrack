<!-- View Visiting Log Details Modal -->
<div
    class           = "modal fade" 
    id              = "viewCitizenDetailsModal" 
    tabindex        = "-1" 
>
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-user-circle"></h5>
                <h5 class="modal-title">Citizen Details</h5>
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
                        <th>Citizen</th>
                        <td class="d-flex align-items-baseline">
                            <div class="icon-container">
                                <i class="fas fa-user-circle text-secondary"></i>
                            </div>
                            <div>
                                <div id="citizenFullName"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>
                            <div id="citizenAge"></div>
                            <div class="small text-secondary" id="citizenBirthDate"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>Sex</th>
                        <td class="d-flex align-items-baseline" id="citizenSex"></td>
                    </tr>
                    <tr>
                        <th>Civil Status</th>
                        <td id="citizenCivilStatus"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td class="d-flex align-items-baseline">
                            <div class="icon-container">
                                <i class="fas fa-map-marker-alt text-danger"></i>
                            </div>
                            <div>
                                <div
                                    data-toggle="tooltip"
                                    data-placement="left"
                                    title="Region"
                                    id="region"
                                ></div>
                                <div
                                    data-toggle="tooltip"
                                    data-placement="left"
                                    title="Province"
                                    id="province"
                                ></div>
                                <div
                                    data-toggle="tooltip"
                                    data-placement="left"
                                    title="City"
                                    id="cityMunicipality"
                                ></div>
                                <div
                                    data-toggle="tooltip"
                                    data-placement="left"
                                    title="Barangay"
                                    id="barangayDistrict"
                                ></div>
                                <div
                                    data-toggle="tooltip"
                                    data-placement="left"
                                    title="Street"
                                    id="street"
                                ></div>
                                <div
                                    data-toggle="tooltip"
                                    data-placement="left"
                                    title="Specific Location"
                                    id="specificLocation"
                                ></div>
                                <div
                                    data-toggle="tooltip"
                                    data-placement="left"
                                    title="Zip Code"
                                    id="zipCode"
                                ></div>
                                <div
                                    data-toggle="tooltip"
                                    data-placement="left"
                                    title="Longitude & Latitude"
                                    class="small text-secondary"
                                >
                                    <span>Lat: <span id="latitude"></span></span>
                                    <span>Lng: <span id="longitude"></span></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Date Registered</th>
                        <td>
                            <div id="dateRegistered"></div>
                            <div class="small text-secondary" id="dateRegisteredHumanized"></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer p-3 bg-white"></div>
        </div>
    </div>
</div>