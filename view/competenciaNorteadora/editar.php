<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Atualizar Competencia</div>
        <div class="panel-body">
            <form action="competenciaNorteadora/atualizar/ <?= $id->id_cnr?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome" maxlength="45" value="<?= $resultado->nome_cnr ?>">
                        <center><?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?></center>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Simulador</label>
                    <div class="col-sm-8">
                        <?php 
                        echo gerar_dropdown('tb_simulador','id_sml', 'nome_sml', 'id_sml')
                        ?>
                </div>
                </div>
                <button type="submit" name="acao" value="update" class="btn btn-default"> Atualizar </button>
            </form>
        </div>
    </div>
</div>
