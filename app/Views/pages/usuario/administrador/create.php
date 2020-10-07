<!------------------------------------------------------------------------------------------->
<?= 
    $this->extend('layout/_partials/header');
?>
<!------------------------------------------------------------------------------------------->
<?php $validation = \Config\Services::validation(); ?>

<?= $this->section('content') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Usuarios</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Usuario administrador</div>
                    <div class="breadcrumb-item"><a href="<?= route_to('usuarioAdmininistrador') ?>">Consultar</a></div>
                    <div class="breadcrumb-item">Crear</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Usuario administrador</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-offset-10">
                                    <br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-info" href="<?= route_to('usuarioAdmininistrador') ?>">Ver todos los usuarios</a>
                                </div>
                            </div>
                            <div class="card-header"><h2>Registrar usuario</h2></div>
                            <div class="card-body">
                                <form action="<?= route_to('usuarioAdministrador_registrar') ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="col-form-label">Nombre</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nombre')) ? 'is-invalid' : ''; ?>" name="nombre" placeholder="Nombre" maxlength="50" value="<?= old('nombre'); ?>" required/>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nombre'); ?>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label class="col-form-label">Apellido</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('apellido')) ? 'is-invalid' : ''; ?>" name="apellido" placeholder="Apellido" maxlength="50" value="<?= old('apellido'); ?>" required/>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('apellido'); ?>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label class="col-form-label">Email</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" placeholder="Email" maxlength="100" value="<?= old('email'); ?>" required/>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="col-form-label">Contraseña</label>
                                            <input type="password" class="form-control <?= ($validation->hasError('contrasenia')) ? 'is-invalid' : ''; ?>" name="contrasenia" placeholder="Contraseña" minlength="5" maxlength="20" required/>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('contrasenia'); ?>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label class="col-form-label">Confirmar contraseña</label>
                                            <input type="password" class="form-control <?= ($validation->hasError('contrasenia_confirm')) ? 'is-invalid' : ''; ?>" name="contrasenia_confirm" placeholder="Contraseña" minlength="5" maxlength="20" required/>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('contrasenia_confirm'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="col-form-label">Dirección</label>
                                            <input type="text"s class="form-control <?= ($validation->hasError('direccion')) ? 'is-invalid' : ''; ?>" name="direccion" placeholder="Dirección" maxlength="100" value="<?= old('direccion'); ?>"/>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('direccion'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <br /><br />
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
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