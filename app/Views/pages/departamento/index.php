<!------------------------------------------------------------------------------------------->
<?= 
    $this->extend('layout/_partials/header');
?>
<!------------------------------------------------------------------------------------------->
<?= $this->section('content') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Departamentos</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="<?php echo base_url('departamento'); ?>">Departamento</a></div>
                    <div class="breadcrumb-item">Consultar</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Departamentos</h2>
                <p class="section-lead">Consultar todos los departamentos registrados en el sistema.</p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header"></div>
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
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($departamentos as $departamento) :?>
                                        <tr>
                                            <td><?php echo $departamento['id']; ?></td>
                                            <td><?php echo $departamento['descripcion']; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($departamento['fecha_commit'])) . ' ' . $departamento['hora_commit'] ?></td>
                                            <td>
                                                <?php if ($departamento['estado'] == 1){ ?> 
                                                    <div class="badge badge-success">Activo</div>
                                                <?php }else{ ?>
                                                    <div class="badge badge-danger">Inactivo</div>
                                                <?php } ?>
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