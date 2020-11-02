<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand sidebar-gone-show"><a href="<?php echo base_url('index'); ?>">Sistema Alerta</a></div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Home</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">Módulos</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown <?php echo $page == 'usuario-administrador' ? ' active' : ' ' ?>"><i class="fas fa-th-large"></i> <span>Usuarios</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link active" href="<?= route_to('usuarioAdmininistrador'); ?>">Consultar Administradores</a></li>
                <li><a class="nav-link active" href="<?= route_to('usuariosCliente'); ?>">Consultar usuarios</a></li>
                </ul>
            </li>
            <?php /*
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown <?php echo $page == 'mensajes-personalizados' ? ' active' : ' ' ?>"><i class="fas fa-th-large"></i> <span>Mensajes personalizados</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link active" href="<?= route_to('mensajesPersonalizados'); ?>">Consultar</a></li>
                </ul>
            </li>
            */ ?>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown <?php echo $page == 'contacto-emergencia' ? ' active' : ' ' ?>"><i class="fas fa-th-large"></i> <span>Contactos emergencia</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link active" href="<?= route_to('ContactoEmergencia_index') ?>">Consultar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown <?php echo $page == 'departamento' ? ' active' : ' ' ?>"><i class="fas fa-th-large"></i> <span>Departamento</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link active" href="<?php echo base_url('departamento'); ?>">Consultar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Municipio</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('municipio'); ?>">Consultar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown <?php echo $page == 'tipo-alerta' ? ' active' : ' ' ?>"><i class="far fa-file-alt"></i> <span>Tipo alerta</span></a>
                <ul class="dropdown-menu">
                <?php /* <li><a class="nav-link" href="<?php echo base_url('tipoAlerta'); ?>">Consultar</a></li> */ ?>
                <li><a class="nav-link" href="<?= route_to('tipoAlerta_index') ?>">Consultar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown <?php echo $page == 'alerta' ? ' active' : ' ' ?>"><i class="far fa-file-alt"></i> <span>Alertas</span></a>
                <ul class="dropdown-menu">
                <?php /* <li><a class="nav-link" href="<?php echo base_url('tipoAlerta'); ?>">Consultar</a></li> */ ?>
                <li><a class="nav-link" href="<?= route_to('alerta_index') ?>">Consultar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <li><a class="nav-link" href="<?= route_to('contribuyente_index') ?>">Contribuyentes</a></li>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="#" class="btn btn-primary btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Versión 0.1
        </a>
        </div>
    </aside>
</div>
