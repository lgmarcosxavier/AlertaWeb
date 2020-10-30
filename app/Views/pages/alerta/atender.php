<!------------------------------------------------------------------------------------------->
<?= 
    $this->extend('layout/_partials/header');
?>
<!------------------------------------------------------------------------------------------->
<?= $this->section('css_extra') ?>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
<style>
    #map { 
        width: 100%; 
    }

    /* css para mapbox, mostrar coordenadas de la posicion del mouse en el mapa */
    #info {
        display: block;
        position: relative;
        margin: 0px auto;
        width: 50%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        font-size: 12px;
        text-align: center;
        color: #222;
        background: #fff;
    }
    /* fin css para mapbox */
</style>
<?= $this->endSection() ?>
<!------------------------------------------------------------------------------------------->
<?= $this->section('content') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Visualizar alerta</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Sancion</div>
                    <div class="breadcrumb-item"><a href="<?= route_to('alerta_index'); ?>">Alertas</a></div>
                </div>
            </div>
            <div class="card-header"><h5>Informacion de la Alerta</h5></div>
                <div class="card-body">
                <form action="<?= route_to('alerta_atendar', $alerta['id']); ?>" method="POST">
                    <div class="row">
                        <div class="col-4">
                            <label class="col-form-label">Tipo de Alerta</label>
                            <input type="text" class="form-control" name="tipo_alerta" placeholder="Tipo de Alerta" maxlength="100" value="<?= $nombre_tipo_alerta ?>" readonly/>
                        </div>
                        <div class="col-4">
                            <label class="col-form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripción" maxlength="200" value="<?= $alerta['descripcion'] ?>" readonly/>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <h3 class="header-title">Ubicación</h3>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-5 col-lg-5">
                            <label for="coordenada_latitud">Latitud: </label>
                            <input type="text" class="form-control" name="coordenada_latitud" id="coordenada_latitud" value="<?= $alerta['latitud'] ?>" readonly>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-5 col-lg-5">
                            <label for="coordenada_longitud">Longitud: </label>
                            <input type="text" class="form-control" name="coordenada_longitud" id="coordenada_longitud" value="<?= $alerta['longitud'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <pre id='info' style="margin: auto;"></pre><br />
                    </div>
                    <div class="row">
                        <div id='map' style='width: 90%; height: 500px;'></div>
                    </div>
                    <br />
                    <div class="row">
                        <input type="hidden" value="<?php echo getenv('MAPBOX_ACCESS_TOKEN'); ?>" id="key_map"/>
                        <input type="hidden" value="<?= $alerta['id'] ?>" name="id_alerta"/>
                        <button type="submit" class="btn btn-info">Marcar como atendida</button>&nbsp;&nbsp;
                        <a href="<?= route_to('alerta_sancion', $alerta['id']) ?>" class="btn btn-danger">Sancionar alerta</a>
                    </div>
               </form>
            </div>
        </section>
    </div>
<?= $this->endSection() ?>
<!------------------------------------------------------------------------------------------->
<?= $this->section('content') ?>
<?php
    echo view('layout/_partials/footer');
?>
<?= $this->endSection() ?>
<!------------------------------------------------------------------------------------------->
<?= $this->section('javascript_extra') ?>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<script>
    let api_map_key = document.getElementById('key_map').value;
    if ( api_map_key != "" ){
        mapboxgl.accessToken = api_map_key;
        let latitud = "<?php echo $alerta['latitud']; ?>";
        let longitud = "<?php echo $alerta['longitud']; ?>";

        var map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [longitud, latitud], // starting position
            zoom: 10 // starting zoom
        });
        
        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());
        map.addControl(new mapboxgl.FullscreenControl());
        map.addControl(new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true
        }));

        // cargar la posicion marcada anteriormente
        var marker = new mapboxgl.Marker({
            draggable: false
        }).setLngLat([document.getElementById('coordenada_longitud').value, document.getElementById('coordenada_latitud').value]).addTo(map);
        marcadores.push(marker);
        // fin cargar la posicion marcada anteriormente

        map.on('click', function (e) {
            // eliminar los marcadores
            if ( marcadores.length > 0 ){
                for (var i = marcadores.length - 1; i >= 0; i--) {
                    marcadores[i].remove();
                }
            }

            document.getElementById('coordenada_longitud').value = JSON.stringify(e.lngLat["lng"]);
            document.getElementById('coordenada_latitud').value = JSON.stringify(e.lngLat["lat"]);

            var marker = new mapboxgl.Marker({
                draggable: false
            }).setLngLat([document.getElementById('coordenada_longitud').value, document.getElementById('coordenada_latitud').value]).addTo(map);

            marcadores.push(marker);

            function onDragEnd() {
                var lngLat = marker.getLngLat();
                var point = marker.getPoint();
                document.getElementById('coordenada_latitud').value = lngLat.lat;
                document.getElementById('coordenada_longitud').value = lngLat.lng;
            }

            marker.on('dragend', onDragEnd);
        });

        map.on('mousemove', function (e) {
            document.getElementById('info').innerHTML = JSON.stringify(e.lngLat.wrap());
        });
    }else{
        alert("No se han encontrado las credencias para hacer uso del mapa.");
    }
</script>
<?= $this->endSection() ?>
<!------------------------------------------------------------------------------------------->