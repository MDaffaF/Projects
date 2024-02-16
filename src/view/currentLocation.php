<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Current Location</title>
</head>
<body>

    <h1>Get Current Location</h1>

    <button onclick="getLocation()">Get Location</button>

    <p id="locationResult"></p>

    <script>
        function getLocation() {
            // Check if the Geolocation API is supported by the browser
            if (navigator.geolocation) {
                // Request the current position
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            } else {
                document.getElementById('locationResult').innerHTML = "Geolocation is not supported by your browser";
            }
        }

        // Success callback function
        function successCallback(position) {
            // Access the latitude and longitude from the position object
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            document.getElementById('locationResult').innerHTML = "Latitude: " + latitude + "<br>Longitude: " + longitude;
        }

        // Error callback function
        function errorCallback(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    document.getElementById('locationResult').innerHTML = "User denied the request for Geolocation.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    document.getElementById('locationResult').innerHTML = "Location information is unavailable.";
                    break;
                case error.TIMEOUT:
                    document.getElementById('locationResult').innerHTML = "The request to get user location timed out.";
                    break;
                case error.UNKNOWN_ERROR:
                    document.getElementById('locationResult').innerHTML = "An unknown error occurred.";
                    break;
            }
        }
    </script>

</body>
</html>
