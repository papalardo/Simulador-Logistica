<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Adicionar Perfil</div>
        <div class="panel-body">
            <form action="<?= base_url('ComponenteCurricular/atualizar/' . $resultado->id_ccr)?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome" value="<?= $resultado->nome_ccr ?>">
                        <center><?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?></center>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Carga horaria</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="cargaHoraria" value="<?= $resultado->cargaHoraria_ccr ?>">
                    </div>
                </div>
                <button type="submit" name="acao" value="update" class="btn btn-default"> Atualizar </button>
                
            </form>
                </div>
        </div>
    </div>
