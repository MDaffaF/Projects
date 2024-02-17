function initMap() {
    const exampleModal = document.getElementById('exampleModal')
    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const latitude = parseFloat(button.getAttribute('data-bs-latitude')); 
            const longitude = parseFloat(button.getAttribute('data-bs-longitude'));

            
            // Specify the initial map options
            var mapOptions = {
                center: {lat: longitude, lng: latitude}, 
                zoom: 16
            };

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            // Specify the marker position
            var markerPosition = {lat: longitude, lng: latitude}; // San Francisco, CA

            // Create a new marker and set its position
            var marker = new google.maps.Marker({
                position: markerPosition,
                map: map,
                title: 'San Francisco Marker'
            });
        })
    }
}