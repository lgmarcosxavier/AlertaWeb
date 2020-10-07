<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
    /*body {
        background: rgba(15,148,230,1);
        background: -moz-linear-gradient(left, rgba(15,148,230,1) 0%, rgba(29,125,180,1) 100%);
        background: -webkit-gradient(left top, right top, color-stop(0%, rgba(15,148,230,1)), color-stop(100%, rgba(29,125,180,1)));
        background: -webkit-linear-gradient(left, rgba(15,148,230,1) 0%, rgba(29,125,180,1) 100%);
        background: -o-linear-gradient(left, rgba(15,148,230,1) 0%, rgba(29,125,180,1) 100%);
        background: -ms-linear-gradient(left, rgba(15,148,230,1) 0%, rgba(29,125,180,1) 100%);
        background: linear-gradient(to right, rgba(15,148,230,1) 0%, rgba(29,125,180,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0f94e6', endColorstr='#1d7db4', GradientType=1 );
    } */   
</style>
<img class="logo-alerta" src="<?php echo site_url('../img/render_logo_alerta.png'); ?>" alt="logo"></img>
<div class="ola-top">
    <!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,192L34.3,170.7C68.6,149,137,107,206,96C274.3,85,343,107,411,101.3C480,96,549,64,617,85.3C685.7,107,754,181,823,218.7C891.4,256,960,256,1029,266.7C1097.1,277,1166,299,1234,277.3C1302.9,256,1371,192,1406,160L1440,128L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>-->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,192L60,181.3C120,171,240,149,360,160C480,171,600,213,720,234.7C840,256,960,256,1080,240C1200,224,1320,192,1380,176L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
</div>
<br /><br /><br /><br /><br />
<?php /* <h1 class="h-login"><?= lang('Auth.login') ?></h1> */ ?>


<?= view('Auth\Views\_notifications') ?>
<form method="POST" action="<?= site_url('login'); ?>" accept-charset="UTF-8">
    <p>
        <?php /* <label><?= lang('Auth.email') ?></label><br /> */ ?>
        <input required type="email" name="email" placeholder="Correo electrónico" value="<?= old('email') ?>"/>
    </p>
    <p>
        <?php /* <label><?= lang('Auth.password') ?></label><br /> */ ?>
        <input required minlength="5" type="password" name="contrasenia" placeholder="Contraseña...">
    </p>
    <p>
        <?= csrf_field() ?>
        <button type="submit"><?= lang('Auth.login') ?></button>
    </p>
    <?php 
    /*
    <p>
    	<a href="<?= site_url('forgot-password'); ?>" class="float-right"><?= lang('Auth.forgotYourPassword') ?></a>
    </p>
    */
    ?>
</form>
<br /><br /><br /><br />
<hr>
<p>
&copy;Todos los derechos reservados por los estudiantes de octavo curso UMG Zacapa 2020
</p>

<?= $this->endSection() ?>