<!------------------------------------------------------------------------------------------->
<?= 
    $this->extend('layout/_partials/header');
?>
<!------------------------------------------------------------------------------------------->
<?= $this->section('content') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Registro de Sanciones</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Sancion</div>
                    <div class="breadcrumb-item"><a href="<?= route_to('alerta_index'); ?>">Alertas</a></div>
                </div>
            </div>
            <div class="card-header"><h5>Informacion de la Alerta</h5></div>
                <div class="card-body">
                <form action="<?= route_to('alerta_sancion', $alerta['id']); ?>" method="POST">
                    <div class="row">
                    <div class="col-4">
                            <label class="col-form-label">Tipo de Alerta</label>
                            <input type="text" class="form-control" name="descripcion" placeholder="Tipo de Alerta" maxlength="100" value="<?= $nombre_tipo_alerta ?>" readonly/>
                      </div>
                        <div class="col-4">
                            <label class="col-form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripción" maxlength="200" value="<?= $alerta['descripcion'] ?>" readonly/>
                      </div>
                    </div>
                    <br/>
               </form>
            </div>
            <div class="card-header"><h5>Registro de la Sancion</h5></div>
                <div class="card-body">
                <form action="<?= route_to('alerta_registrar'); ?>" method="POST">
                    <div class="row">
                        <div class="col-4">
                            <label class="col-form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" placeholder="Fecha" value="<?= $alerta['descripcion'] ?>" required/>   
                      </div>
                      <div class="col-4">
                        <label class="col-form-label">Observacion</label>
                        <input type="text" class="form-control" name="observacion" placeholder="Observacion" maxlength="100" required/>
                      </div>
                    </div>
                    <br /><br />
                    <div class="row">
                        <div class="col-4">
                            <input type="hidden" name="id_alerta" value="<?= $alerta['id'] ?>"/> 
                            <button type="submit" class="btn btn-danger">Registrar Sancion</button>
                        </div>
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