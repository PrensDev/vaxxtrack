<?php $this->load->view('register/components/register_header', ["registrant" => "Establishment Representative"]); ?>

<!-- Step Indicator -->
<div class="progress mb-4" style="height: 1.25rem;">
    <div 
        class="progress-bar font-weight-semibold" 
        role="progressbar" 
        id="stepIndicator"
        style="width: 100%"
    >Step 0 of 0</div>
</div>

<!-- Register Representative Form -->
<form id="registerRepresentativeForm">

    <!-- User Account Fieldset -->
    <fieldset id="userAccountFieldset">
        <div id="alertContainer"></div>
        <div class="form-group">
            <label for="email">Email</label>
            <input 
                class="form-control"
                type="email"
                id="email"
                name="email"
                placeholder="Type your email here"
            >
        </div>
    </fieldset>

    <!-- Account Verification Fieldset -->
    <fieldset id="accountVerificationFieldset">
        <div class="form-group">
            <label for="verificationCode">Please type the verification code we sent to your email</label>
            <input 
                class="form-control"
                type="text"
                id="verificationCode"
                name="verificationCode"
                placeholder="Type verification code here"
            >
        </div>
    </fieldset>

    <!-- Representative Information -->
    <fieldset id="repInfoFieldset">

        <!-- First Name -->
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input 
                class="form-control"
                type="text"
                id="firstName"
                name="firstName"
                placeholder="Type your first name here"
            >
        </div>

        <!-- Middle Name -->
        <div class="form-group">
            <label for="middleName" class="d-flex justify-content-between">
                <span>Middle Name</span>
                <div
                    class           = "d-inline text-muted ml-1"
                    data-toggle     = "tooltip"
                    data-placement  = "top"
                    title           = "Leave it blank if you don't have middle name"
                >
                    <i class="fas fa-question-circle"></i>
                </div>
            </label>
            <input 
                class="form-control"
                type="text"
                id="middleName"
                name="middleName"
                placeholder="Type your first name here"
            >
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input 
                class="form-control"
                type="text"
                id="lastName"
                name="lastName"
                placeholder="Type your last name here"
            >
        </div>

        <!-- Suffix Name -->
        <div class="form-group">
            <label for="suffix" class="d-flex justify-content-between">
                <span>Suffix</span>
                <div
                    class           = "d-inline text-muted ml-1"
                    data-toggle     = "tooltip"
                    data-placement  = "top"
                    title           = "Leave it blank if you don't have suffix name"
                >
                    <i class="fas fa-question-circle"></i>
                </div>
            </label>
            <select 
                name       = "suffixName" 
                id         = "suffixName" 
                class      = "selectpicker w-100"
                data-style = "border"
                title      = "Select a suffix name"
            >
                <option value="Jr.">Jr. (Junior)</option>
                <option value="Sr.">Sr. (Senior)</option>
                <option value="III">III (The Third)</option>
            </select>
        </div>
    </fieldset>

    <!-- Establishment Information -->
    <fieldset id="establishmentInfoFieldset">

        <!-- Establishment Name -->
        <div class="form-group">
            <label for="establishmentName">Name of your establishment</label>
            <input 
                type  = "text" 
                class = "form-control" 
                id    = "establishmentName" 
                name  = "establishmentName"
                placeholder="Type the name of your establishment"
            >
        </div>

        <!-- Establishment Type -->
        <div class="form-group">
            <label for="establishmentType">Type of establishment</label>
            <select 
                class       = "selectpicker form-control border" 
                id          = "establishmentType"
                name        = "establishmentType" 
                title       = "Please select a type for establishment"
                data-style  = "btn-white"
            >
                <option value="Company">Company</option>
                <option value="Business">Business</option>
                <option value="Village/Household">Village/Household</option>
                <option value="LGU">LGU</option>
                <option value="Organizational">Organizational</option>
            </select>
        </div>

        <!-- Position Field -->
        <div class="form-group">
            <label for="position">Your Position</label>
            <input 
                type  = "text" 
                class = "form-control" 
                name  = "position" 
                id    = "position" 
                placeholder="Type your position in this establishment"
            >
        </div>
    </fieldset>

    <!-- Establishment Address -->
    <fieldset id="addressFieldset">

        <!-- Region Field -->
        <div class="form-group">
            <label for="regionsDropdown">Region</label>
            <input type="hidden" id="regionName" name="regionName">
            <select 
                class            = "selectpicker form-control border" 
                name             = "region" 
                id               = "regionsDropdown"
                title            = "Select a region"
                data-style       = "btn-white"
                data-size        = "5"
                data-live-search = "true"
            >
                <option class="text-center small" disabled>No data</option>
            </select>
        </div>

        <!-- Province Field -->
        <div class="form-group">
            <label for="provincesDropdown">Province</label>
            <input type="hidden" id="provinceName" name="provinceName">
            <select 
                class            = "selectpicker form-control border" 
                name             = "provinces" 
                id               = "provincesDropdown"
                title            = "Select a province"
                data-style       = "btn-white"
                data-size        = "5"
                data-live-search = "true"
            >
                <option class="text-center small" disabled>Please select a region first</option>
            </select>
        </div>

        <!-- City/Municipality Field -->
        <div class="form-group">
            <label for="cities">City</label>
            <input type="hidden" id="cityName" name="cityName">
            <select 
                class            = "selectpicker form-control border" 
                name             = "cities" 
                id               = "citiesDropdown"
                title            = "Select a city"
                data-style       = "btn-white"
                data-size        = "5"
                data-live-search = "true"
            >
                <option class="text-center small" disabled>Please select a province first</option>
            </select>
        </div>

        <!-- Barangay -->
        <div class="form-group">
            <label for="barangay">Barangay</label>
            <input 
                type        = "text" 
                class       = "form-control" 
                name        = "barangay"
                id          = "barangay"
                placeholder = "Type street here"
            >
        </div>

        <!-- Street -->
        <div class="form-group">
            <label for="street">Street</label>
            <input 
                type        = "text" 
                class       = "form-control" 
                name        = "street"
                id          = "street"
                placeholder = "Type street here"
            >
        </div>

        <!-- Specific Location -->
        <div class="form-group">
            <label for="specificLocation">House/Building No. or Block & Lot No.</label>
            <input 
                type        = "text" 
                class       = "form-control" 
                id          = "specificLocation"
                name        = "specificLocation"
                placeholder = "Type specific location here"
            >
        </div>

        <!-- Longitude, latitude and Postal Code -->
        <div class="form-row d-none">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input 
                        type        = "hidden" 
                        class       = "form-control disabled" 
                        id          = "latitude"
                        name        = "latitude"
                        placeholder = "Latitude should display here"
                    >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input 
                        type        = "hidden" 
                        class       = "form-control disabled" 
                        id          = "longitude"
                        name        = "longitude"
                        placeholder = "Longitude should display here"
                    >
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="postalCode">Postal Code</label>
                    <input 
                        type        = "hidden" 
                        class       = "form-control disabled" 
                        id          = "postalCode"
                        name        = "postalCode"
                        placeholder = "Longitude should display here"
                    >
                </div>
            </div>
        </div>
    </fieldset>

    <!-- Password Fieldset -->
    <fieldset id="passwordFieldset">
        <div class="form-group">
            <label for="password">Type your password</label>
            <input 
                type="password" 
                class="form-control" 
                id="password"
                name="password"
                placeholder="Type your password here"
            >
        </div>
        <div class="form-group">
            <label for="confirmPassword">Retype password to confirm</label>
            <input 
                type="password" 
                class="form-control" 
                id="confirmPassword" 
                name="confirmPassword" 
                placeholder="Retype password to confirm"
            >
        </div>
    </fieldset>

    <!-- User Actions -->
    <div class="form-row">
        <div class="col" id="prevBtnContainer">
            <button type="button" class="btn btn-secondary btn-block" id="prevBtn">
                <i class="bi-arrow-left"></i>
                <span>Previous</span>
            </button>
        </div>
        <div class="col" id="nextBtnContainer">
            <button type="button" class="btn btn-blue btn-block" id="nextBtn">
                <span>Next</span>
                <i class="bi-arrow-right"></i>
            </button>
            <button type="submit" class="btn btn-success btn-block mt-0" id="submitBtn" style="display: none">
                <span>Submit</span>
            </button>
        </div>
    </div>
</form>

<div class="mt-5 text-center small">
    <a 
        href  = "<?= base_url() ?>login" 
        class = "text-secondary"
    >I already have an account</a>
</div>

<?php $this->load->view('register/components/register_footer') ?>

<script>

</script>