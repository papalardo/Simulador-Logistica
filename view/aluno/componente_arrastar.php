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
    <link href="<?= base_url('assets/js/jquery-ui/jquery-ui.min.css')?>" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?= base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />
    <!-- Custom Styles-->
    <!-- Google Fonts-->
    <link href="<?= base_url('assets/fonts/css.css?family=Open+Sans')?>" rel='stylesheet' type='text/css' />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
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
    #item {
        margin-top: 20px;
        height: 50px;
        text-align: center;
        padding: 15px;
        font-size: 20px;
        width: 400px;
    }
    
    .game {
        background: rgb(242,243,242);
    }
    </style>
    <script>
    $(function() {
        $("#item").draggable();
    });
    </script>
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
    <div class="col-md-5">
    <center>
    <h4>Tempo: 5minutos</h4>
    <img src="<?= base_url('assets/img/paper.jpg') ?>" style="width:150px"> <br>
    Acertos: 0
    </center>
    </div>
    
    <div class="col-md-7">
        <br>
        Ao iniciar o expediente José Ântonio encarregado do supermerdado Canes
        identificou a necessidade de compra do produto BA2 COD. 78932.
        Organize a sequência correta dos procedimentos a serem adotados.
        </div>
    </div>
    <div class="card col-md-10 col-md-offset-1 game">
        
        <div class="col-md-6">
        <center>
                <img src="<?= base_url('assets/img/ex1.png') ?>" style="width:500px">
        
        </center>
        </div>
        <div class="col-md-6">
                <div id="item">Fazer Cotação</div>
                <div id="item">Sinalizar Necessidade de Compra</div>
                <div id="item">Realizar Compra</div>
                <div id="item">Aprovar Compra</div>
                <div id="item">Analizar Pedido Compra</div>
        </div>
    </div>





    <script src="<?= base_url('assets/js/jquery-1.12.4.js')?>"></script>
    
    <script src="<?= base_url('assets/js/jquery-ui.js')?>"></script>

    <!-- Bootstrap Js -->
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>

    <script src="<?= base_url('assets/materialize/js/materialize.min.js')?>"></script>

    <!-- Metis Menu Js -->
    <script src="<?= base_url('assets/js/jquery.metisMenu.js')?>"></script>
    <!-- Custom Js -->
    <script src="<?= base_url('assets/js/custom-scripts.js')?>"></script>
</body>

</html>