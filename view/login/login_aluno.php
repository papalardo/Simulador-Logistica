<html>
<head>
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">

<style>
html { 
  background: url(image/path) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body {
    margin: 0;
    margin-right: 0 auto;
    margin-left: 0 auto;
    background-color: #73BCDF;
   /* background-image:url("img/background-login.jpg");*/
    background-repeat: no-repeat;
    background-size: 80% 100%;
}
.login {
    background: #fff;
    width: 500px;
    height: 250px;
    top: 20px;
    border: 2px;
    border-radius: 50px;
    z-index: 999
}
   
.login:after{
    content: "";
    width: 0;
    height: 0;
    position: absolute;
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    border-left: 50px solid #fff;

    top: 60%;
    left: 100%;
}
.form-input {
    top: 30px;
    position: relative;
    left:20px;
}
    .container {
        top:30px;
        position: relative;

    }
    .foto-perfil{
        width: 100px;
        top: 20px;
        position: relative
    }
    
</style>
</head>

<body>

<div class="container">
<div class="col-md-3 col-md-offset-2 login">
<div class="form-input">
<form method="post" action="<?= base_url('login/entrarAluno') ?>">
<div class="row">
<div class="col-md-8">
    <div class="form-group">
    <label for="email">Email</label>
    <input type="username" name="username" class="form-control" placeholder="Entre com o e-mail">
  </div>  
    <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" name="password" class="form-control" placeholder="Entre com a senha">
  </div>  
</div>
<div class="col-md-3">
<img src="<?= base_url('assets/img/perfil.png')?>" class="foto-perfil img-rounded">        
</div>

</div>

                    <button type="submit" class="btn btn-primary col-md-4 col-md-offset-1">Login</button>
                    
                    <a href="<?= base_url('login/admin')?>" class="btn btn-success col-md-offset-1">Logar Admin</a>

<?php if (isset($_COOKIE['msg'])){
                    echo '<div class="alert alert-danger" role="alert"><center><strong>';
                    echo $_COOKIE['msg'];
                    echo '</strong></center></div>';
                    DestroyCookie('msg'); #Funcao para destruir um cookie
                }
                    
                ?>
    </form>    

  </div>  
</div>

<div class="col-md-2">
<img src="<?= base_url('assets/img/boy.png')?>" width="300px">
</div>
</div>
    
</body>
</html>