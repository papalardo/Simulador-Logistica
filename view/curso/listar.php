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
                <?= $dados->id_cur ?>
            </td>
            <td>
                <?= $dados->nome_cur ?>
            </td>
            <td><a href="<?= base_url('curso/deletar/'.$dados->id_cur) ?>">Deletar</a>
                <a href="<?= base_url('curso/editar/'.$dados->id_cur) ?>">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
