<!-- Header -->
<?php $this->load->view('_components/register_header', [
    "registrant" => "Establishment Representative"
]) ?>

<!-- Form form verification code -->
<form method="post" id="regCitizenForm" class="needs-validation" novalidate>
    <div id="step1-Number">
        <div class="form-group mb-5">
            <label for="verificationCode">Enter the verification code we sent to: </label>
            <b></b>
            <input 
                type  = "number" 
                class = "form-control" 
                name  = "verificationCode"
                id    = "verificationCode"
            >
            <div class="invalid-feedback">This is a required field</div>

            <p class="mt-3">The code will expired in <b id="timeLeft"></b></p>
        </div>

        <div class="form-group">
            <a 
                href  = "<?= base_url() ?>register/representative/step2" 
                class = "btn btn-success btn-block"
            >
                <span>Submit</span>
                <i class="bi-arrow-right ml-1"></i>
            </a>
            <a 
                href    = "<?= base_url() ?>register/representative"
                class   = "btn btn-muted btn-block text-dark" 
                id      = "useEmailBtn"
            >                
                <i class="bi-arrow-left"></i>
                <span>Back</span>
            </a>
        </div>
    </div>
</form>

<!-- Footer -->
<?php $this->load->view('_components/register_footer') ?>

<script>
    var eventTime   = moment().add(20, 's')
    var duration    = moment.duration(eventTime.diff(moment()));

    setInterval(() => {
        duration = moment.duration(duration - 1000, 'milliseconds');
        minutesLeft = duration.minutes();
        secondsLeft = duration.seconds();
        if(minutesLeft < 10) { minutesLeft = "0"+minutesLeft }
        if(secondsLeft < 10) { secondsLeft = "0"+secondsLeft }
        $('#timeLeft').html(minutesLeft + ":" + secondsLeft);
    }, 1000);
</script>