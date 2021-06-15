<!-- Header -->
<?php $this->load->view('_components/register_header', [
    'registrant' => 'Establishment Representative'
]) ?>

<!-- Form for Representative details -->
<form method="post" id="representativeForm" class="needs-validation" novalidate>
    <div id="step1-Number">
        <div class="form-group">
            <label for="password">Type your password</label>
            <input type="password" class="form-control" name="password" required>
            <div class="invalid-feedback">This is a required field</div>
        </div>

        <div class="form-group">
            <span>Strength:</span>
            <div class="badge badge-success p-2 text-uppercase">Strong</div>
        </div>

        <div class="form-group">
            <label for="retypePassword">Retype password to confirm</label>
            <input type="password" class="form-control" name="retypePassword" required>
            <div class="invalid-feedback">This is a required field</div>
        </div>

        <div class="form-row">
            <div class="col-6">
                <a 
                    href  = "<?= base_url() ?>register/representative" 
                    class = "btn btn-muted text-dark btn-block"
                >
                    <i class="bi-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="col-6">
                <a 
                    href  = "<?= base_url() ?>register/representative/success" 
                    class = "btn btn-blue btn-block"
                >
                    <span>Submit</span>
                    <i class="bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</form>

<!-- Footer -->
<?php $this->load->view('_components/register_footer') ?>
