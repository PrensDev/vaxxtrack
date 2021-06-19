<div class="container px-3 py-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'COVID-19 Cases Heatmap',
        'subtitle' => 'Trace COVID cases with this heatmap'
    ]); ?>

    <!-- Heatmap -->
    <div class="row">

        <!-- Heatmap -->
        <div class="col-12 col-lg-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-text">
                        <i class="fas fa-map-marked-alt mr-1"></i>
                        <span>Heatmap</span>
                    </div>
                    <a href="<?= base_url() ?>h/cases" class="btn btn-sm btn-danger">View List of Cases (PH)</a>
                </div>
                <div class="card-body">
                    <div id="casesHeatmap" style="height: 500px"></div>
                </div>
            </div>
        </div>

        <!-- COVID-19 Active Cases count -->
        <div class="col-12 col-lg-6 mb-4">
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
        </div>
    </div>

</div>


<script>

    // var casesHeatmap = L.map('casesHeatmap').setView([12.512,122.212], 5);

    // L.tileLayer(`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=${ LEAFLET_ACCESS_TOKEN }`, {
    //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    //     zoom: 5,
    //     maxZoom: 15,
    //     id: 'mapbox/streets-v11',
    //     tileSize: 512,
    //     zoomOffset: -1,
    //     accessToken: 'your.mapbox.access.token'
    // }).addTo(casesHeatmap);

    // var marker = L.marker([51.5, -0.09]).addTo(casesHeatmap);

    // don't forget to include leaflet-heatmap.js
    var testData = {
        max: 8,
        data: [
            {lat: 14.68509, lng: 121.08629, count: 21},
            {lat: 14.52397, lng: 121.14981, count: 18},
            {lat: 14.7205, lng: 121.0374, count: 34},
            {lat: 14.7470, lng: 120.9950, count: 8},
            {lat: 14.8370, lng: 120.7850, count: 25},
            {lat: 13.8370, lng: 120.9950, count: 9},
        ]
    };

    var baseLayer = L.tileLayer(`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=${ LEAFLET_ACCESS_TOKEN }`, {
        attribution: LEAFLET_ATTRIBUTION,
        zoom: 5,
        maxZoom: 12,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    });

    var cfg = {
        // radius should be small ONLY if scaleRadius is true (or small radius is intended)
        // if scaleRadius is false it will be the constant radius used in pixels
        "radius": 10,
        "maxOpacity": .8,
        // scales the radius based on map zoom
        "scaleRadius": false,
        // if set to false the heatmap uses the global maximum for colorization
        // if activated: uses the data maximum within the current map boundaries
        //   (there will always be a red spot with useLocalExtremas true)
        "useLocalExtrema": true,
        // which field name in your data represents the latitude - default "lat"
        latField: 'lat',
        // which field name in your data represents the longitude - default "lng"
        lngField: 'lng',
        // which field name in your data represents the data value - default "value"
        valueField: 'count'
    };


    var heatmapLayer = new HeatmapOverlay(cfg);

    var map = new L.Map('casesHeatmap', {
        center: new L.LatLng(12.512,122.212),
        zoom: 5,
        layers: [baseLayer, heatmapLayer]
    });

    heatmapLayer.setData(testData);
</script>