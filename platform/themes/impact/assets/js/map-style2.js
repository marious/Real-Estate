$(document).ready(function () {
    'use strict';

    if ($('#map-leaflet').length) {
        var map = L.map('map-leaflet', {
            zoom: 9,
            maxZoom: 20,
            tap: false,
            gestureHandling: true,
            center: [29.952654, 30.921919]
        });

        var marker_cluster = L.markerClusterGroup();

        map.scrollWheelZoom.disable();

        var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            scrollWheelZoom: false,
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        $.ajax($('#map-leaflet').data('url'), {
            success: function (markers) {
                markers.data.forEach(function (el) {
                    if (el.longitude && el.longitude) {

                        var icon = L.divIcon({
                            html: '<i class=\'fa fa-home\'></i>',
                            iconSize: [50, 50],
                            iconAnchor: [50, 50],
                            popupAnchor: [-20, -42]
                        });
                        var marker = L.marker([el.latitude, el.longitude], {
                            icon: icon
                        }).addTo(map);
                        marker.bindPopup(
                            '<div class="listing-window-image-wrapper">' +
                            '<a href="'+el.url+'">' +
                            '<div class="listing-window-image" style="background-image: url(' + el.image + ');"></div>' +
                            '<div class="listing-window-content">' +
                            '<div class="info">' +
                            '<h2>' + el.name + '</h2>' +
                            '<h3>' + el.price + '</h3>' +
                            '</div>' +
                            '</div>' +
                            '</a>' +
                            '</div>'
                        );

                    }

                });

                map.addLayer(marker_cluster);
            }
        });

    }

    if ($('#map').length) {
        var map2 = L.map('map', {
            zoom: 9,
            maxZoom: 20,
            tap: false,
            gestureHandling: true,
            center: [29.952654, 30.921919]
        });

        var marker_cluster2 = L.markerClusterGroup();

        map2.scrollWheelZoom.disable();

        var OpenStreetMap_Mapnik2 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            scrollWheelZoom: false,
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map2);

        $.ajax($('#map').data('url'), {
            success: function (markers) {
                markers.data.forEach(function (el) {
                    if (el.longitude && el.longitude) {

                        var icon = L.divIcon({
                            html: '<i class=\'fa fa-home\'></i>',
                            iconSize: [50, 50],
                            iconAnchor: [50, 50],
                            popupAnchor: [-20, -42]
                        });
                        var marker2 = L.marker([el.latitude, el.longitude], {
                            icon: icon
                        }).addTo(map2);
                        marker2.bindPopup(
                            '<div class="listing-window-image-wrapper">' +
                            '<a href="'+el.url+'">' +
                            '<div class="listing-window-image" style="background-image: url(' + el.image + ');"></div>' +
                            '<div class="listing-window-content">' +
                            '<div class="info">' +
                            '<h2>' + el.name + '</h2>' +
                            '<h3>' + el.price + '</h3>' +
                            '</div>' +
                            '</div>' +
                            '</a>' +
                            '</div>'
                        );

                    }

                });

                map2.addLayer(marker_cluster2);
            }
        });
    }

});
