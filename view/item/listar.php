<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">ID</th>
            <th style="width:120px;">Nome</th>
            <th style="width:120px;">Seguencia</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($listar as $r): ?>
        <tr>
            <td><?php echo $r->id_ias; ?></td>
            <td><?php echo $r->nome_ias; ?></td>
            <td><?php echo $r->sequencia_ias; ?></td>
            <td><?php echo $r->nome_asm; ?></td>
            <td>
                <a href="<?= base_url('Item/editar/' . $r->id_ias); ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Certeza que queres eliminar este registro?');" href="<?= base_url('Item/deletar/' . $r->id_ias); ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
