<!-- Contact Details Modal -->
<div class="modal fade" id="viewContactDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-virus modal-title-icon"></h5>
                <h5 class="modal-title">Probable Contact Details</h5>
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
                <table class="table w-100 border-bottom">

                    <!-- Probable Contact Name -->
                    <tr>
                        <th>Name</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user text-danger"></i>
                                </div>
                                <div>
                                    <div id="contactFullName">Juan Dela Cruz</div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Personal Information -->
                    <tr>
                        <th>Personal Information</th>
                        <td>
                            <div class="d-flex align-items-baseline" data-toggle="tooltip" data-placement="left" title="Sex" id="contactSex">
                                <div class="icon-container">
                                    <i class="fas fa-venus text-danger"></i>
                                </div>
                                <span>Female</span>
                            </div>
                            <div class="d-flex align-items-baseline" data-toggle="tooltip" data-placement="left" title="Date of Birth">
                                <div class="icon-container">
                                    <i class="fas fa-calendar-alt text-secondary"></i>
                                </div>
                                <div>
                                    <div id="contactBirthDate">June 21, 2000</div>
                                    <div id="contactAge">21 years old</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-baseline" data-toggle="tooltip" data-placement="left" title="Civil Status">
                                <div class="icon-container">
                                    <i class="fas fa-user-friends text-secondary"></i>
                                </div>
                                <span id="contactCivilStatus">Single</span>
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
                                        id="contactRegion"
                                    >Test</div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Province" 
                                        id="contactProvince"
                                    >Test</div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="City" 
                                        id="contactCity"
                                    >Test</div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Street & Barangay" 
                                        id="contactStreetAndBrgy"
                                    >Test</div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Specific Location" 
                                        id="contactSpecificLocation"
                                    >Test</div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Zip Code" 
                                        id="contactZipCode"
                                    >Test</div>
                                    <div 
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Latitude & Longitude"
                                        class="text-secondary small"
                                        id="contactLongLat"
                                    ></div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Contact Information -->
                    <tr>
                        <th>Contact Information</th>
                        <td id="contactInfo">
                            <div>
                                <div class="icon-container">
                                    <i class="fas fa-envelope text-secondary"></i>
                                </div>
                                <span>jaundelacruz@gmail.com</span>
                            </div>
                            <div>
                                <div class="icon-container">
                                    <i class="fas fa-envelope text-secondary"></i>
                                </div>
                                <span>jaundelacruz@gmail.com</span>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Case Origin</th>
                        <td id="caseOrigin">CASE-00001</td>
                    </tr>
                    <tr>
                        <th>Date Added</th>
                        <td>
                            <div id="addedDate">Thursday, January 3, 2021</div>    
                            <div id="addedTime">11:35 PM</div>    
                            <div class="text-secondary small"  id="addedDateTimeHumanized">6 hours ago</div>    
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer bg-white p-3"></div>
        </div>
    </div>
</div>