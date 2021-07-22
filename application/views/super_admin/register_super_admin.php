<div class="container px-3 py-4">

    <!-- Title Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">Register new Super Admin</h2>
            <div class="text-secondary">Register a new super admin here by filling up the required fields</div>
        </div>
    </div>

    <form class="d-flex justify-content-center" id="registerSuperAdminForm">
        <div class="col-md-8 p-0">

            <!-- Health Official Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-header-text">
                        <i class="fas fa-info-circle mr-1"></i>
                        <span>General Information</span>
                    </div>
                </div>

                <div class="card-body">

                    <!-- First Name Field -->
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input 
                            type="text" 
                            class="form-control"
                            id="firstName"
                            name="firstName"
                            placeholder="Enter first name here"
                        >
                    </div>
                    
                    <!-- Middle Name Field -->
                    <div class="form-group">
                        <label for="middleName">Middle Name</label>
                        <input 
                            type="text" 
                            class="form-control"
                            id="middleName"
                            name="middleName"
                            placeholder="Enter middle name here"
                        >
                    </div>

                    <!-- Last Name Field -->
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input 
                            type="text" 
                            class="form-control"
                            id="lastName"
                            name="lastName"
                            placeholder="Enter last name here"
                        >
                    </div>

                    <!-- Suffix name -->
                    <div class="form-group">
                        <label for="suffixName">Suffix Name</label>
                        <select 
                            name="suffixName" 
                            id="suffixName" 
                            class="selectpicker form-control"
                            data-style="form-control border"
                            title="Please select a suffix name"
                        >
                            <option value="Jr.">Jr. (Junior)</option>
                            <option value="Sr.">Sr. (Sunior)</option>
                            <option value="III">III (The Third)</option>
                            <option value="IV">III (The Fourth)</option>
                            <option value="V">III (The Fifth)</option>
                            <option value="VI">III (The Sixth)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Account Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-header-text">
                        <i class="fas fa-user-cog mr-1"></i>
                        <span>Account settings</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="account">Email</label>
                        <input 
                            type="text" 
                            id="accountDetails"
                            name="accountDetails"
                            class="form-control"
                            placeholder="Enter health officials account here"
                        >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input 
                            type="password" 
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Set user password here"
                        >
                    </div>
                    <div class="form-group">
                        <label for="password">Retype Password</label>
                        <input 
                            type="password" 
                            id="retypePassword"
                            name="retypePassword"
                            class="form-control"
                            placeholder="Retype password to confirm"
                        >
                    </div>
                </div>
            </div>

            <!-- User Action -->
            <div class="form-group text-center">
                <button type="button" class="btn btn-muted" onclick="history.back()">Back</button>
                <button type="submit" class="btn btn-blue">Register</button>
            </div>
        </div>
    </form>
</div>