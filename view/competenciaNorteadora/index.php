
            <form action="<?= base_url('CompetenciaNorteadora/adicionar') ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome">
                        <center><?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?></center>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Simulador</label>
                    <div class="col-sm-8">
                        <?php 
                        echo gerar_dropdown('simulador_model','id_sml', 'nome_sml', 'id_sml')
                        ?>
                    </div>
                </div>
                <button type="submit" name="acao" value="novo" class="btn btn-default"> Cadastrar </button>
            </form>
