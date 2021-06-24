<!-- Title Header -->
<div class="flex-separated my-4">
    <div>
        <h1 class="m-0"><?= $title ?></h1>
        <div class="text-secondary"><?= $subtitle ?></div>
    </div>
    
    <div class="card d-none d-md-block text-dark border border-secondary">
        <div class="card-body text-monospace py-2 text-right">
            <div id="clockDate"></div>
            <div class="font-weight-bold">
                <span id="clockTime"></span>
                <span id="clockSession"></span>
            </div>
        </div>
    </div>
</div>