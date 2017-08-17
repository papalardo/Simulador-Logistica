<h1 class="page-header">
    <?php echo $it->id_ias != null ? $it->nome_ias : 'Novo Item'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=item">Item</a></li>
  <li class="active"><?php echo $it->id_ias != null ? $it->nome_ias : 'Novo Item'; ?></li>
</ol>

<form id="frm-item" action="?c=item&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_ias" value="<?php echo $it->id_ias; ?>" />

    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome_ias" value="<?php echo $it->nome_ias; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Seguencia</label>
        <input type="text" name="seguencia_ias" value="<?php echo $it->seguencia_ias; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:100" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Atualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-item").submit(function(){
            return $(this).validate();
        });
    })
</script>
