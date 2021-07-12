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
                            <div id="establishmentName"></div>
                            <div class="small text-secondary" id="establishmentType"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>
                            <div id="establishmentRegion"></div>
                            <div id="establishmentProvince"></div>
                            <div id="establishmentCityBrgy"></div>
                            <div id="establishmentSpecificLocation"></div>
                            <div id="establishmentZipCode"></div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>