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
            <td><a href="<?= base_url('simulador/deletar/'.$dados->id_sml) ?>">Deletar</a>
                <a href="<?= base_url('simulador/editar/'.$dados->id_sml) ?>">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
