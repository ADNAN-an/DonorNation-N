@extends('layouts.master')

@section('title', 'Donner Song')

@section('styles')
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        #map {
            height: 90vh;
            margin-left: 15px;
            margin-right: 15px;
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            background-color: #fff;
            border: 0;
            border-radius: 2px;
            box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
            margin: 10px;
            padding: 0 0.5em;
            font: 400 18px Roboto, Arial, sans-serif;
            overflow: hidden;
            font-family: Roboto;
            padding: 0;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }

        #target {
            width: 345px;
        }
    </style>
@stop

@section('content')
    <section id="doctors" class="doctors">
        <div class="container my-5">

            <div class="section-title">
                <h2>Réservez votre rendez-vous pour un don du sang </h2>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                </div>
            @endif


            <div class="col-md-12">
                <div class="row d-flex justify-content-center">

                    <div class="">

                        <div style="" class="row">
                            <div class="member">
                                <div class="d-flex justify-content-center">
                                    <div class="form-value">
                                        <form method="POST" action="{{ route('save_donneur_du_sang') }}">
                                            @csrf

                                            <div class="row">

                                                <div style="width: 900px" class="form-group mx-5">
                                                    <label for="">Sélectionnez la date du rendez-vous :</label>
                                                    <input {{-- step="7" --}} name="date" class="form-control"
                                                        type="date">
                                                    @error('date')
                                                        <div class="alert alert-danger">
                                                            <span class="alert alert-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div style="width: 200px; margin-top: 23px;" class="form-group">
                                                    <label for=""></label>
                                                    <button class="btn btn-primary">Réserver maintenant</button>
                                                </div>

                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mx-5">
                            <br>
                            <label for="">
                                <h4>Choisissez le centre de collecte :</h4>
                            </label>
                            @error('url')
                                <div class="alert alert-danger">
                                    <span class="alert alert-danger">{{ $message }}</span>
                                </div>
                            @enderror

                            <input id="url" readonly name="url" class="form-control my-3" type="text">

                            <input hidden id="lat" readonly value="the lat" name="lat" class="form-control my-3"
                                type="text">
                            <input hidden id="lng" readonly value="the lng" name="lng" class="form-control my-3"
                                type="text">
                        </div>

                        <h6 id="info"></h6>
                        <input id="pac-input" class="controls" type="text" placeholder="Search Box" />

                        <div id="map"></div>
                    </div>

                    </form>


                </div>


            </div>



        </div>
    </section>
@endsection

