<!-- Main Content -->
<div class="container p-3">
    
    <!-- Form Header -->
    <div class="my-4">
        <h2 class="mb-0">Add an establishment</h2>
        <div class="text-secondary">Fill out the required fields with appropriate details of your establishment here</div>
    </div>
    
    <!-- Add establishment form -->
    <form id="addEstablishmentForm">

        <!-- General Information -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-building mr-1"></i>
                    <span>General Information</span>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="establishmentName">Establishment Name</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "establishmentName"
                                name        = "establishmentName"
                                placeholder = "e.g. ABC Company"
                            >
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="establishmentType">Establishment Type</label>
                            <select 
                                class      = "selectpicker w-100" 
                                name       = "establishmentType" 
                                id         = "establishmentType"
                                title      = "Please select a type for establishment"
                                data-style = "border form-control"
                            >
                                <option value="Company">Company</option>
                                <option value="Business">Business</option>
                                <option value="Village/Household">Village/Household</option>
                                <option value="LGU">LGU</option>
                                <option value="Organizational">Organizational</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Establishment Address -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    <span>Establishment Address</span>
                </div>
            </div>
            <div class="card-body">

                <!-- Region and Province Field -->
                <div class="form-row">

                    <!-- Region Field -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="region">Region</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "region"
                                name        = "region"
                                placeholder = "Enter region here"
                            >
                        </div>
                    </div>

                    <!-- Province Field -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "province"
                                name        = "province"
                                placeholder = "Enter province here"
                            >
                        </div>
                    </div>
                </div>

                <!-- City/Municipality and Barangay/District Field -->
                <div class="form-row">

                    <!-- City/Municiplaity Field -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="cityMunicipality">City/Municipality</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "cityMunicipality"
                                name        = "cityMunicipality"
                                placeholder = "Enter city/municipality here"
                            >
                        </div>
                    </div>

                    <!-- Baranggay/District Field -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="baranggayDistrict">Barangay/District</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "barangayDistrict"
                                name        = "barangayDistrict"
                                placeholder = "Enter barangay/district here"
                            >
                        </div>
                    </div>
                </div>

                <!-- Street Field -->
                <div class="form-group">
                    <label for="street">Street</label>
                    <input 
                        type        = "text" 
                        class       = "form-control" 
                        id          = "street"
                        name        = "street"
                        placeholder = "Enter street here"
                    >
                </div>

                <!-- Specific Location Field -->
                <div class="form-group">
                    <label for="specificLocation">Specific location</label>
                    <div class="text-muted small mb-1">Please type the specific location of your establishment</div>
                    <input 
                        type        = "text" 
                        class       = "form-control" 
                        id          = "specificLocation"
                        name        = "specificLocation"
                        placeholder = "Enter the specific location here"
                    >
                </div>
            </div>
        </div>

        <!-- Establishment Map Location -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-map mr-1"></i>
                    <span>Establishment Map Location</span>
                </div>
            </div>
            <div class="card-body">

                <!-- Latitude and Longitude Fields -->
                <div class="form-row">

                    <!-- Latitude Field -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="specificLocation">Latitude</label>
                            <input 
                                type  = "text" 
                                class = "form-control" 
                                id    = "specificLocation"
                                name  = "specificLocation"
                                value = "100.00&deg;"
                                readonly
                            >
                        </div>
                    </div>

                    <!-- Longitude Field -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="specificLocation">Latitude</label>
                            <input 
                                type  = "text" 
                                class = "form-control" 
                                id    = "specificLocation"
                                name  = "specificLocation"
                                value = "100.00&deg;"
                                readonly
                            >
                        </div>
                    </div>
                </div>

                <div class="bg-muted d-flex justify-content-center align-items-center rounded" style="height: 300px;">
                    <span>Map</span>
                </div>
            
            </div>
        </div>

        <!-- User Actions -->
        <div class="form-group text-center">
            <button type="submit" class="btn btn-blue">Add</button>
            <button type="button" class="btn btn-muted" onclick="location.back()">Cancel</button>
        </div>
    </form>
</div>