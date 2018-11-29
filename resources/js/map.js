slickInit($('#productsModal .slider'));

$('#products-list .user-product a').on('click', function () {
    renderProduct(window.locations, false, $(this).data('id'));
});

function slickInit($selector){
    $selector.slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        centerPadding: '20px',
        prevArrow:"<button class='slick-custom-btn slick-custom-prev btn btn-default glyphicon glyphicon-menu-left'></button>",
        nextArrow:"<button class='slick-custom-btn slick-custom-next btn btn-default glyphicon glyphicon-menu-right'></button>",
        variableWidth: true,
        adaptiveHeight: true,
    });
}

google.maps.event.addDomListener(window, "load", initGoogleMap('gmap', locations));


function renderProduct(product = [], marker = false, productID = false) {

    $.ajax({
        type: "POST",
        url: "/product/getProduct",
        data: {
            id: product.id
        },
        success: function (product) {
            if (productID !== false) {
                for (var i = 0; i < locations.length; i++) {
                    var prod = locations[i];
                    if (prod.id === productID) {
                        product = prod;
                    }
                }
            }
            map.setCenter(new google.maps.LatLng(product.lat - 0.031, product.lng));
            map.setZoom(12);

            console.log(product);

            var $productModal = $('#productsModal');
            $productModal.modal('hide');

            $productModal.find('.modal-title').html(product.title);
            $productModal.find('.product-thumbnail').attr('src', product.images.links[0]);
            $productModal.find('.description').html(product.description);
            $productModal.find('.product-view').attr('href', '/product/'+product.id).show();
            if(product.is_user_subscribed)
                $productModal.find('.is-subscribed').attr('href', '/product/'+product.id).show();
            else
                $productModal.find('.is-subscribed').attr('href', '/product/'+product.id).hide();

            $productModal.modal('show');
        }
    });

}

function initGoogleMap(selector, locations = [], triggerMarker = false) {
    window.markers = [];
    var defaultLat = 56.946285;
    var defaultLong = 24.105078;

    if ($('#' + selector).length) {
        var paths =  window.location.pathname.split('/');
        if(locations.length === 1 && paths[1] === 'product') {
            defaultLat  = locations[0].lat;
            defaultLong = locations[0].lng;
        }

        var infowindow = new google.maps.InfoWindow;
        var mapOption = {
            zoom: 12,
            center: new google.maps.LatLng(defaultLat, defaultLong),
            scaleControl: false,
            scrollwheel: false,
            mapTypeControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            gestureHandling: 'greedy',
            styles: [
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [{"color": "#444444"}]
                }, {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{"color": "#f2f2f2"}]
                }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]}, {
                    "featureType": "road",
                    "elementType": "all", "stylers": [{"saturation": -100}, {"lightness": 45}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [{"visibility": "simplified"}]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{"color": "#46bcec"}, {"visibility": "on"}]
                }]
        };
        window.map = new google.maps.Map(document.getElementById(selector), mapOption);
        map.panBy(-200, 0);

        function placeMarker(loc) {
            var latLng = new google.maps.LatLng(loc.lat, loc.lng);
            var marker = new google.maps.Marker({position: latLng, map: map, icon: {url: loc.images.icon}});
            google.maps.event.addListener(marker, "click", function (marker, i) {
                return function () {
                    renderProduct(loc, marker);
                }
            }(marker, i));
            markers.push(marker);

            return marker;
        }

        for (var i = 0; i < locations.length; i++) {
            var currentmarker = placeMarker(locations[i]);

            if (triggerMarker) new google.maps.event.trigger(currentmarker, 'click');
        }
    }


    google.maps.event.trigger(map, "resize");
}