@section('scripts')

    <script>
        function initAutocomplete() {

            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 33.63175616991382,
                    lng: -7.624145447695226
                },
                zoom: 7,
                mapTypeId: "roadmap",
            });


            /* start add new marker */
            map.addListener('click', function(e) {


                placeMarker(e.latLng, map);

                let url_input = document.getElementById("url");
                url_input.setAttribute('value', map.mapUrl);

                let url_input_lat = document.getElementById("lat");
                url_input_lat.setAttribute('value', e.latLng.lat());

                let url_input_lng = document.getElementById("lng");
                url_input_lng.setAttribute('value', e.latLng.lng());


            });

            function placeMarker(position, map) {
                var marker = new google.maps.Marker({
                    position: position,
                    map: map
                });
                map.panTo(position);

                // console.log(map);
            }
            /* end add new marker */


            /* start map 1 */
            let markerOptions1 = {
                position: new google.maps.LatLng(35.77369786896245, -5.8137697610067605),
                title: 'donation center One 1',
                //animation: google.maps.Animation.BOUNCE,
                draggable: true,
                //icon: 'images/doctor2.png',
            };

            let marker1 = new google.maps.Marker(markerOptions1);

            marker1.setMap(map);


            let content = `<div id="content">
    <div id="bodyContent">
        <h1 class="text-success" style="text-align: center;">Centre Regional de Transfusion Sanguine de Tanger</h1>
        <div style="display: flex; align-items: center;">
            <div style="flex: 1; margin-right: 20px;">
                <img src="https://ecoactu.ma/wp-content/uploads/2023/03/sang.jpg" width="300" height="290" />
            </div>
            <div style="flex: 2;">
                <p>
                    <b>Le Centre Régional de Transfusion Sanguine de Tanger</b> collecte, traite et distribue du sang et de ses composants dans la région de </b>Tanger, au Maroc.</b>pour répondre aux besoins en transfusion sanguine. Il organise des campagnes de collecte de sang, prépare les composants sanguins et assure la distribution aux établissements de santé locaux. Des programmes de sensibilisation 
                    sont également menés pour promouvoir le don de sang et informer sur l'importance de la transfusion sanguine.
                </p>
                <p>
                    Si vous avez des questions supplémentaires, 
                    vous pouvez contacter le Centre Régional de Transfusion Sanguine de Tanger au numéro suivant:<b> 0539942443 </b>.
                </p>
            </div>
        </div>
    </div>
</div>
`;

            let infoWindow = new google.maps.InfoWindow({
                content: content
            })

            marker1.addListener('click', (googleMapsEvent) => {
                //document.getElementById('info').innerHTML = `latitude: ` + googleMapsEvent.latLng.lat() + ` AND langtitude: ` + googleMapsEvent.latLng.lng();
                infoWindow.open(map, marker1);

                let url_input = document.getElementById("url");
                url_input.setAttribute('value', map.mapUrl);

                let url_input_lat = document.getElementById("lat");
                url_input_lat.setAttribute('value', googleMapsEvent.latLng.lat());

                let url_input_lng = document.getElementById("lng");
                url_input_lng.setAttribute('value', googleMapsEvent.latLng.lng());

            });


            /* /end map 1 */

            /* start map 2 */
            let markerOptions2 = {
                position: new google.maps.LatLng(35.573235660204524, -5.355811130688207),
                title: 'donation center Twho 2',
                //animation: google.maps.Animation.BOUNCE,
                draggable: true,
            };
            let marker2 = new google.maps.Marker(markerOptions2);
            marker2.setMap(map);

            let content2 = `<div id="content">
                 <div id="bodyContent">'
                  <h1 class="text-success" style="text-align: center;">Centre de don du sang de Tétouan</h1>
        <div style="display: flex; align-items: center;">
            <div style="flex: 1; margin-right: 20px;">
                <img src="https://www.challenge.ma/wp-content/uploads/2015/09/ACTU-Don-du-Sang.png" width="300" height="250" />
            </div>
            <div style="flex: 2;">
                <p>
                    <b>Le Centre de don du sang de Tétouan</b> collecte, traite et distribue du sang et de ses composants dans la ville de </b>Tétouan, au Maroc.</b>pour répondre aux besoins en transfusion sanguine. Il organise des campagnes de collecte de sang, prépare les composants sanguins et assure la distribution aux établissements de santé locaux. Des programmes de sensibilisation 
                    sont également menés pour promouvoir le don de sang et informer sur l'importance de la transfusion sanguine.
                </p>
                <p>
                    Si vous avez des questions supplémentaires, 
                    vous pouvez contacter le centre de don du sang de Tétouan au numéro suivant:<b> 0539942493 </b>.
                </p>
                 </div>
                 </div>
                 </div>`;

            let infoWindow2 = new google.maps.InfoWindow({
                content: content2
            })

            marker2.addListener('click', (googleMapsEvent) => {
                // document.getElementById('info').innerHTML = `latitude: ` + googleMapsEvent.latLng.lat() + ` AND langtitude: ` + googleMapsEvent.latLng.lng();
                infoWindow2.open(map, marker2);

                let url_input = document.getElementById("url");
                url_input.setAttribute('value', map.mapUrl);

                let url_input_lat = document.getElementById("lat");
                url_input_lat.setAttribute('value', googleMapsEvent.latLng.lat());

                let url_input_lng = document.getElementById("lng");
                url_input_lng.setAttribute('value', googleMapsEvent.latLng.lng());


            });
            /* /end map 2 */

            /* start map 3 */
            let markerOptions3 = {
                position: new google.maps.LatLng(34.007994718571354, -4.961203669311793),
                title: 'donation center Three 3',
                //animation: google.maps.Animation.BOUNCE,
                draggable: true,
            };
            let marker3 = new google.maps.Marker(markerOptions3);
            marker3.setMap(map);

            let content3 = `<div id="content">
                 <div id="bodyContent">'
                  <h1 class="text-success" style="text-align: center;">Centre Regional De Transfusion Sanguine de Fès</h1>
        <div style="display: flex; align-items: center;">
            <div style="flex: 1; margin-right: 20px;">
                <img src="https://lh5.googleusercontent.com/p/AF1QipNH3uocw5b_isFadHlMk9yoTirUmDnuu9w7t9PX=w408-h306-k-no" width="300" height="250" />
            </div>
            <div style="flex: 2;">
                <p>
                    <b>Le Centre Regional De Transfusion Sanguine de Fès</b> collecte, traite et distribue du sang et de ses composants dans la ville de </b>Fès, au Maroc.</b>pour répondre aux besoins en transfusion sanguine. Il organise des campagnes de collecte de sang, prépare les composants sanguins et assure la distribution aux établissements de santé locaux. Des programmes de sensibilisation 
                    sont également menés pour promouvoir le don de sang et informer sur l'importance de la transfusion sanguine.
                </p>
                <p>
                    Si vous avez des questions supplémentaires, 
                    vous pouvez contacter le centre Regional De Transfusion Sanguine de Fès au numéro suivant:<b> 0539944493 </b>.
                </p>

                 </div>
                 </div>
                 </div>`;

            let infoWindow3 = new google.maps.InfoWindow({
                content: content3
            })

            marker3.addListener('click', (googleMapsEvent) => {
                //document.getElementById('info').innerHTML = `latitude: ` + googleMapsEvent.latLng.lat() + ` AND langtitude: ` + googleMapsEvent.latLng.lng();
                infoWindow3.open(map, marker3);
                let url_input = document.getElementById("url");
                url_input.setAttribute('value', map.mapUrl);

                let url_input_lat = document.getElementById("lat");
                url_input_lat.setAttribute('value', googleMapsEvent.latLng.lat());

                let url_input_lng = document.getElementById("lng");
                url_input_lng.setAttribute('value', googleMapsEvent.latLng.lng());

                console.log(url_input.value);
                console.log(url_input_lat.value);
                console.log(url_input_lng.value);
            });
            /* /end map 3 */

            /* start map 4 */
            let markerOptions4 = {
                position: new google.maps.LatLng(33.582627268398696, -7.619521803986067),
                title: 'donation center Twho 4',
                //animation: google.maps.Animation.BOUNCE,
                draggable: true,
            };
            let marker4 = new google.maps.Marker(markerOptions4);
            marker4.setMap(map);

            let content4 = `<div id="content">
                 <div id="bodyContent">'
                  <h1 class="text-success" style="text-align: center;">Centre régional de transfusion sanguine de Casablanca</h1>
        <div style="display: flex; align-items: center;">
            <div style="flex: 1; margin-right: 20px;">
                <img src="https://static.lematin.ma/files/lematin/images/articles/2015/08/Les-centres-de-transfusion-sanguine.png" width="300" height="250" />
            </div>
            <div style="flex: 2;">
                <p>
                    <b>Le Centre régional de transfusion sanguine de Casablanca</b> collecte, traite et distribue du sang et de ses composants dans la ville de </b>Casablanca, au Maroc.</b>pour répondre aux besoins en transfusion sanguine. Il organise des campagnes de collecte de sang, prépare les composants sanguins et assure la distribution aux établissements de santé locaux. Des programmes de sensibilisation 
                    sont également menés pour promouvoir le don de sang et informer sur l'importance de la transfusion sanguine.
                </p>
                <p>
                    Si vous avez des questions supplémentaires, 
                    vous pouvez contacter le centre régional de transfusion sanguine de Casablanca au numéro suivant:<b> 0538942493 </b>.
                </p>
                 </div>
                 </div>
                 </div>`;

            let infoWindow4 = new google.maps.InfoWindow({
                content: content4
            })

            marker4.addListener('click', (googleMapsEvent) => {
                // document.getElementById('info').innerHTML = `latitude: ` + googleMapsEvent.latLng.lat() + ` AND langtitude: ` + googleMapsEvent.latLng.lng();
                infoWindow4.open(map, marker4);

                let url_input = document.getElementById("url");
                url_input.setAttribute('value', map.mapUrl);

                let url_input_lat = document.getElementById("lat");
                url_input_lat.setAttribute('value', googleMapsEvent.latLng.lat());

                let url_input_lng = document.getElementById("lng");
                url_input_lng.setAttribute('value', googleMapsEvent.latLng.lng());


            });
            /* /end map 4 */

            /* start map 5 */
            let markerOptions5 = {
                position: new google.maps.LatLng(34.01445633456095, -6.860804862089084),
                title: 'donation center Twho 5',
                //animation: google.maps.Animation.BOUNCE,
                draggable: true,
            };
            let marker5 = new google.maps.Marker(markerOptions5);
            marker5.setMap(map);

            let content5 = `<div id="content">
                 <div id="bodyContent">'
                  <h1 class="text-success" style="text-align: center;">Centre national de transfusion sanguine Rabat</h1>
        <div style="display: flex; align-items: center;">
            <div style="flex: 1; margin-right: 20px;">
                <img src="https://lh3.googleusercontent.com/p/AF1QipOUTGlwGl5GCMthwuQM0-W4zCiTWDLFR7IWwJg=s1360-w1360-h1020" width="300" height="250" />
            </div>
            <div style="flex: 2;">
                <p>
                    <b>Le Centre national de transfusion sanguine Rabat</b> collecte, traite et distribue du sang et de ses composants dans la ville de </b>Rabat, au Maroc.</b>pour répondre aux besoins en transfusion sanguine. Il organise des campagnes de collecte de sang, prépare les composants sanguins et assure la distribution aux établissements de santé locaux. Des programmes de sensibilisation 
                    sont également menés pour promouvoir le don de sang et informer sur l'importance de la transfusion sanguine.
                </p>
                <p>
                    Si vous avez des questions supplémentaires, 
                    vous pouvez contacter le centre national de transfusion sanguine Rabat au numéro suivant:<b> 0532242493 </b>.
                </p>
                 </div>
                 </div>
                 </div>`;

            let infoWindow5 = new google.maps.InfoWindow({
                content: content5
            })

            marker5.addListener('click', (googleMapsEvent) => {
                // document.getElementById('info').innerHTML = `latitude: ` + googleMapsEvent.latLng.lat() + ` AND langtitude: ` + googleMapsEvent.latLng.lng();
                infoWindow5.open(map, marker5);

                let url_input = document.getElementById("url");
                url_input.setAttribute('value', map.mapUrl);

                let url_input_lat = document.getElementById("lat");
                url_input_lat.setAttribute('value', googleMapsEvent.latLng.lat());

                let url_input_lng = document.getElementById("lng");
                url_input_lng.setAttribute('value', googleMapsEvent.latLng.lng());


            });
            /* /end map 5 */

            /* start map 6 */
            let markerOptions6 = {
                position: new google.maps.LatLng(31.951521728983447, -8.039094242929526),
                title: 'donation center Twho 6',
                //animation: google.maps.Animation.BOUNCE,
                draggable: true,
            };
            let marker6 = new google.maps.Marker(markerOptions6);
            marker6.setMap(map);

            let content6 = `<div id="content">
                 <div id="bodyContent">'
                  <h1 class="text-success" style="text-align: center;">Centre régional de transfusion sanguine Marrakech</h1>
        <div style="display: flex; align-items: center;">
            <div style="flex: 1; margin-right: 20px;">
                <img src="https://2msoread-ww.amagi.tv/mediasfiles/2020/4/18/1587239968/158723996819673288-23460256_OcD3XDH.jpg" width="300" height="250" />
            </div>
            <div style="flex: 2;">
                <p>
                    <b>Le Centre régional de transfusion sanguine Marrakech</b> collecte, traite et distribue du sang et de ses composants dans la ville de </b>Marrakech, au Maroc.</b>pour répondre aux besoins en transfusion sanguine. Il organise des campagnes de collecte de sang, prépare les composants sanguins et assure la distribution aux établissements de santé locaux. Des programmes de sensibilisation 
                    sont également menés pour promouvoir le don de sang et informer sur l'importance de la transfusion sanguine.
                </p>
                <p>
                    Si vous avez des questions supplémentaires, 
                    vous pouvez contacter le centre régional de transfusion sanguine Marrakech au numéro suivant:<b> 0532242493 </b>.
                </p>
                 </div>
                 </div>
                 </div>`;

            let infoWindow6 = new google.maps.InfoWindow({
                content: content6
            })

            marker6.addListener('click', (googleMapsEvent) => {
                // document.getElementById('info').innerHTML = `latitude: ` + googleMapsEvent.latLng.lat() + ` AND langtitude: ` + googleMapsEvent.latLng.lng();
                infoWindow6.open(map, marker6);

                let url_input = document.getElementById("url");
                url_input.setAttribute('value', map.mapUrl);

                let url_input_lat = document.getElementById("lat");
                url_input_lat.setAttribute('value', googleMapsEvent.latLng.lat());

                let url_input_lng = document.getElementById("lng");
                url_input_lng.setAttribute('value', googleMapsEvent.latLng.lng());


            });
            /* /end map 6 */

            /* start map 7 */
            let markerOptions7 = {
                position: new google.maps.LatLng(34.68152065457234, -1.914830232211557),
                title: 'donation center Twho 7',
                //animation: google.maps.Animation.BOUNCE,
                draggable: true,
            };
            let marker7 = new google.maps.Marker(markerOptions7);
            marker7.setMap(map);

            let content7 = `<div id="content">
                 <div id="bodyContent">'
                  <h1 class="text-success" style="text-align: center;">Centre régional de transfusion sanguine Oujda</h1>
        <div style="display: flex; align-items: center;">
            <div style="flex: 1; margin-right: 20px;">
                <img src="https://2msoread-ww.amagi.tv/mediasfiles/2020/4/18/1587239968/158723996819673288-23460256_OcD3XDH.jpg" width="300" height="250" />
            </div>
            <div style="flex: 2;">
                <p>
                    <b>Le Centre régional de transfusion sanguine Oujda</b> collecte, traite et distribue du sang et de ses composants dans la ville de </b>Oujda, au Maroc.</b>pour répondre aux besoins en transfusion sanguine. Il organise des campagnes de collecte de sang, prépare les composants sanguins et assure la distribution aux établissements de santé locaux. Des programmes de sensibilisation 
                    sont également menés pour promouvoir le don de sang et informer sur l'importance de la transfusion sanguine.
                </p>
                <p>
                    Si vous avez des questions supplémentaires, 
                    vous pouvez contacter le centre régional de transfusion sanguine Oujda au numéro suivant:<b> 0531842493 </b>.
                </p>
                 </div>
                 </div>
                 </div>`;

            let infoWindow7 = new google.maps.InfoWindow({
                content: content7
            })

            marker7.addListener('click', (googleMapsEvent) => {
                // document.getElementById('info').innerHTML = `latitude: ` + googleMapsEvent.latLng.lat() + ` AND langtitude: ` + googleMapsEvent.latLng.lng();
                infoWindow7.open(map, marker7);

                let url_input = document.getElementById("url");
                url_input.setAttribute('value', map.mapUrl);

                let url_input_lat = document.getElementById("lat");
                url_input_lat.setAttribute('value', googleMapsEvent.latLng.lat());

                let url_input_lng = document.getElementById("lng");
                url_input_lng.setAttribute('value', googleMapsEvent.latLng.lng());


            });
            /* /end map 7 */

            /* start map 7 */
            let markerOptions8 = {
                position: new google.maps.LatLng(30.42902253367035, -9.582705423279481),
                title: 'donation center Twho 8',
                //animation: google.maps.Animation.BOUNCE,
                draggable: true,
            };
            let marker8 = new google.maps.Marker(markerOptions8);
            marker8.setMap(map);

            let content8 = `<div id="content">
                 <div id="bodyContent">'
                  <h1 class="text-success" style="text-align: center;">Centre régional de transfusion sanguine Agadir</h1>
        <div style="display: flex; align-items: center;">
            <div style="flex: 1; margin-right: 20px;">
                <img src="https://2msoread-ww.amagi.tv/mediasfiles/2020/4/18/1587239968/158723996819673288-23460256_OcD3XDH.jpg" width="300" height="250" />
            </div>
            <div style="flex: 2;">
                <p>
                    <b>Le Centre régional de transfusion sanguine Agadir</b> collecte, traite et distribue du sang et de ses composants dans la ville de </b>Agadir, au Maroc.</b>pour répondre aux besoins en transfusion sanguine. Il organise des campagnes de collecte de sang, prépare les composants sanguins et assure la distribution aux établissements de santé locaux. Des programmes de sensibilisation 
                    sont également menés pour promouvoir le don de sang et informer sur l'importance de la transfusion sanguine.
                </p>
                <p>
                    Si vous avez des questions supplémentaires, 
                    vous pouvez contacter le centre régional de transfusion sanguine Agadir au numéro suivant:<b> 0531242493 </b>.
                </p>
                 </div>
                 </div>
                 </div>`;

            let infoWindow8 = new google.maps.InfoWindow({
                content: content8
            })

            marker8.addListener('click', (googleMapsEvent) => {
                // document.getElementById('info').innerHTML = `latitude: ` + googleMapsEvent.latLng.lat() + ` AND langtitude: ` + googleMapsEvent.latLng.lng();
                infoWindow8.open(map, marker8);

                let url_input = document.getElementById("url");
                url_input.setAttribute('value', map.mapUrl);

                let url_input_lat = document.getElementById("lat");
                url_input_lat.setAttribute('value', googleMapsEvent.latLng.lat());

                let url_input_lng = document.getElementById("lng");
                url_input_lng.setAttribute('value', googleMapsEvent.latLng.lng());


            });
            /* /end map 8 */


            /* start searsh map box  */
            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            let markers = [];

            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };

                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        window.initAutocomplete = initAutocomplete;
    </script>



    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDo2b3VBQeicpUuxXvRPTzhOlH3zjMtQ7k&callback=initAutocomplete&libraries=places&v=weekly"
        defer></script>


@stop
