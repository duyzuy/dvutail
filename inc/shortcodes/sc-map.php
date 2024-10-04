<?php
function create_dvutail_map_shortcode($atts, $content = null)
{
    $attr = shortcode_atts(array(
        'lat' => '10.781678',
        'lang' => '106.655092',
        'height_large'    => '450px',
        'height_mobile' => '300px'
    ), $atts);

    ob_start();
?>
    <style>
        #maper {
            height: <?php echo $attr['height_mobile'] . 'px' ?>;
            width: 100%;
        }

        .gm-style div>div:last-child>div>div:first-child>div {
            background: #f1f1f1 !important;
        }

        .gm-style div>div:last-child>div>div:first-child>div:nth-child(3)>div div {
            background-color: #f1f1f1 !important;
        }

        .gm-style div>div:last-child>div>div:first-child>div:first-child {
            background: transparent !important;
        }

        .info-win {
            color: #252525;
            font-size: 13px;
        }

        @media only screen and (min-width: 992px) {
            #maper {
                height: <?php echo  $attr['height_large'] . 'px' ?>
            }
        }
    </style>
    <script>
        async function initMap() {
            const locationRio = {
                lat: <?php echo $attr['lat'] ?>,
                lng: <?php echo $attr['lang'] ?>
            };
            const mapOptions = {
                "center": locationRio,
                "clickableIcons": true,
                "disableDoubleClickZoom": false,
                "draggable": true,
                "fullscreenControl": true,
                "keyboardShortcuts": true,
                "mapMaker": true,
                "mapTypeControl": false,
                "mapTypeControlOptions": {
                    "text": "Default (depends on viewport size etc.)",
                    "style": 0
                },
                "mapTypeId": "roadmap",
                "rotateControl": true,
                "scaleControl": true,
                "scrollwheel": false,
                "streetViewControl": true,
                "zoom": 16,
                "zoomControl": true,
                "styles": [{
                    "featureType": "all",
                    "elementType": "all",
                    "stylers": [{
                            "saturation": -100
                        },
                        {
                            "gamma": 1
                        }
                    ]
                }],
            };
            const mapicon = {
                url: '<?php echo get_template_directory_uri() . '/assets/images/icon-map-sgsv.png' ?>',
                scaledSize: new google.maps.Size(60, 79)
            };
            const map = new google.maps.Map(document.getElementById('maper'), mapOptions);
            const contentString = '<div id="map-content" class="info-win" style="max-width: 320px;">' +
                '<h1 id="firstHeading" class="firstHeading" style="font-size: 20px;"><?php echo $attr['title'] ?? "" ?></h1>' +
                '<div id="bodyContent">' +
                '<p style="margin-bottom: 0"><?php echo $attr['address'] ?? "" ?></p>' +
                '<p><?php echo $attr['website'] ?? "" ?></p>' +
                '</div>' +
                '</div>';
            const infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            const marker = new google.maps.Marker({
                position: locationRio,
                map: map,
                icon: mapicon,
                fontSize: "8px",
                animation: google.maps.Animation.DROP,
            });


            marker.setAnimation(google.maps.Animation.BOUNCE);
            /* infowindow.open(map, marker); */

        }
    </script>
    <!-- https://maps.googleapis.com/maps/api/js?key=INSERT_YOUR_API_KEY&callback=initMap&libraries=marker&v=beta&solution_channel=GMP_CCS_infowindows_v -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKVtdH6QqFGpenUe4N6hoROqlTxjOGyq0&callback=initMap"></script>
    <!-- <gmp-map center="-25.363, 131.044" zoom="4" map-id="DEMO_MAP_ID">
        <gmp-advanced-marker position="-25.363, 131.044" title="Uluru" gmp-clickable></gmp-advanced-marker>
    </gmp-map> -->
    <div id="maper" class="pt-[68%] w-full"></div>

<?php return ob_get_clean();
}

add_shortcode('dvutail_map', 'create_dvutail_map_shortcode');
