<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Nome Curso</div>
        <div class="panel-body">
            <form action="<?= base_url('Curso/atualizar/' . $resultado->id_cur) ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome" value="<?= $resultado->nome_cur ?>">
                        <center><?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?></center>
                    </div>
                </div>
                
                <button type="submit" name="acao" value="update" class="btn btn-default"> Atualizar </button>
            </form>
        </div>
    </div>
</div>
