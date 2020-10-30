<!------------------------------------------------------------------------------------------->
<?= 
    $this->extend('layout/_partials/header');
?>
<!------------------------------------------------------------------------------------------->
<?= $this->section('content') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Alerta</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="<?php echo base_url('alerta'); ?>">Alerta</a></div>
                    <div class="breadcrumb-item">Consultar</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Alertas</h2>
                <p class="section-lead">Consultar todos las alertas recibidas.</p>
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
                                    <th>Tipo Alerta</th>
                                    <th>Descripcion</th>
                                    <th>Usuario</th>
                                    <th>Registrado el</th>
                                    <th>Estado</th>
                                    <th>Operaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($alertas as $alerta) :?>
                                        <tr>
                                            <td><?php echo $alerta['id']; ?></td>
                                            <td><?php 
                                                foreach($tipos_alertas as $t){
                                                    if($alerta['id_tipo_alerta'] == $t['id']){
                                                        echo $t['descripcion'];
                                                    }
                                                }
                                            ?></td>
                                            <td><?php echo $alerta['descripcion']; ?></td>
                                            <td><?php 
                                                foreach($usuarios as $u){
                                                    if($alerta['id_usuario'] == $u['id']){
                                                        echo $u['nombre'];
                                                    }
                                                }  
                                            ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($alerta['fecha_commit'])) . ' ' . $alerta['hora_commit'] ?></td>
                                            <td>
                                                <?php if ($alerta['estado'] == 1){ ?>
                                                    <div class="badge badge-success">Activo</div>
                                                <?php }else if ($alerta['estado'] == 2){ ?>
                                                    <div class="badge badge-danger">Sancionada</div>
                                                <?php }else if ($alerta['estado'] == 3){ ?>
                                                    <div class="badge badge-info">Atendida</div>
                                                <?php }else{} ?>
                                            </td>
                                            <td>
                                                <?php if ( $alerta['estado'] == 1 ){ ?>
                                                    <a href="<?= route_to('alerta_visualizar', $alerta['id']) ?>" class="btn btn-info">Visualizar</a>
                                                    <a href="<?= route_to('alerta_verAtender', $alerta['id']) ?>" class="btn btn-success">Atender</a>
                                                    <a href="<?= route_to('alerta_sancion', $alerta['id']) ?>" class="btn btn-danger">Sancionar</a>
                                                <?php }else if ( $alerta['estado'] == 2) { ?>
                                                    <a href="<?= route_to('alerta_visualizar', $alerta['id']) ?>" class="btn btn-info">Visualizar</a>
                                                <?php }else if ( $alerta['estado'] == 3 ) { ?>
                                                    <a href="<?= route_to('alerta_visualizar', $alerta['id']) ?>" class="btn btn-info">Visualizar</a>
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