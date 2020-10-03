<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Sistema Alerta</title>
    <style type="text/css">
    	body {
    	  margin: 0px;
    	  padding: 0px;
    	  width: 100%;
    	  font-family: sans-serif;
	      font-size: 15px;
	      color: #444;
    	}

    	main {
    	  padding: 30px;
    	  padding-top: 60px;
    	  box-sizing: border-box;
    	}

    	form {
    	  margin-bottom: 40px;
    	}

	    .auth-menu {
	      position: fixed;
	      left: 0;
	      top: 0;
	      z-index: 10001;
	      width: 100%;
    	  box-sizing: border-box;
	      line-height: 40px;
	      background-color: #444;
	      color: #fff;
	      font-size: 14px;
	      padding-left: 15px;
	      padding-right: 15px;
	    }

	    .auth-menu a {
	      color: #fff;
	      text-decoration: none;
	      font-weight: bold;
	    }

	    .notification {
	      padding: 10px;
    	  background-color: #eee;
    	  font-weight: bold;
    	  margin-bottom: 30px;
	    }

		/*
		LOGIN
		*/
		.logo-alerta {
			position: fixed;
			top: 200px;
			width: 500px;
			height: 300px;
			z-index: 2;
			color: white;
		}

		.ola-top {
			height: 100px;
		}
		.ola-top svg{
			position: fixed; 
			top: 0px; 
			left: 0px; 
			width: 100%; 
			z-index: -10;
		}

		.h-login {
			text-align: center;
			font-size: 40px;
			font-family: Georgia, 'Times New Roman', Times, serif;
			z-index: 1000;
		}

		form {
			width: 20%;
			margin: 0 auto;
			font-family: Georgia, 'Times New Roman', Times, serif;
		}

		form label {
			font-size: 20px;
			margin: 10px 10px;
			padding: 0px 50px;
			text-align: center;
		}

		form input {
			width: 250px;
			height: 40px;
			margin: 10px 10px;
			font-size: 18px;
		}

		form input:focus{
			outline: none !important;
			border: 2px solid blue;
			/*box-shadow: 0 0 10px #719ECE;*/
		}

		form button {
			width: 250px;
			height: 40px;
			padding-left: 10px;
			margin-left: 10px;

			background-color: #03A9F4;
			color: #000;

			text-transform: uppercase;
			font-size: 18px;

			border: 1px solid white;
			border-radius: 10px 10px;
		}

		form button:hover {
			color: #FFF;
			cursor: pointer;
		}

    </style>
</head>
<body>

<?php
if (session('isLoggedIn')) {
	echo view('Auth\Views\_navbar');
}
?>

<main role="main" class="wrapper">
	<?= $this->renderSection('main') ?>
</main>

</body>
</html>