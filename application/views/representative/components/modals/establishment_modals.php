<!-- Establishment QR Code Modal -->
<div 
    class           = "modal" 
    id              = "QRCodeModal" 
    tabindex        = "-1" 
    aria-labelledby = "QRCodeModal" 
    aria-hidden     = "true"
>
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
            <div class="modal-body" id="QRCodeContainer">
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
<div 
    class           = "modal fade" 
    id              = "changePositionModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
    aria-labelledby = "exampleModalLabel" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title-icon fas fa-edit"></h5>
                    <h5 class="modal-title">Change position</h5>
                    <button 
                        class           = "btn btn-sm btn-white-muted" 
                        type            = "button" 
                        data-dismiss    = "modal" 
                        aria-label      = "Close"
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
                            class       = "form-control" 
                            type        = "text" 
                            id          = "position" 
                            name        = "position"
                            value       = "Dean"
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
<div 
    class           = "modal fade" 
    id              = "establishmentDetailsModal" 
    tabindex        = "-1" 
    aria-labelledby = "establishmentDetailsModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-building modal-title-icon"></h5>
                <h5 class="modal-title">ABC Company</h5>
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
                    <tr>
                        <th>Type</th>
                        <td>Company</td>
                    </tr>
                    <tr>
                        <th>Main Representative</th>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <th>No. of Representatives</th>
                        <td>5</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            <div class="mb-3">
                                <div>NATIONAL CAPTIAL REGION</div>
                                <div>METRO MANILA</div>
                                <div>CITY OF QUEZON</div>
                                <div>Commonwealth</div>
                                <div>Don Fabian</div>
                                <div>234, Progressive Village</div>
                            </div>
                        </td>
                    </tr>
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
                    <tr>
                        <th>Your position</th>
                        <td>Manager</td>
                    </tr>
                    <tr>
                        <th>Added at</th>
                        <td>May 1, 2021</td>
                    </tr>
                    <tr>
                        <th>Last Updated</th>
                        <td>May 1, 2021</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-blue">
                    <i class="fas fa-edit mr-1"></i>
                    <span>Edit</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function renderEstablishmentLocation() {

        $('#establishmentLocationContainer').html(`<div class="rounded-lg" style="height:300px" id="establishmentLocationMap"></div>`);

        var mymap = L.map('establishmentLocationMap', {
            dragging: false,
            doubleClickZoom: false
        }).setView([14.6309,121.0577], 13);
    
        L.tileLayer(`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=${ LEAFLET_ACCESS_TOKEN }`, {
            id: 'mapbox/streets-v11',
            attribution: LEAFLET_ATTRIBUTION,
            zoom: 5,
            maxZoom: 13,
            minZoom: 5,
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'your.mapbox.access.token'
        }).addTo(mymap);
    
        var marker = L.marker([14.6309,121.0577]).addTo(mymap);
        
        marker.bindPopup(`
            <div class="text-center p-2">
                <h6 class="mb-0 font-weight-semibold">ABC Company</h6>
                <div>Commonwealth, Quezon City</div>
            </div>
        `);
    }
</script>