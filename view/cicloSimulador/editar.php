<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Atualizar Perfil - 
                        <center><?php if (isset($_COOKIE['msg'])){ 
                                        echo $_COOKIE['msg']; 
                                        DestroyCookie('msg'); } ?></center></div>
        <div class="panel-body">
            <form action=" <?= base_url('perfil/atualizar/'. $resultado->id_per) ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Descricao</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="descricao" value="<?= $resultado->desc_per ?>">
                    </div>
                </div>
                <button type="submit" name="acao" value="update" class="btn btn-default"> Atualizar </button>
            </form>
        </div>
    </div>
</div>
