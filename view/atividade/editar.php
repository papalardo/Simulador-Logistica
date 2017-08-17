<h1 class="page-header">
    <?php echo $ativ->id_asm != null ? $ativ->nome_asm : 'Novo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=atividade">Atividade</a></li>
  <li class="active"><?php echo $ativ->id_asm != null ? $ativ->nome_asm : 'Novo Registro'; ?></li>
</ol>

<form id="frm-atividade" action="?c=atividade&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_asm" value="<?php echo $ativ->id_asm; ?>" />


    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome_asm" value="<?php echo $ativ->nome_asm; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Tempo</label>
        <input type="text" name="tempo_asm" value="<?php echo $ativ->tempo_asm; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Pontuação</label>
        <input type="text" name="pontuacao_asm" value="<?php echo $ativ->pontuacao_asm; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:240" />
    </div>
	
	<div class="form-group">
        <label>Imagem</label>
        <input type="text" name="imagem_asm" value="<?php echo $ativ->imagem_asm; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:240" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Atualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-atividade").submit(function(){
            return $(this).validate();
        });
    })
</script>
