var map;
function initialize() {
  var mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng(37.481178, 126.952642)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  //var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    console.log('supported');
    
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      //infoWindow.setPosition(pos);
      //infoWindow.setContent('Location found.');
      //map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }

  injectSampleData();
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}

google.maps.event.addDomListener(window, 'load', initialize);


function injectSampleData() {
  for (i=0; i<data.length; i++) {
    //var point = new GLatLng(data[i].pos[0], data[i].pos[1]);
    //map.addOverlay(new GMarker(point));
    var marker = new google.maps.Marker({
      map: map,
      position: {lat: data[i].pos[0], lng: data[i].pos[1]}
    });
    
    //marker.addListener('click', function() {
      //map.setZoom(8);
      //map.setCenter(marker.getPosition());
      //showShopInfo(data[i].shop);
    //});
    //var infowindow = new google.maps.InfoWindow();
    //infowindow.setContent('<b>방콕</b>');
    //google.maps.event.addListener(marker, 'click', function() {
    //  infowindow.open(map, marker);
    //});
    attachSecretMessage(marker, data[i].shop);
  }
}

function attachSecretMessage(marker, shop) {
  //var infowindow = new google.maps.InfoWindow({
  //  content: shop.name
  //});

  marker.addListener('click', function() {
    //infowindow.open(marker.get('map'), marker);
    showShopInfo(shop);
  });
}

function showShopInfo(shop) {
  console.log(shop);
  var l = $('#shopInfo');
  l.find('.shopName').text(shop.name);
}

// sample data
var data = [
  {
    'pos': [37.480625, 126.952175],
    'shop': {
      'name': 'McDonald'
    }
  },
  {
    'pos': [37.480037, 126.952100],
    'shop': {
      'name': 'PizzaHut'
    }
  },
  {
    'pos': [37.480752, 126.953098],
    'shop': {
      'name': 'SevenEleven'
    }
  }
];