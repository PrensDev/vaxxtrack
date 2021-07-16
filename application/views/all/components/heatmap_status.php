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

<script>
    function renderHeatmap() {

        // Replace the map container body to map
        $('#mapContainer').html(`<div class="rounded-lg" id="casesHeatmap" style="height: 500px"></div>`)

        // Heatamp Data
        var heatmapData = {
            max: 8,
            data: [
                {lat: 14.68509, lng: 121.08629, count: 21},
                {lat: 14.52397, lng: 121.14981, count: 25},
                {lat: 14.7205, lng: 121.0374, count: 56},
                {lat: 15.1205, lng: 122.0374, count: 31},
                {lat: 14.7470, lng: 120.9950, count: 8},
                {lat: 14.8370, lng: 120.7850, count: 25},
                {lat: 14.7096, lng: 121.0998, count: 43},
                {lat: 13.8370, lng: 120.9950, count: 17},
                {lat: 14.65099, lng: 121.04862, count: 18},
                {lat: 14.70135, lng: 121.08491, count: 5},
                {lat: 15.70135, lng: 121.08491, count: 10},
                {lat: 15.10135, lng: 121.08491, count: 19},
                {lat: 15.50135, lng: 122.08491, count: 13},
                {lat: 13.50135, lng: 122.08491, count: 30},
            ]
        };
        
        // Base Layer
        var baseLayer = L.tileLayer(`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=${ LEAFLET_ACCESS_TOKEN }`, {
            attribution: LEAFLET_ATTRIBUTION,
            zoom: 5,
            maxZoom: 12,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'your.mapbox.access.token'
        });
        
        // Heatmap Layer
        var heatmapLayer = new HeatmapOverlay({
            "radius": 10,
            "maxOpacity": .8,
            "scaleRadius": false,
            "useLocalExtrema": true,
            latField: 'lat',
            lngField: 'lng',
            valueField: 'count'
        });
        
        // Map
        var map = new L.Map('casesHeatmap', {
            center: new L.LatLng(12.512,122.212),
            zoom: 5,
            maxZoom: 12,
            minZoom: 3,
            layers: [baseLayer, heatmapLayer]
        });
        
        // Set Data to Heatmap
        heatmapLayer.setData(heatmapData);
    }
</script>