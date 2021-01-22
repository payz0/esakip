<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title>Display a map</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js"></script>
	<link href="https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css" rel="stylesheet" />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>
	<div id='map'></div>
	
	<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoicGF5em8iLCJhIjoiY2p1MnU1bTdpMGdheDN5c2F0aWxsem12cyJ9.gV__sL8cg4zc7oYIPiPa7w';
	var map = new mapboxgl.Map({
		container: 'map', // nama container id untuk memuat map, di sini ada pada baris ke-16
		style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location, menentukan tampilan map
		center: [110.4188121, -7.259209], // starting position [lng, lat]
		zoom: 8 // starting zoom
	});
	</script>
</body>
</html> -->

<!DOCTYPE html>
<html>
  <head>
    <title>Bing Maps</title>
    <link rel="stylesheet" href="https://openlayers.org/en/v3.20.1/css/ol.css" type="text/css">
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>
  </head>
  <body>
     <div id="map" class="map"></div>
     <select id="layer-select">
       <option value="Aerial">Aerial</option>
       <option value="AerialWithLabels" selected>Aerial with labels</option>
       <option value="Road">Road</option>
       <option value="collinsBart">Collins Bart</option>
       <option value="ordnanceSurvey">Ordnance Survey</option>
     </select>
    <script>
      var styles = [
        'Road',
        'Aerial',
        'AerialWithLabels',
        'collinsBart',
        'ordnanceSurvey'
      ];
      var layers = [];
      var i, ii;
      for (i = 0, ii = styles.length; i < ii; ++i) {
        layers.push(new ol.layer.Tile({
          visible: false,
          preload: Infinity,
          source: new ol.source.BingMaps({
            key: 'ApTpAHDQa5AQ919tyWw376Ll26_iM29Cknbaur7mkFHsVPz6h-bJUdeagZTov7jD',
            imagerySet: styles[i]
            // use maxZoom 19 to see stretched tiles instead of the BingMaps
            // "no photos at this zoom level" tiles
            // maxZoom: 19
          })
        }));
      }
      var map = new ol.Map({
        layers: layers,
        // Improve user experience by loading tiles while dragging/zooming. Will make
        // zooming choppy on mobile or slow devices.
        loadTilesWhileInteracting: true,
        target: 'map',
        view: new ol.View({
          center: [-6655.5402445057125, 6709968.258934638],
          zoom: 13
        })
      });

      var select = document.getElementById('layer-select');
      function onChange() {
        var style = select.value;
        for (var i = 0, ii = layers.length; i < ii; ++i) {
          layers[i].setVisible(styles[i] === style);
        }
      }
      select.addEventListener('change', onChange);
      onChange();
    </script>
  </body>
</html>