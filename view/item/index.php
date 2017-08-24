<form id="frm-item" action="<?= base_url('Item/novo')?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome_ias" class="form-control" placeholder="" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Seguencia</label>
        <input type="number" name="seguencia_ias" class="form-control" data-validacion-tipo="requerido|min:100" />
    </div>
    
    <div class="form-group">
        <label>Atiidade Simulador</label>
   <?php 
    echo gerar_dropdown('tb_ativ_simu','id_asm', 'nome_asm', 'id_asm')
    ?>
    </div>

    
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
