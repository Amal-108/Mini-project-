<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="Style_User.css">
    <link rel="stylesheet" href="dashboard.css">
    <title>Map View | LBLMS</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        /* Additional CSS for the Map View Section */
        .section.map-view {
            display: none;
            justify-content: space-between;
            align-items: flex-start;
            padding: 10px;
        }

        .section.map-view .form-container,
        .section.map-view .map-container {
            width: calc(50% - 20px);
        }

        .section.map-view .form-container {
            padding: 20px;
            background: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .section.map-view .map-container {
            position: relative;
            height: 410px;
        }

        .section.map-view .map-container #map {
            width: 180%;
            height: 100%;
        }

        /* Card Style */
        .action-selection {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .action-item {
            background: #ffffff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .action-item img {
            max-width: 100px;
            height: auto;
        }

        .action-item p {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        .action-item:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <h2>LB<span class="danger">LMS</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="Amindashboarddemo.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="UserManagement.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>User Management</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Reports</h3>
                </a>
                <a href="Admin_Map.php" class="active">
                    <span class="material-icons-sharp">map</span>
                    <h3>Map View</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Tickets</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Sale List</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Map View</h1>

            <!-- Action Selection Section -->
            <div class="action-selection">
                <div class="action-item" onclick="showMapView('add')">
                    <img src="Add_Location.png" alt="Add Location Icon">
                    <p>Add Location</p>
                </div>
                <div class="action-item" onclick="showMapView('delete')">
                    <img src="Delete_Location.png" alt="Delete Location Icon">
                    <p>Delete Location</p>
                </div>
                <div class="action-item" onclick="showMapView('modify')">
                    <img src="Modify_Location.png" alt="Modify Location Icon">
                    <p>Modify Location</p>
                </div>
                <div class="action-item">
                    <img src="View_Activities.png" alt="View Activities Icon">
                    <p>View Activities</p>
                </div>
                <!-- Add more action cards as needed -->
            </div>
            <!-- End of Action Selection Section -->

            <!-- Map View Section -->
            <div class="section map-view">
                <!-- Form Container -->
                <div class="form-container">
                    <h2 id="form-title">Map Controls</h2>
                    <form id="mapForm">
                        <div>
                            <label for="latitude">Latitude:</label>
                            <input type="number" id="latitude" name="latitude" step="0.0001" required>
                        </div>
                        <div>
                            <label for="longitude">Longitude:</label>
                            <input type="number" id="longitude" name="longitude" step="0.0001" required>
                        </div>
                        <div>
                            <label for="batchName">Batch Name:</label>
                            <input type="text" id="batchName" name="batchName" required>
                        </div>
                        <div id="activityField">
                            <label for="activityName">Activity Name:</label>
                            <input type="text" id="activityName" name="activityName" required>
                        </div>
                        <button type="button" id="mapActionButton" onclick="performMapAction()">Add Location</button>
                    </form>
                </div>
                <!-- Map Container -->
                <div class="map-container">
                    <div id="map"></div>
                </div>
            </div>
            <!-- End of Map View Section -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

            </div>
            <!-- End of Nav -->

            <!-- Additional Content Here -->
        </div>
        <!-- End of Right Section -->

    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialize the map
        var map;
        var markers = [];

        // Show the Map View Section and initialize the map
        function showMapView(action) {
            document.querySelector('.section.map-view').style.display = 'flex';
            document.getElementById('mapActionButton').setAttribute('data-action', action);

            // Update form and button based on action
            if (action === 'add') {
                document.getElementById('form-title').innerText = 'Add Location';
                document.getElementById('mapActionButton').innerText = 'Add Location';
                document.getElementById('activityField').style.display = 'block';
            } else if (action === 'delete') {
                document.getElementById('form-title').innerText = 'Delete Location';
                document.getElementById('mapActionButton').innerText = 'Delete Location';
                document.getElementById('activityField').style.display = 'none';
            } else if (action === 'modify') {
                document.getElementById('form-title').innerText = 'Modify Location';
                document.getElementById('mapActionButton').innerText = 'Modify Location';
                document.getElementById('activityField').style.display = 'block';
            }

            initMap();
        }

        function initMap() {
            // Initialize the map only once
            if (!map) {
                
                map = L.map('map').setView([9.9176, 77.1025], 12); // Center on Idukki with a zoom level of 12


                // Set up the OpenStreetMap tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19
                }).addTo(map);
            }
        }

        // Perform map action based on the button clicked
        function performMapAction() {
            var action = document.getElementById('mapActionButton').getAttribute('data-action');

            if (action === 'add') {
                addMarker();
            } else if (action === 'delete') {
                deleteMarker();
            } else if (action === 'modify') {
                modifyMarker();
            }
        }

        // Add a marker
        function addMarker() {
            // Get form values
            var latitude = parseFloat(document.getElementById('latitude').value);
            var longitude = parseFloat(document.getElementById('longitude').value);
            var batchName = document.getElementById('batchName').value;
            var activityName = document.getElementById('activityName').value;

            // Add a new marker
            var marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup('<b>Batch Name:</b> ' + batchName + '<br><b>Activity Name:</b> ' + activityName).openPopup();
            markers.push({ marker, latitude, longitude });

            // Center the map on the new marker
            map.setView([latitude, longitude], 13);
        }

        // Delete a marker
        function deleteMarker() {
            var latitude = parseFloat(document.getElementById('latitude').value);
            var longitude = parseFloat(document.getElementById('longitude').value);

            // Find the marker to delete
            var markerToDelete = markers.find(m => m.latitude === latitude && m.longitude === longitude);

            if (markerToDelete) {
                map.removeLayer(markerToDelete.marker);
                markers = markers.filter(m => m !== markerToDelete);
                alert('Location deleted successfully!');
            } else {
                alert('No marker found at the given location.');
            }
        }

        // Modify a marker
        function modifyMarker() {
            var latitude = parseFloat(document.getElementById('latitude').value);
            var longitude = parseFloat(document.getElementById('longitude').value);
            var batchName = document.getElementById('batchName').value;
            var activityName = document.getElementById('activityName').value;

            // Find the marker to modify
            var markerToModify = markers.find(m => m.latitude === latitude && m.longitude === longitude);

            if (markerToModify) {
                markerToModify.marker.setPopupContent('<b>Batch Name:</b> ' + batchName + '<br><b>Activity Name:</b> ' + activityName).openPopup();
                alert('Location modified successfully!');
            } else {
                alert('No marker found at the given location.');
            }
        }
    </script>
	<script src="orders.js"></script>
    <script src="index.js"></script>
</body>

</html>
