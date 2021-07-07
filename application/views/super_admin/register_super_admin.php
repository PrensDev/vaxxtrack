<div class="container px-3 py-4">

    <!-- Title Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">Register new Super Admin</h2>
            <div class="text-secondary">Register a new super admin here by filling up the required fields</div>
        </div>
    </div>

    <form class="d-flex justify-content-center" id="registerHealthOfficial">
        <div class="col-md-8 p-0">

            <!-- Super Admin Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-header-text">
                        <i class="fas fa-info-circle mr-1"></i>
                        <span>General Information</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input 
                            type="text" 
                            class="form-control"
                            placeholder="Enter first name here"
                        >
                    </div>
                    <div class="form-group">
                        <label for="middleName">Middle Name</label>
                        <input 
                            type="text" 
                            class="form-control"
                            placeholder="Enter middle name here"
                        >
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input 
                            type="text" 
                            class="form-control"
                            placeholder="Enter last name here"
                        >
                    </div>
                    <div class="form-group">
                        <label for="suffixName">Suffix Name</label>
                        <select 
                            name="suffixName" 
                            id="suffixName" 
                            class="selectpicker form-control"
                            data-style="form-control border"
                        >
                            <option value="Jr.">Jr. (Junior)</option>
                            <option value="Sr.">Sr. (Sunior)</option>
                            <option value="III">III (The Third)</option>
                            <option value="IV">III (The Fourth)</option>
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
                        <label for="account">Account</label>
                        <input 
                            type="text" 
                            class="form-control"
                            placeholder="Enter health officials account here"
                        >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input 
                            type="text" 
                            class="form-control"
                            placeholder="Set user password here"
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