<!------------------------------------------------------------------------------------------->
<?= 
    $this->extend('layout/_partials/header');
?>
<!------------------------------------------------------------------------------------------->
<?= $this->section('content') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tipo aletas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Tipo alerta</div>
                    <div class="breadcrumb-item"><a href="<?php echo base_url('tipoAlerta'); ?>">Consultar</a></div>
                    <div class="breadcrumb-item">Crear</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Tipo alerta</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-offset-10">
                                    <br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-info" href="<?= route_to('tipoAlerta_index'); ?>">Ver todos los tipos de alerta</a>
                                </div>
                            </div>
                            <div class="card-header"><h2>Registrar tipo alerta</h2></div>
                            <div class="card-body">
                                <form action="<?= route_to('tipoAlerta_registrar') ?>" method="POST">
                                    <div class="row">
                                        <div class="col-4">
                                            <label class="col-form-label">Descripción</label>
                                            <input type="text" class="form-control" name="descripcion" placeholder="Descripción" maxlength="100" required/>
                                        </div>
                                    </div>
                                    <br /><br />
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