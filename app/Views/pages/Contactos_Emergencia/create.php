<!------------------------------------------------------------------------------------------->
<?= 
    $this->extend('layout/_partials/header');
?>
<!------------------------------------------------------------------------------------------->
<?php session_start(); ?>
<?= $this->section('content') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Contacto emergencia</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Contacto emergencia</div>
                    <div class="breadcrumb-item"><a href="<?= route_to('ContactoEmergencia_index') ?>">Consultar</a></div>
                    <div class="breadcrumb-item">Crear</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Contacto emergencia</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-offset-10">
                                    <br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-info" href="<?= route_to('ContactoEmergencia_index'); ?>">Ver todos los contactos emergencias</a>
                                </div>
                            </div>
                            <div class="card-header"><h2>Registrar contacto emergencia</h2></div>
                            <div class="card-body">
                                <form action="<?= route_to('contactoEmergencia_registrar') ?>" method="POST">
                                    <div class="row">
                                        <div class="col-4">
                                            <label class="col-form-label">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" maxlength="100" required/>
                                        </div>
                                        <div class="col-4">
                                            <label class="col-form-label">Número de teléfono</label>
                                            <input type="number" class="form-control" name="numero_telefono" placeholder="Número de telefono" maxlength="100" required/>
                                        </div>
                                    </div>
                                    <br /><br />
                                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['userData']['id'];?>">
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-success">Registrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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