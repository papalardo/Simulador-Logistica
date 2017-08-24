            <form action="<?= base_url('ComponenteCurricular/novo') ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome">
                        </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Carga horaria</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="cargaHoraria">
                        </div>
                </div>
                <button type="submit" name="acao" value="novo" class="btn btn-default"> Cadastrar </button>
            </form>
