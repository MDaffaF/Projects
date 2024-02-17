// function getLocation() {
                // Check if the Geolocation API is supported by the browser
                if (navigator.geolocation) {
                    // Request the current position
                    navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
                } else {
                    document.getElementById('locationResult').innerHTML = "Geolocation is not supported by your browser";
                }
                // 
            // }

            // Success callback function
            function successCallback(position) {
                // Access the latitude and longitude from the position object
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                document.getElementById("longitude").value = latitude;
                document.getElementById("latitude").value = longitude;

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