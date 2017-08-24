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
            <td><a href="<?= base_url('ComponenteCurricular/deletar/'.$dados->id_ccr) ?>">Deletar</a>
                <a href="<?= base_url('ComponenteCurricular/editar/'.$dados->id_ccr) ?>">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
