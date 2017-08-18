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
</head>

<body>

    <div class="col-md-4 col-md-offset-1">
        <div class="card" style="height:170px">
            <br>
            <img src="<?= base_url('assets/img/perfil.png')?>" class="col-md-4"> Ana Carolina <br> CEP: Gama <br> Tecnico em Logistica <br>
            <a href="#"> Perfil </a><br>
            <a href="<?= base_url('login/logout') ?>"> Deslogar </a>
            
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><h3> Escolha o componente curricular </h3></div>
            <table class="table table-bordered">
                
                <?php foreach ($listar as $r): ?>
                <tr>    
                <td><a href="<?= base_url('aluno/passo1/' . $r->id_ccr)?>"> <?= $r->nome_ccr ; ?> </a></td>
                </tr>
                <?php endforeach; ?>
                
            </table>
        </div>
    </div>
    <div class="card col-md-4">
        <center>
        <h2> Componentes Curriculares </h2>
        <img src="<?= base_url('assets/img/escolha_simulador.jpg') ?>" style="height:500px">
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