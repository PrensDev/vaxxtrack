<div class="row justify-content-center">

    <!-- Heatmap -->
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-header-text">
                    <i class="fas fa-map-marked-alt mr-1"></i>
                    <span>Heatmap</span>
                </div>
                <a href="<?= base_url() ?>h/cases" class="btn btn-sm btn-danger">View List of Cases (PH)</a>
            </div>
            <div class="card-body" id="mapContainer">
                <div class="flex-center bg-muted rounded-lg" style="height: 500px">
                    <div class="text-center">
                        <div class="mb-3">
                            <button class="btn btn-primary" onclick="renderHeatmap()">Show the heatmap</button>
                        </div>
                        <i 
                            class       = "fas fa-question-circle" 
                            data-toggle = "tooltip" 
                            title       = "We choose not to display the map when the page is loaded for users have limited Internet data"
                        ></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- COVID-19 Active Cases count -->
    <!-- <div class="col-12 col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-info-circle mr-1"></i>
                    <span>COVID-19 Active Cases Count</span>
                </div>
            </div>
            <div class="card-body">
                <div class="h-100">
                </div>
            </div>
        </div>
    </div> -->

</div>