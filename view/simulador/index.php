
            <form action="<?= base_url('simulador/adicionar') ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome">
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricao" class="control-label col-sm-4">Descricao</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="descricao">
                        <center><?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?></center>
                    </div>
                </div>
               
                <button type="submit" name="acao" value="novo" class="btn btn-default"> Cadastrar </button>
            </form>
