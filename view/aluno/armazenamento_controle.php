<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simulador</title>

    <link href="<?= base_url('assets/fonts/icon.css?family=Material+Icons')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/materialize/css/materialize.min.css')?>" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="<?= base_url('assets/css/bootstrap.css')?>" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?= base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />
    <!-- Custom Styles-->
    <!-- Google Fonts-->
    <link href="<?= base_url('assets/fonts/css.css?family=Open+Sans')?>" rel='stylesheet' type='text/css' />
<style>
    body {
    margin: 0;
    margin-right: 0 auto;
    margin-left: 0 auto;
    background-color: #73BCDF;
   /* background-image:url("img/background-login.jpg");*/
    background-repeat: no-repeat;
    background-size: 80% 100%;
}
    </style>
</head>

<body>

    <div class="col-md-4 col-md-offset-1">
        <div class="card" style="height:170px">
            <br>
            <img src="<?= base_url('assets/img/perfil.png')?>" class="col-md-4"> Ana Carolina <br> CEP: Gama <br> Tecnico em Logistica <br>
            <a href="#"> Perfil </a><br>
            <a href="<?= base_url('login/logout') ?>"> Deslogar </a>
        </div>

    </div>
    <div class="card col-md-4">

        <h3> Componente Curricular: <br> Armazenamento e Controle de Estoque</h3>
        <br> Ciclo do simulador 1
        <br>
        <div class="col-md-6">
            <img style="width: 150px" src="<?= base_url('assets/img/mapa1.png')?>"> Figura 1
        </div>
        <div class="col-md-6">
            <img style="width: 150px" src="<?= base_url('assets/img/mapa2.png')?>"> Figura 2
        </div>
    </div>
    <div class="card col-md-10 col-md-offset-1">
        <center>
            
        <?php foreach ($listar as $r): ?>

        <div class="col-md-3">
            <a href="<?= base_url('aluno/passo2/' . $r->id_sml)?>">
            <h2><?= $r->nome_sml ; ?></h2>
            <img src="<?= base_url('assets/img/icon-cal.png') ?>" style="width:150px">
            </a>
        </div>
        <?php endforeach; ?>
            
        
            </center>
    </div>





    <script src="<?= base_url('assets/js/jquery-1.10.2.js')?>"></script>

    <!-- Bootstrap Js -->
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>

    <script src="<?= base_url('assets/materialize/js/materialize.min.js')?>"></script>

    <!-- Metis Menu Js -->
    <script src="<?= base_url('assets/js/jquery.metisMenu.js')?>"></script>
    <!-- Custom Js -->
    <script src="<?= base_url('assets/js/custom-scripts.js')?>"></script>
</body>

</html>