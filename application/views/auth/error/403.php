<div class="min-vh-100 d-flex justify-content-center align-items-center">
    <div class="m-3 text-center">
        <img 
            src       = "<?= base_url() ?>public/images/brand/403.svg" 
            alt       = "" 
            class     = "w-25"
            draggable = "false"
        >
        <h1 class="display-4 mb-2 mt-3">Forbidden</h1>
        <div class="font-weight-normal mb-3">You are not authorized to view your request.</div>
        <button onclick="history.back()" class="btn btn-primary mt-5">
            <i class="bi-arrow-left"></i>
            <span>Go Back</span>
        </button>
    </div>
</div>