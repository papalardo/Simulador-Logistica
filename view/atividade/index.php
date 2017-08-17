
<form id="frm-atividade" action="<?=base_url('atividade/novo') ?>" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome_asm" class="form-control" placeholder="" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Tempo</label>
        <input type="time" name="tempo_asm" class="form-control" placeholder="" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Pontuação</label>
        <input type="number" name="pontuacao_asm" value="" class="form-control" placeholder="" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Imagem</label>
        <input type="file" name="imagem_asm" value="" class="form-control" placeholder="" data-validacion-tipo="requerido|min:240" />
    </div>
    
    <div class="form-group">
        <label>Ciclo Simulador</label>
      
        <?php 
        echo gerar_dropdown('item_model','id_asm', 'nome_asm', 'id_asm')
        ?>
    </div>
    
    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-atividade").submit(function(){
            return $(this).validate();
        });
    })
</script>
