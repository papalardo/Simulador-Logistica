<h1 class="page-header">Item</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=item&a=Novo">Novo Item</a>
    <a class="btn btn-primary" href="?c=atividade&a=Novo">Nova Atividade</a>
</div>

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
            <td><?php echo $r->seguencia_ias; ?></td>
            <td>
                <a href="?c=item&a=Crud&id_ias=<?php echo $r->id_ias; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Certeza que queres eliminar este registro?');" href="?c=item&a=Eliminar&id_ias=<?php echo $r->id_ias; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
