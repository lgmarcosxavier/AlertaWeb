<!------------------------------------------------------------------------------------------->
<?= 
    $this->extend('layout/_partials/header');
?>
<!------------------------------------------------------------------------------------------->
<?php session(); ?>
<?= $this->section('content') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Mensajes personalizados</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="<?= route_to('mensajesPersonalizados'); ?>">Mensajes personalizados</a></div>
                    <div class="breadcrumb-item">Consultar</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Mensajes personalizados</h2>
                <p class="section-lead">Consultar los mensajes persoalizados de los usuarios.</p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                            </div>
                            <div class="card-header">
                                <?php if (isset( $_SESSION['mensaje']) ) : ?>
                                    <div class="alert alert-primary" role="alert">
                                        <?php echo $_SESSION['mensaje']; ?>
                                        <?php unset($_SESSION['mensaje']); ?>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>                                 
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Asunto</th>
                                            <th>Mensaje</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($mensajesPersonalizados as $mensaje) :?>
                                                <tr>
                                                    <td><?= $mensaje['nombreUsuario'] ?></td>
                                                    <td><?= $mensaje['asunto'] ?></td>
                                                    <td><?= $mensaje['mensaje'] ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
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
