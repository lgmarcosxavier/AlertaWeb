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
                <h1>Usuarios</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="<?= route_to('usuarioAdmininistrador'); ?>">Usuario</a></div>
                    <div class="breadcrumb-item">Consultar</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Usuarios registrados desde la aplicación</h2>
                <p class="section-lead">Consultar todos los usuarios en uso de la app.</p>
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
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
                                            <th>Dirección</th>
                                            <th>Registrado el</th>
                                            <th>Operaciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($usuarios as $usuario) :?>
                                                <tr>
                                                    <td><?php echo $usuario['nombre'] . $usuario['apellido']; ?></td>
                                                    <td><?php echo $usuario['numero_telefono']; ?></td>
                                                    <td><?php echo $usuario['email']; ?></td>
                                                    <td><?= $usuario['direccion'] ?></td>
                                                    <td><?= date('d/m/Y', strtotime($usuario['fecha_commit'])) ?></td>
                                                    <td>
                                                    <a href="<?= route_to('usuariosConfianza_usuario', $usuario['id']) ?>" class="btn btn-info">Ver usuarios confianza</a>
                                                        <form 
                                                            action="<?= route_to('usuarioUsuarios_eliminar', $usuario['id']); ?>" 
                                                            method="POST" 
                                                            style="display: inline-block;"
                                                            >
                                                            <button type="submit" class="btn btn-danger">Dar de baja</button>
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
