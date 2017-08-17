<h1 class="page-header">
    Novo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=item">Item</a></li>
  <li class="active">Novo Registro</li>
</ol>

<form id="frm-item" action="?c=item&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>ID</label>
      <input type="text" name="id_ias" value="<?php echo $it->id_ias; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome_ias" value="<?php echo $it->nome_ias; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Seguencia</label>
        <input type="text" name="seguencia_ias" value="<?php echo $it->seguencia_ias; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:100" />
    </div>

    <?php 
    echo gerar_dropdown('item_model','id_asm', 'nome_asm', 'id_asm')
    ?>
    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-item").submit(function(){
            return $(this).validate();
        });
    })
</script>
