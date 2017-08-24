
<form id="frm-atividade" action="<?= base_url('Atividade/atualizar/' . $resultado->id_asm); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_asm" value="<?php echo $resultado->id_asm; ?>" />


    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome_asm" value="<?php echo $resultado->nome_asm; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Tempo</label>
        <input type="text" name="tempo_asm" value="<?php echo $resultado->tempo_asm; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Pontuação</label>
        <input type="text" name="pontuacao_asm" value="<?php echo $resultado->pontuacao_asm; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:240" />
    </div>
	
	<div class="form-group">
        <label>Imagem</label>
        <input type="text" name="imagem_asm" value="<?php echo $resultado->imagem_asm; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:240" />
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
