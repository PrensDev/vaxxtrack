<?php $this->load->view('register/components/register_header', ["registrant" => "Citizen"]); ?>

<!-- Step Indicator -->
<div class="progress mb-4" style="height: 1.25rem;">
    <div 
        class="progress-bar font-weight-semibold" 
        role="progressbar" 
        id="stepIndicator"
        style="width: 100%"
    >Step 0 of 0</div>
</div>

<!-- Register Citizen Form -->
<form id="registerCitizenForm">

    <!-- User Account Fieldset -->
    <fieldset id="emailFieldset">
        <div class="form-group">
            <label for="email">Email</label>
            <input 
                type        = "email" 
                class       = "form-control" 
                id          = "email"
                name        = "email"
                placeholder = "Type your email here"
                autofocus
            >
        </div>
    </fieldset>

    <!-- Account Verification Fieldset -->
    <fieldset id="verifyAccountFieldset">
        <p>Please type the code we sent to your email</p>
        <div class="form-group">
            <label for="verificationCode">Verify Email</label>
            <input 
                type        = "text" 
                class       = "form-control" 
                id          = "verificationCode"
                name        = "verificationCode"
                placeholder = "Type the verification code here"
            >
        </div>
    </fieldset>

    <!-- Citizen's Fullname Fieldset -->
    <fieldset id="fullNameFieldset">

        <!-- First name -->
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input 
                type        = "text" 
                class       = "form-control" 
                id          = "firstName"
                name        = "firstName"
                placeholder = "Type the verification code here"
                autofocus
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
                type        = "text" 
                class       = "form-control" 
                id          = "middleName"
                name        = "middleName"
                placeholder = "Type the verification code here"
            >
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input 
                type        = "text" 
                class       = "form-control" 
                id          = "lastName"
                name        = "lastName"
                placeholder = "Type the verification code here"
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

    <!-- Citizen's Address -->
    <fieldset id="addressFieldset">

        <!-- Region Field -->
        <div class="form-group">
            <label for="region">Region</label>
            <select 
                name="region" 
                id="regionsDropdown" 
                class="custom-select"
                placeholder="Select region"
            ></select>
        </div>

        <!-- Province Field -->
        <div class="form-group">
            <label for="province">Province</label>
            <select 
                name="province" 
                id="provincesDropdown" 
                class="custom-select"
                placeholder="Select province"
            ></select>
        </div>

        <!-- City/Municipality Field -->
        <div class="form-group">
            <label for="cityMunicipality">City/Municipality</label>
            <select 
                name="cityMunicipality" 
                id="citiesDropdown" 
                class="custom-select"
                placeholder="Select city or municipality"
            ></select>
        </div>

        <!-- Barangay/District Field -->
        <div class="form-group">
            <label for="baranggayDistrict">Barangay/District</label>
            <select 
                name="baranggayDistrict" 
                id="barangaysDropdown" 
                class="custom-select"
                placeholder="Select barangay or district"
            ></select>
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
    </fieldset>

    <!-- Citizen's Information Fieldset -->
    <fieldset id="infoFieldset">
        <div class="form-group">
            <label for="sex">Sex</label>
            <select 
                class       = "selectpicker form-control border" 
                name        = "sex" 
                id          = "sex"
                title       = "Select your biological sex"
                data-style  = "btn-white"
            >
                <option value="F" data-icon="fas fa-venus icon-container text-danger">
                    <span>Female</span>
                </option>
                <option value="M" data-icon="fas fa-mars icon-container text-blue">
                    <span>Male</span>
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="birthDate">Date of Birth</label>
            <input 
                type        = "date" 
                class       = "form-control" 
                id          = "birthDate"
                name        = "birthDate"
            >
        </div>
        <div class="form-group">
            <label for="civilStatus">Civil Status</label>
            <select 
                class       = "selectpicker form-control border" 
                name        = "civilStatus" 
                id          = "civilStatus"
                title       = "Choose your current civil status"
                data-style  = "btn-white"
            >
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Separated">Separated</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
                <option value="Civil Partnership">Civil Partnership</option>
                <option 
                    value        = "Former Civil Partner" 
                    data-subtext = "(in a civil partnership that has ended by death or been dissolved)"
                >Former Civil Partner</option>
            </select>
        </div>
    </fieldset>

    <!-- Password Fieldset -->
    <fieldset id="passwordFieldset">
        <div class="form-group">
            <label for="password">Password</label>
            <input 
                type        = "password" 
                class       = "form-control" 
                id          = "password"
                name        = "password"
                placeholder = "Type you password here"
            >
        </div>
        <div class="form-group">
            <label for="confirmPassword">Retype Password to confirm</label>
            <input 
                type        = "password" 
                class       = "form-control" 
                id          = "confirmPassword"
                name        = "confirmPassword"
                placeholder = "Retype password to confirm"
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