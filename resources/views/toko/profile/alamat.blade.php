@extends('layouts/contentNavbarLayout')

@section('title', 'Accordion - UI elements')

@section('vendor-style')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" />
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Kelola Toko /</span> Alamat</h4>

<!-- Maps -->
<h5 class="mt-4">Maps</h5>

<!-- Basic Map -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Basic Map</h5>
      </div>
      <div class="card-body p-0">
        <div id="basicMap" style="height: 400px;"></div>
      </div>
    </div>
  </div>
</div>

<!-- Map with Markers -->
<div class="row mt-4">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Map with Markers</h5>
      </div>
      <div class="card-body p-0">
        <div id="markerMap" style="height: 400px;"></div>
      </div>
    </div>
  </div>
</div>

<!-- Interactive Map -->
<div class="row mt-4">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Interactive Map</h5>
        <div class="dropdown">
          <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
            Map Type
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" onclick="changeMapType('street')">Street</a></li>
            <li><a class="dropdown-item" href="#" onclick="changeMapType('satellite')">Satellite</a></li>
            <li><a class="dropdown-item" href="#" onclick="changeMapType('terrain')">Terrain</a></li>
          </ul>
        </div>
      </div>
      <div class="card-body p-0">
        <div id="interactiveMap" style="height: 450px;"></div>
      </div>
    </div>
  </div>
  
  <div class="col-lg-4">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Map Information</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <small class="text-muted">Current Location</small>
          <div id="currentLocation" class="fw-medium">Click on map to get coordinates</div>
        </div>
        <div class="mb-3">
          <small class="text-muted">Zoom Level</small>
          <div id="zoomLevel" class="fw-medium">10</div>
        </div>
        <div class="mb-3">
          <small class="text-muted">Total Markers</small>
          <div id="markerCount" class="fw-medium">0</div>
        </div>
        <hr>
        <div class="d-grid gap-2">
          <button class="btn btn-primary btn-sm" onclick="centerMap()">
            <i class="bx bx-crosshair me-1"></i>Center Map
          </button>
          <button class="btn btn-outline-secondary btn-sm" onclick="clearMarkers()">
            <i class="bx bx-trash me-1"></i>Clear Markers
          </button>
        </div>
      </div>
    </div>
    
    <!-- Map Legend -->
    <div class="card mt-3">
      <div class="card-header">
        <h6 class="card-title mb-0">Legend</h6>
      </div>
      <div class="card-body">
        <div class="d-flex align-items-center mb-2">
          <div class="badge bg-primary rounded-circle me-2" style="width: 12px; height: 12px;"></div>
          <small>Major Cities</small>
        </div>
        <div class="d-flex align-items-center mb-2">
          <div class="badge bg-success rounded-circle me-2" style="width: 12px; height: 12px;"></div>
          <small>Parks & Recreation</small>
        </div>
        <div class="d-flex align-items-center mb-2">
          <div class="badge bg-warning rounded-circle me-2" style="width: 12px; height: 12px;"></div>
          <small>Points of Interest</small>
        </div>
        <div class="d-flex align-items-center">
          <div class="badge bg-danger rounded-circle me-2" style="width: 12px; height: 12px;"></div>
          <small>Custom Markers</small>
        </div>
      </div>
    </div>
  </div>
</div>

<!--/ Maps -->
@endsection

@section('vendor-script')
<!-- Leaflet JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
@endsection

@section('page-script')
<script>
// Initialize maps when page loads
document.addEventListener('DOMContentLoaded', function() {
    initMaps();
});

let interactiveMapInstance;
let currentTileLayer;
let markersArray = [];

function initMaps() {
    // Basic Map
    const basicMap = L.map('basicMap').setView([42.3601, -71.0589], 10);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(basicMap);

    // Map with Markers
    const markerMap = L.map('markerMap').setView([42.3601, -71.0589], 10);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(markerMap);

    // Add sample markers
    const cities = [
        {name: 'Boston', coords: [42.3601, -71.0589], type: 'city'},
        {name: 'Cambridge', coords: [42.3736, -71.1097], type: 'university'},
        {name: 'Quincy', coords: [42.2529, -70.9995], type: 'residential'},
        {name: 'Newton', coords: [42.3370, -71.2092], type: 'park'}
    ];

    cities.forEach(city => {
        let color = 'blue';
        switch(city.type) {
            case 'city': color = 'blue'; break;
            case 'university': color = 'green'; break;
            case 'residential': color = 'orange'; break;
            case 'park': color = 'green'; break;
        }
        
        L.marker(city.coords)
            .addTo(markerMap)
            .bindPopup(`<strong>${city.name}</strong><br>Type: ${city.type}`);
    });

    // Interactive Map
    interactiveMapInstance = L.map('interactiveMap').setView([42.3601, -71.0589], 10);
    currentTileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(interactiveMapInstance);

    // Interactive map events
    interactiveMapInstance.on('click', function(e) {
        const lat = e.latlng.lat.toFixed(4);
        const lng = e.latlng.lng.toFixed(4);
        document.getElementById('currentLocation').textContent = `${lat}, ${lng}`;
        
        // Add custom marker
        const marker = L.marker(e.latlng)
            .addTo(interactiveMapInstance)
            .bindPopup(`<strong>Custom Marker</strong><br>Lat: ${lat}<br>Lng: ${lng}`);
        
        markersArray.push(marker);
        updateMarkerCount();
    });

    interactiveMapInstance.on('zoomend', function() {
        document.getElementById('zoomLevel').textContent = interactiveMapInstance.getZoom();
    });

    // Resize maps when needed
    setTimeout(() => {
        basicMap.invalidateSize();
        markerMap.invalidateSize();
        interactiveMapInstance.invalidateSize();
    }, 100);
}

function changeMapType(type) {
    if (!interactiveMapInstance) return;
    
    // Remove current tile layer
    interactiveMapInstance.removeLayer(currentTileLayer);
    
    // Add new tile layer based on type
    switch(type) {
        case 'street':
            currentTileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            });
            break;
        case 'satellite':
            currentTileLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: '© Esri'
            });
            break;
        case 'terrain':
            currentTileLayer = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenTopoMap'
            });
            break;
    }
    
    currentTileLayer.addTo(interactiveMapInstance);
}

function centerMap() {
    if (interactiveMapInstance) {
        interactiveMapInstance.setView([42.3601, -71.0589], 10);
    }
}

function clearMarkers() {
    markersArray.forEach(marker => {
        interactiveMapInstance.removeLayer(marker);
    });
    markersArray = [];
    updateMarkerCount();
    document.getElementById('currentLocation').textContent = 'Click on map to get coordinates';
}

function updateMarkerCount() {
    document.getElementById('markerCount').textContent = markersArray.length;
}
</script>
@endsection