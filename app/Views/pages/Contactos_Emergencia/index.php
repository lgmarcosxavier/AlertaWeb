<!------------------------------------------------------------------------------------------->
<?= 
    $this->extend('layout/_partials/header');
?>
<!------------------------------------------------------------------------------------------->
<?= $this->section('content') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Contactos Emergencia</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="<?php echo base_url('ContactoEmergencia_index'); ?>">Contactos Emergencia</a></div>
                    <div class="breadcrumb-item">Consultar</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Contactos Emergencia</h2>
                <p class="section-lead">Consultar todos los contactos de emergencia registrados en el sistema.</p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="row">
                            <a class="btn btn-info" href="<?= route_to('contactoEmergencia_crear') ?>">Crear nuevo</a>
                        </div>
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>                                 
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre Contacto</th>
                                    <th>Telefono</th>
                                    <th>Operaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($contactos_emergencias as $contacto_emergencia) :?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $contacto_emergencia['nombre']; ?></td>
                                            <td><?php echo $contacto_emergencia['telefono']; ?></td>
                                            <td>
                                            <a href="<?= route_to('ContactoEmergencia_editar', $contacto_emergencia['id']) ?>" class="btn btn-info">Editar</a>
                                                <form 
                                                    action="<?= route_to('contactoEmergencia_eliminar', $contacto_emergencia['id']); ?>" 
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