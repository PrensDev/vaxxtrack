<?php $this->load->view('_components/register_header', ["registrant" => "Citizen"]); ?>

<form 
    method = "POST" 
    id     = "registerCznStep2Form"
    action = "<?= base_url() ?>register/citizen/step3"
>
    <div id="step1-Number">

        <!-- First Name Field -->
        <div class="form-group">
            <label for="firstName">First name</label>
            <input 
                type  = "text" 
                class = "form-control" 
                id    = "firstName"
                name  = "firstName"
            >
        </div>

        <!-- Middle Name Field -->
        <div class="form-group">
            <label for="middleName">Middle Name</label>
            <div class="input-group">
                <input 
                    type    = "text" 
                    class   = "form-control" 
                    id      = "middleName" 
                    name    = "middleName" 
                >
                <div class="input-group-append">
                    <div 
                        class          ="input-group-text"
                        data-toggle    ="tooltip"
                        data-placement ="top"
                        title          ="Middle name is optional"
                    >
                        <i class="fas fa-question"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Last Name Field -->
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input 
                type  = "text" 
                class = "form-control" 
                id    = "lastName"
                name  = "lastName"
            >
        </div>

        <!-- Suffix FIeld -->
        <div class="form-group">
            <label for="suffix">Suffix</label>
            <div class="input-group">
                <input 
                    type    = "text" 
                    class   = "form-control" 
                    id      = "suffix" 
                    name    = "suffix" 
                >
                <div class="input-group-append">
                    <div 
                        class          = "input-group-text"
                        data-toggle    = "tooltip"
                        data-placement = "top"
                        title          = "Leave it blank if you don't have suufix in your name"
                    >
                        <i class="fas fa-question"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Controls -->
        <div class="form-row">
            <div class="col-6">
                <a
                    type  = "<?= base_url() ?>register/citizen" 
                    class = "btn btn-muted btn-block"
                >
                    <i class="bi-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="col-6">
                <button
                    type    = "submit" 
                    class   = "btn btn-blue btn-block"
                >
                    <span>Submit</span>
                    <i class="bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('_components/register_footer') ?>