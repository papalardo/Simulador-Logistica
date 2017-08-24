<form id="frm-item" action="<?= base_url('Item/atualizar/' . $resultado->id_ias); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_ias" value="<?= $resultado->id_ias; ?>" />

    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome_ias" value="<?= $resultado->nome_ias; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Seguencia</label>
        <input type="text" name="sequencia_ias" value="<?= $resultado->sequencia_ias; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:100" />
    </div>
    <div class="form-group">
        <label>Atiidade Simulador</label>
   <?php 
    echo gerar_dropdown('tb_ativ_simu','id_asm', 'nome_asm', 'id_asm')
    ?>
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
