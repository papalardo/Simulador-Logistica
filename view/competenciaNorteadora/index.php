
        <div class="panel-heading">Adicionar Competencia</div>
        <?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?>
        <div class="panel-body">
            <form action="<?= base_url('competenciaNorteadora/adicionar') ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome" required="required" title="nome" maxlength="45">
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
                <button type="submit" name="acao" value="novo" class="btn btn-default"> Cadastrar </button>
            </form>
