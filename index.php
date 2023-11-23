<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste-Gis</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" crossorigin=""></script>

    <!---Style Editor---->
    <link rel="stylesheet" href="/stylesheets/Leaflet.StyleEditor.min.css">
    <script src="/js/Leaflet.StyleEditor.min.js"></script>
    <!---GeoPackage---->
    <script src="https://unpkg.com/@ngageoint/leaflet-geopackage@2.0.5/dist/leaflet-geopackage.min.js"></script>

    <style>
        #mapDIV{
            height: 100vh;
            
            
        }
    </style>
</head>
<body>
    
    <div id='mapDIV'>mapa</div>
        <script>
            var map = L.map(document.getElementById('mapDIV'), {
                center: [2.065, -61.5698],
                zoom: 7
            });
            var basemap = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {

            });
            basemap.addTo(map);

        //Exibindo coordenadas no mapa

            var coordDIV = document.createElement('div');
                coordDIV.id = 'mapCoordDIV';
                coordDIV.style.position = 'absolute';
                coordDIV.style.bottom = '2%';
                coordDIV.style.left = '45%';
                coordDIV.style.zIndex = '900';
                coordDIV.style.backgroundColor = '#fff';
                coordDIV.style.fontSize = '15px';
                coordDIV.style.width = '310px';
                coordDIV.style.textAlign = 'center';
                coordDIV.style.borderRadius = '7px';

            document.getElementById('mapDIV').appendChild(coordDIV);


            map.on('mousemove', function(e){
                var lat = e.latlng.lat.toFixed(6);
                var lon = e.latlng.lng.toFixed(6);
                document.getElementById('mapCoordDIV').innerHTML = 'Coordenadas: ' + ' ' + lat + '°' + ' , ' + lon + '°';
            });

        //Initialize the StyleEditor
            let styleEditor = L.control.styleEditor({
                position: 'bottomleft',
                colorRamp: ['#1abc9c', '#2ecc71', '#3498db'],
                markers: ['circle-stroked', 'circle', 'square-stroked', 'square']
            });
            map.addControl(styleEditor)
        </script>

</body>
</html>