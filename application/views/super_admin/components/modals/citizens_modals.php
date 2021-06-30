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
                                <span id="citizenFullName">Dela Cruz, Juan</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>
                            <div id="citizenAge">21 years old</div>
                            <div class="small text-secondary" id="citizenBirthDate">April 14, 2000</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Sex</th>
                        <td class="d-flex align-items-baseline" id="citizenSex">
                            <div class="icon-container">
                                <i class="fas fa-venus text-danger"></i>
                            </div>
                            <div>Female</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Civil Status</th>
                        <td id="citizenCivilStatus">Single</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td class="d-flex align-items-baseline">
                            <div class="icon-container">
                                <i class="fas fa-map-marker-alt text-danger"></i>
                            </div>
                            <div>
                                <div id="region">NATIONAL CAPITAL REGION</div>
                                <div id="province">NCR, THIRD DISTRICT</div>
                                <div id="cityMunicipality">CITY OF VALENZUELA</div>
                                <div id="barangayDistrict">Bignay</div>
                                <div id="street">Hulo Street</div>
                                <div id="specificLocation">284 Hulo Ext.</div>
                                <div id="zipCode">1447</div>
                                <div class="small text-secondary">
                                    <span>Lat: <span id="latitude">14.25765</span></span>
                                    <span>Lng: <span id="longitude">114.25658</span></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Date Registered</th>
                        <td>
                            <div id="dateRegistered">January 1, 2021</div>
                            <div class="small text-secondary" id="dateRegisteredHumanized">3 months ago</div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer p-3 bg-white"></div>
        </div>
    </div>
</div>