<?= 
    $this->extend('layout/_partials/header');
?>

<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Alertas
                    </div>
                    <div class="card-stats-items">
                    <div class="card-stats-item">
                        <div class="card-stats-item-count"><?= $alertasPendientes ?></div>
                        <div class="card-stats-item-label">Pendientes</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count"><?= $alertasAtendidas ?></div>
                        <div class="card-stats-item-label">Atendidas</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count"><?= $alertasSancionadas ?></div>
                        <div class="card-stats-item-label">Sanciones</div>
                    </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Total</h4>
                    </div>
                    <div class="card-body">
                    <?= $alertasPendientes + $alertasAtendidas + $alertasSancionadas ?>
                    </div>
                </div>
                </div>
            </div>
            <!--
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Balance</h4>
                    </div>
                    <div class="card-body">
                    $187,13
                    </div>
                </div>
                </div>
            </div>
            -->
            <!--
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Sales</h4>
                    </div>
                    <div class="card-body">
                    4,732
                    </div>
                </div>
                </div>
            </div>
            -->
            </div>
            <br /><br />
            <h3>Últimas 20 alertas</h3>
            <!--
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Alertas emitidas</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            -->
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th>Código alerta</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Operaciones</th>
                        </tr>
                        <?php foreach($alertas as $alerta) :?>
                        <tr>
                            <td><?= $alerta->id ?></td>
                            <td><?= date('d/m/Y', strtotime($alerta->fecha_commit)) ?></td>
                            <td class="font-weight-600"><?=  $alerta->nombre . ' ' . $alerta->apellido ?></td>
                            <td>
                                <?php if ($alerta->estado == 1){ ?>
                                    <div class="badge badge-success">Activo</div>
                                <?php }else if ($alerta->estado == 2){ ?>
                                    <div class="badge badge-danger">Sancionada</div>
                                <?php }else if ($alerta->estado == 2){ ?>
                                    <div class="badge badge-info">Atendida</div>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ( $alerta->estado == 1 ){ ?>
                                    <a href="<?= route_to('alerta_visualizar', $alerta->id) ?>" class="btn btn-info">Visualizar</a>
                                    <a href="<?= route_to('alerta_verAtender', $alerta->id) ?>" class="btn btn-success">Atender</a>
                                    <a href="<?= route_to('alerta_sancion', $alerta->id) ?>" class="btn btn-danger">Sancionar</a>
                                <?php }else if ( $alerta->estado == 2) { ?>
                                    <a href="<?= route_to('alerta_visualizar', $alerta->id) ?>" class="btn btn-info">Visualizar</a>
                                <?php }else if ( $alerta->estado == 3 ) { ?>
                                    <a href="<?= route_to('alerta_visualizar', $alerta->id) ?>" class="btn btn-info">Visualizar</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
    echo view('layout/_partials/footer');
?>
<?= $this->endSection() ?>
