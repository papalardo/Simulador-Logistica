<center>
    <?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } DestroyCookie('msg') ?>
</center>
<table class="table">
    <thead>
        <th>#</th>
        <th>Descrição</th>
        <th>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($componentes as $dados): ?>
        <tr>
            <td>
                <?= $dados->nome_ccr ?>
            </td>
            <td>
                <?= $dados->cargaHoraria_ccr ?>
            </td>
            <td>
                <a class="btn btn-warning" href="<?= base_url('ComponenteCurricular/editar/'.$dados->id_ccr) ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                <a onclick="javascript:return confirm('Tem certeza que quer apagar este registro?');" class="btn btn-danger" href="<?= base_url('ComponenteCurricular/deletar/'.$dados->id_ccr) ?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> Deletar</a>
          </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
