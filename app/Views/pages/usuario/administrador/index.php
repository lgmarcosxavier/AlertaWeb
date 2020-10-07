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
                <h1>Tipo aletas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="<?= route_to('usuarioAdmininistrador'); ?>">Usuario</a></div>
                    <div class="breadcrumb-item">Consultar</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Administradores</h2>
                <p class="section-lead">Consultar todos usuarios administradores.</p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <a class="btn btn-info" href="<?= route_to('usuarioAdministrador_crear') ?>">Crear nuevo</a>
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
                                            <th class="text-center">Código</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Dirección</th>
                                            <th>Operaciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($usuarios as $usuario) :?>
                                                <tr>
                                                    <td><?= $usuario['id'] ?></td>
                                                    <td><?php echo $usuario['nombre'] . $usuario['apellido']; ?></td>
                                                    <td><?php echo $usuario['email']; ?></td>
                                                    <td><?= $usuario['direccion'] ?></td>
                                                    <td>
                                                        <?php /* <a href="<?= route_to('usuarioAdministrador_editar', $usuario['id']) ?>" class="btn btn-info">Editar</a> */ ?>
                                                        <?php if ($usuario['id'] != $_SESSION['userData']['id'] ?? 0) : ?>
                                                            <form 
                                                                action="<?= route_to('usuarioAdministrador_eliminar', $usuario['id']); ?>" 
                                                                method="POST" 
                                                                style="display: inline-block;"
                                                                >
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                            </form>
                                                        <?php endif ?>
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