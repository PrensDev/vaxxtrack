<!-- Establishment Details Card / Digital Clock Card -->
<div class="row">

    <!-- Establishment Details -->
    <div class="col-xl-8 mb-4">
        <div class="card h-100" id="establishmentDetails">
            <div class="card-header d-flex justify-content-between align-items-center">
                
                <!-- Card Title -->
                <div class="card-header-text mr-1">
                    <i class="fas fa-building mr-1"></i>
                    <span>Establishment Details</span>
                </div>

                <!-- Establishment Settings -->
                <div class="dropdown">
                    <div role="button" data-toggle="dropdown">
                        <div class="btn btn-sm btn-muted" data-toggle="tooltip" title="Settings and More">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right shadow border-0" aria-labelledby="dropdownMenuButton">
                        <a 
                            class = "dropdown-item" 
                            href  = "<?= base_url() ?>r/establishment/1"
                        >   
                            <div class="icon-container">
                                <i class="fas fa-book"></i>
                            </div>
                            <span>Visiting Logbook</span>
                        </a>
                        <!-- <a class="dropdown-item" href="<?= base_url() ?>r/manage-representatives/1">
                            <div class="icon-container">
                                <i class="fas fa-users"></i>
                            </div>
                            <span>Manage Representatives</span>
                        </a> -->
                        <div class="dropdown-divider"></div>
                        <div 
                            class       = "dropdown-item"
                            role        = "button"
                            data-toggle = "modal"
                            data-target = "#establishmentDetailsModal"
                        >   
                            <div class="icon-container">
                                <i class="fas fa-list"></i>
                            </div>
                            <span>View establishment details</span>
                        </div>
                        <a 
                            class   ="dropdown-item" 
                            href    ="<?= base_url() ?>r/edit-establishment/1"
                        >   
                            <div class="icon-container">
                                <i class="fas fa-edit"></i>
                            </div>
                            <span>Edit establishment details</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <div 
                            class       = "dropdown-item" 
                            role        = "button" 
                            onclick     = "changePosition()"
                        >
                            <div class="icon-container">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <span>Change my position</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column flex-sm-row">

                    <!-- QR Code for Entry -->
                    <div class="flex-center align-items-sm-start mb-3 mb-sm-0 mr-sm-4">
                        <div data-toggle="modal" data-target="#QRCodeModal">
                            <div
                                class          = "border rounded d-flex justify-content-center align-items-center p-2"
                                role           = "button"
                                id             = "establishmentQRCode"
                                data-toggle    = "tooltip"
                                data-placement = "bottom"
                                title          = "QR Code" 
                            ></div>
                        </div>
                    </div>

                    <!-- Establishment and Representative Details -->
                    <div class="text-center text-sm-left flex-grow-1">
                        
                        <!-- Establishment Name -->
                        <h2 
                            class="text-uppercase font-weight-normal text-uppercase mb-3"
                            id="establishmentNameForDisplay"
                        ></h2>
                        
                        <!-- Bagde of Details -->
                        <div class="font-weight-bold text-secondary text-uppercase mb-3">
                            <span
                                class           = "badge alert-primary alert-primary p-2 mb-1"
                                data-toggle     = "tooltip"
                                data-placement  = "top"
                                title           = "Establishment Type"
                            >
                                <i class="fas fa-building mr-1"></i>
                                <span id="establishmentTypeForDisplay"></span>
                            </span>
                            <span
                                class           = "badge alert-blue text-blue p-2 mb-1"
                                data-toggle     = "tooltip"
                                data-placement  = "top"
                                title           = "Your role"
                            >
                                <i class="fas fa-user-tie mr-1"></i>
                                <span id="role"></span>
                            </span>
                        </div>

                        <!-- Establishment Location -->
                        <div class="d-flex">
                            <div class="mr-2 text-danger d-none d-sm-block">
                                <span
                                    data-toggle    = "tooltip"
                                    data-placement = "top"
                                    title          = "Location"
                                >
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <div id="establishmentLocationForDisplay"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Digital Clock -->
    <div class="d-none d-sm-block col-xl-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-clock mr-1"></i>
                    <span>Digital Clock</span>
                </div>
            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <div class="text-monospace">
                        <span class="mb-0 mr-1" id="clockTime" style="font-size: 3rem;"></span>
                        <span class="font-weight-normal h3" id="clockSession"></span>
                    </div>
                    <h6 class="font-weight-normal text-monospace" id="clockDate"></h6>
                    <small class="text-monospace">PHILIPPINE STANDARD TIME</small>
                </div>
            </div>
        </div>
    </div>

</div>