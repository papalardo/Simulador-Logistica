<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0" />
    <title><?=$titulo?></title>
    <meta name="description" content="Simulador Logistica" />
    <meta name="robots" content="index, follow" />
    <link rel="icon" type="image/png" href="<?=$url_base?>libs/imgs/icon.png" />
    <meta name="author" content="SENAC" />
    <link href="<?= base_url('assets/css/index.css')?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/bootstrap.css')?>" rel="stylesheet" />
    <script src="<?= base_url('assets/js/jquery.js')?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js')?>"></script>


<body style="background-color:powderblue;">

<style>
    .login {
        margin: 0 auto;
        width: 400px;
        margin-top: 100px;
    }

</style>


<div class="login">
    <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= base_url('login/entrarAdmin')?>" method="post">
                <div class="form-group">
                    <label>Usuário</label>
                    <input name="username" type="text" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input name="password" type="password" class="form-control" autocomplete="off">
                </div>
                <?php if (isset($_COOKIE['msg'])){
                    echo '<div class="alert alert-danger" role="alert"><center><strong>';
                    echo $_COOKIE['msg'];
                    echo '</strong></center></div>';
                }
                    DestroyCookie('msg'); #Funcao para destruir um cookie
                ?>
                    <button type="submit" class="btn btn-primary col-md-3 col-md-offset-3">Logar</button>
                    
                <a href="<?= base_url('login')?>" class="btn btn-success col-md-offset-1">Logar Aluno</a> 
                </form>
        </div>
    </div>
</div>
