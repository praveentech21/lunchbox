var map, pickupMarker, deliveryMarker;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: { lat: 16.543430, lng: 81.496518 }
    });

    pickupMarker = new google.maps.Marker({
        position: { lat: 16.546711, lng: 81.517508 },
        map: map,
        title: 'Pickup Location'
    });

    deliveryMarker = new google.maps.Marker({
        position: { lat: 16.562728, lng: 81.490769 },
        map: map,
        title: 'Delivery Location'
    });

    // simulateMovement();
}

function simulateMovement() {
    setInterval(function () {
        var pickupNewPosition = {
            lat: pickupMarker.getPosition().lat() + (Math.random() * 0.01 - 0.005),
            lng: pickupMarker.getPosition().lng() + (Math.random() * 0.01 - 0.005)
        };

        var deliveryNewPosition = {
            lat: deliveryMarker.getPosition().lat() + (Math.random() * 0.01 - 0.005),
            lng: deliveryMarker.getPosition().lng() + (Math.random() * 0.01 - 0.005)
        };

        pickupMarker.setPosition(pickupNewPosition);
        deliveryMarker.setPosition(deliveryNewPosition);

        map.panTo(pickupNewPosition); // You can choose to pan to either pickup or delivery position
    }, 5000); // Update every 5 seconds
}
