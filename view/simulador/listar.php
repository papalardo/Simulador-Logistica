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
        <?php foreach ($listar as $dados): ?>
        <tr>
            <td>
                <?= $dados->id_sml ?>
            </td>
            <td>
                <?= $dados->nome_sml ?>
            </td>
            <td>
                <?= $dados->descricao_sml ?>
            </td>
            <td>
                <a class="btn btn-warning" href="<?= base_url('simulador/editar/'.$dados->id_sml) ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                <a onclick="javascript:return confirm('Tem certeza que quer apagar este registro?');" class="btn btn-danger" href="<?= base_url('simulador/deletar/'.$dados->id_sml) ?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> Deletar</a>
          </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
