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
                <?= $dados->id_per ?>
            </td>
            <td>
                <?= $dados->desc_per ?>
            </td>
            <td>
                <a class="btn btn-warning" href="<?= base_url('perfil/editar/'.$dados->id_per) ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                <a onclick="javascript:return confirm('Tem certeza que quer apagar este registro?');" class="btn btn-danger" href="<?= base_url('perfil/deletar/'.$dados->id_per) ?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> Deletar</a>
          
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
