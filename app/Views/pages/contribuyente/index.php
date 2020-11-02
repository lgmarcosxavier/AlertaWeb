<!------------------------------------------------------------------------------------------->
<?= 
    $this->extend('layout/_partials/header');
?>
<!------------------------------------------------------------------------------------------->
<?= $this->section('content') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Contribuyente</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Contribuyente</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Contribuyentes</h2>
                <p class="section-lead">Visualizar todos los contribuyentes que han aportado.</p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                            </div>
                            <div class="card-body">
                                </p>A continuación se presentará a todos los integrantes, que han aportado en la web.</p>
                                <ul>
                                    <li></li>
                                </ul>
                                </p>A continuación se presentará a todos los integrantes, que han aportado en móvil.</p>
                                <ul>
                                    <li></li>
                                </ul>
                                <br /><br /><br />
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