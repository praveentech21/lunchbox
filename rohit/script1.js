var map, pickupMarker, deliveryMarker, agentMarker;

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

    // Initialize agentMarker, but don't set position yet
    agentMarker = new google.maps.Marker({
        position: { lat: 0, lng: 0 },
        map: map,
        title: 'Agent Location'
    });
    agentMarker.setVisible(false); // Hide initially
}

function simulatePickup() {
    // Send AJAX request to simulate pickup
    $.ajax({
        url: 'pickup.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // Update agent location and show notification
            agentMarker.setPosition(pickupMarker.getPosition());
            agentMarker.setVisible(true); // Show agent marker
            alert(response.message);
        },
        error: function () {
            alert('Error simulating pickup.');
        }
    });
}

function simulateDelivery() {
    // Send AJAX request to simulate delivery
    $.ajax({
        url: 'delivery.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // Update agent location and show notification
            agentMarker.setPosition(deliveryMarker.getPosition());
            alert(response.message);
        },
        error: function () {
            alert('Error simulating delivery.');
        }
    });
}
