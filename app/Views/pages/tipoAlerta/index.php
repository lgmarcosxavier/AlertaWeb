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
                <h1>Tipo alertas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="<?php echo base_url('tipoAlerta'); ?>">Tipo Alerta</a></div>
                    <div class="breadcrumb-item">Consultar</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Tipo alertas</h2>
                <p class="section-lead">Consultar todos los tipo de alertas registrados en el sistema.</p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <a class="btn btn-info" href="<?= route_to('tipoAlerta_crear') ?>">Crear nuevo</a>
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
                                            <th class="text-center">
                                            #
                                            </th>
                                            <th>Descripción</th>
                                            <th>Registrado el</th>
                                            <th>Estado</th>
                                            <th>Operaciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($tipoAlertas as $tipoAlerta) :?>
                                                <tr>
                                                    <td><?php echo $tipoAlerta['id']; ?></td>
                                                    <td><?php echo $tipoAlerta['descripcion']; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($tipoAlerta['fecha_commit'])) . ' ' . $tipoAlerta['hora_commit'] ?></td>
                                                    <td>
                                                        <?php if ($tipoAlerta['estado'] == 1){ ?> 
                                                            <div class="badge badge-success">Activo</div>
                                                        <?php }else{ ?>
                                                            <div class="badge badge-danger">Inactivo</div>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= route_to('tipoAlerta_editar', $tipoAlerta['id']) ?>" class="btn btn-info">Editar</a>
                                                        <form 
                                                            action="<?= route_to('tipoAlerta_eliminar', $tipoAlerta['id']); ?>" 
                                                            method="POST" 
                                                            style="display: inline-block;"
                                                            >
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                    </td>
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