<!DOCTYPE html>
<html>
  <head>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Montserrat:500i" rel="stylesheet">
    <!--     jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>
  <body>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>

      function googleCallback() {

        getLocation(initMap);

      };        

      function getLocation(cb) {
        var locationAPI = 'https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyB6xcpZTDb-FpyrEt_NmsEt64PD9NDV6_8';
        var returnResult;
        //GETJSON REQUEST
        $.ajax({
          url: locationAPI,
          type:'POST'
        })
        .done(function( data ) {
          var currentLat = data['location']['lat'];
          var currentLng = data['location']['lng'];

          var returnResult = {
            'lat': currentLat,
            'lng': currentLng
          };

          if (cb) {
            cb(returnResult);
          }
          
        });
      }
      // function getDirections(originLat, originLng, destStNum, destStName,destStType,destCity){

      //   //API URL
      //   var directionsAPI = 'http://maps.googleapis.com/maps/api/directions/json?origin='+originLat+','+originLng+'&destination='+destStNum+'+'+destStName+'+'+destStType+'+'+destCity+'+WA&AIzaSyB6xcpZTDb-FpyrEt_NmsEt64PD9NDV6_8';

      //   //GETJSON REQUEST
      //   $.getJSON( directionsAPI, {
      //     format: "json"
      //   })
      //     .done(function(data){

      //       console.log('directions data: ',data);

      //     })
      // }

      // Initialize and add the map
      function initMap(currentLocation) {

        console.log('current lat lng from initMap: ',currentLocation);


        //Set Locations
        var locations = [
          ['Revo Fitness - Claremont', 
            -31.978181, 
            115.781933, 
            4,
            '770 Square Metres | 27/7 Access',
            '3 Davies Road, Claremont',
            '(08) 6280 1069',
            'claremont@revofitness.com.au',
            'Mon - Thurs 24/7 Access - Staffed 9.00am - 8.00pm',
            'Fri 24/7 Access - Staffed 9.00am - 5.00pm',
            'Sat 24/7 Access - Staffed 8.00am - 4.00pm',
            'Sun 24/7 Access - Staffed 10.00am - 2.00pm',
            '3',
            'Davies',
            'Road',
            'Claremont'
          ], 
          ['Revo Fitness - Northbridge', 
            -31.946172, 
            115.856485, 
            5,
            '600 Square Metres | 27/7 Access',
            '20 Parker Street, Northbridge WA, 6003',
            '(08) 6280 1069',
            'perthcity@revofitness.com.au',
            'Mon - Thurs 24/7 Access - Staffed 9.00am - 8.00pm',
            'Fri 24/7 Access - Staffed 9.00am - 5.00pm',
            'Sat 24/7 Access - Staffed 8.00am - 4.00pm',
            'Sun 24/7 Access - Staffed 10.00am - 2.00pm',
            '20',
            'Parker',
            'Street',
            'Northbridge'

          ],
          ['Revo Fitness -  Scarborough', 
            -31.896230, 
            115.758931, 
            3,
            '700 Square Metres | 27/7 Access',
            '242 West Coast Highway, Scarborough WA, 6019',
            '(08) 6280 1069',
            'scarborough@revofitness.com.au',
            'Mon - Thurs 24/7 Access - Staffed 9.00am - 8.00pm',
            'Fri 24/7 Access - Staffed 9.00am - 5.00pm',
            'Sat 24/7 Access - Staffed 8.00am - 4.00pm',
            'Sun 24/7 Access - Staffed 10.00am - 2.00pm',
            '242',
            'West+coast',
            'highway',
            'scarborough'
          ], 
          ['Revo Fitness - Shenton Park', 
            -31.954929, 
            115.797333, 
            2,
            '700 Square Metres',
            '537 Lemnos Street, Shenton Park WA, 6010',
            '(08) 6280 1069',
            'shentonpark@revofitness.com.au',
            'Mon - Thurs 6.00am - 10.00pm',
            'Fri 6.00am - 10.00pm',
            'Sat 7.00am - 6.00pm',
            'Sun 9.00am - 6.00pm',
            '537',
            'Lemnos',
            'Street',
            'Shentonpark'
          ],
          ['Revo Fitness - Victoria Park', 
            -31.973727, 
            115.896512, 
            1,
            '1100 Square Metres',
            '341 Albany Hwy, Victoria Park WA, 6100',
            '(08) 6280 1069',
            'victoriapark@revofitness.com.au',
            'Mon - Thurs 24/7 Access - Staffed 9.00am - 8.00pm',
            'Fri 24/7 Access - Staffed 9.00am - 5.00pm',
            'Sat 24/7 Access - Staffed 8.00am - 4.00pm',
            'Sun 24/7 Access - Staffed 10.00am - 2.00pm',
            '341',
            'Albany', 
            'Highway',
            'Victoriapark'
          ] 
        ]; 

        var myLatLng = {lat: -31.9385, lng: 115.9627};

        var contactLink = 'http://revo.okmg.com/contact-us/';

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;

        
        var map = new google.maps.Map(
            document.getElementById('map'), {
              zoom: 12,
              center: myLatLng,
              disableDefaultUI: true,
              styles: [
                        {
                            "featureType": "all",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "saturation": 36
                                },
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 40
                                }
                            ]
                        },
                        {
                            "featureType": "all",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "all",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 17
                                },
                                {
                                    "weight": 1.2
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 29
                                },
                                {
                                    "weight": 0.2
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 18
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 19
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#010101"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        }
                    ]

            });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };

        var infowindow = new google.maps.InfoWindow();

        var customMarker = {
          url: 'http://revo.okmg.com/wp-content/uploads/2018/08/REVO-Favicon.png',
          scaledSize: new google.maps.Size(30, 30),
        }

        var marker, i;

        for (i = 0; i < locations.length; i++) {  
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            icon: customMarker,
            map: map
          });

          

          google.maps.event.addListener(marker, 'click', (function(marker, i) {

            return function() {

              //SET MARKER INFORMATION TO LOCAL STORAGE
              localStorage.stNum    = locations[i][12];
              localStorage.stName   = locations[i][13];
              localStorage.stType   = locations[i][14];
              localStorage.city     = locations[i][15];

              localStorage.lat      = currentLocation.lat;
              localStorage.lng      = currentLocation.lng;

              infowindow.setContent('<div class="info-content">'+
                                      '<h3>'+locations[i][0]+'</h3>'+
                                      '<div>'+
                                        '<span>'+locations[i][4]+'</span>'+

                                        '<span class="info-address">'+locations[i][5]+'</span>'+
                                        '<span class="info-phone">'+locations[i][6]+'</span>'+
                                        '<button><a href="'+contactLink+'">Contact Us</a></button>'+

                                        '<span class="info-email">'+locations[i][7]+'</span>'+
                                      '</div>'+
                                      '<div class="info-openHours">'+
                                        '<span>'+locations[i][8]+'</span>'+
                                        '<span>'+
                                          '<div class="info-day">Fri</div>'+ 
                                          '<div>'+locations[i][9]+'</div>'+
                                        '</span>'+        
                                        '<span>'+
                                          '<div class="info-day">Sat</div>'+ 
                                          '<div>'+locations[i][10]+'</div>'+
                                        '</span>'+        
                                        '<span>'+
                                          '<div class="info-day">Sun</div>'+ 
                                          '<div>'+locations[i][11]+'</div>'+
                                        '</span>'+
                                      '</div>'+

                                      '<button id="directions">Directions</button>'+     
                                    '</div>'
                                    );
              infowindow.open(map, marker);

              document.getElementById('directions').addEventListener('click', onChangeHandler);
              document.getElementById('directions').addEventListener('click', function(){
                infowindow.close();
              });

              
            }
          })(marker, i));
        }
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        console.log('localStorage ', localStorage)
        directionsService.route({
          origin: localStorage.lat +' '+ localStorage.lng,
          destination: localStorage.stNum+' '+localStorage.stName+' '+localStorage.stType+' '+localStorage.city,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

    </script>
    <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }

      .info-content{
        padding: 0px 0px 20px 20px;
        max-width: 300px;
        font-family: 'Oswald', sans-serif;
        font-size: 12px;
      }

      .info-content button{
        background-color: #d90e30;
        text-transform: uppercase;
        font-weight: bold;
        border: 0;
        padding: 5px 10px;
        color: #fefefe;
      } 

      .info-content button a{
        color: #fefefe;
        text-decoration:none;
      }

      .info-content .info-phone, .info-content .info-email{
        color: #d90e30;
      }

      .info-content div{
        font-weight: lighter;
      }

      .info-content div span{
        margin: 5px 0px;
      }

      .info-content > div:nth-child(2){
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        margin: 0px 0px 20px 0px;
      }

      .info-openHours{
        margin-bottom: 20px;
      }

      .info-openHours span{
        display: flex;
        flex-direction: row;
        padding-right: 14px;
        justify-content: space-between;
      }

      .info-openHours span:nth-child(1){
        color: #54B451;
        font-weight: bolder;
      }

      .info-openHours span .info-day{
        color: grey;
      }


    </style>



<!--     JS STRING VERSION -->


    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6xcpZTDb-FpyrEt_NmsEt64PD9NDV6_8&callback=googleCallback">
    </script>
  </body>
</html>