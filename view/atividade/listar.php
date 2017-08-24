<table class="table table-striped table-condensed">
    <thead>
        <tr>
            <th style="width:120px;">Nome</th>
            <th style="width:120px;">Tempo</th>
            <th style="width:120px;">Pontuação</th>
            <th style="width:120px;">Imagem</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($listar as $r): ?>
        <tr>
            <td><?php echo $r->nome_asm; ?></td>
            <td><?php echo $r->tempo_asm; ?></td>
            <td><?php echo $r->pontuacao_asm; ?></td>
            <td><?php echo $r->imagem_asm; ?></td>
            <td>
                <a class="btn btn-warning" href="<?= base_url('Atividade/editar/' . $r->id_asm) ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                <a onclick="javascript:return confirm('Tem certeza que quer apagar este registro?');" class="btn btn-danger" href="<?= base_url('Atividade/deletar/' . $r->id_asm) ?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> Deletar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
