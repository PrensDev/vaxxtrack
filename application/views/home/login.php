<!-- Login header -->
<?php $this->load->view('home/components/login_header') ?>

<div id="loginAlertContainer"></div>

<!-- Login form -->
<form id="loginForm">

    <!-- Email or Contact Number Field -->
    <div class="form-group">
        <label for="authDetails">Email or Contact Number</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-user"></i>
                </span>
            </div>
            <input 
                class       = "form-control" 
                type        = "text" 
                id          = "authDetails" 
                name        = "authDetails"
                placeholder = "Enter your email/contact number here"
                autofocus
            >
        </div>
    </div>

    <!-- Password field -->
    <div class="form-group">
        <div class="d-flex justify-content-between">
            <label for="password">Password</label>
            <a 
                href        = "<?= base_url() ?>forgot-password"
                data-toggle = "tooltip"
                title       = "Click this if you forgot your password"
            >Forgotten password?</a>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            <input 
                class       = "form-control" 
                type        = "password" 
                id          = "password" 
                name        = "password"
                placeholder = "Enter your password here" 
            >
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary btn-block">
        <span>Log in</span>
        <i class="fas fa-sign-in-alt ml-1"></i>
    </button>
    <button
        type        = "button"
        class       = "btn btn-muted btn-block text-dark"
        data-toggle = "modal"
        data-target = "#registerModal"
    >Register for an account</button>
</form>

<!-- Login footer -->
<?php $this->load->view('home/components/login_footer') ?>

<!-- Import required JS files for this view -->
<script src="<?= base_url() ?>public/js/ajax/home/login.ajax.js"></script>
