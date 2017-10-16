<form action="<?= base_url('cicloSimulador/novo') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
    <label for="name" class="control-label col-sm-4">Descricao</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="descricao_csm" required="required" maxlength="45">
   </div>
</div>

<div class="form-group">
    <label for="name" class="control-label col-sm-4">Imagem</label>
    <div class="col-sm-8">
        <input type="file"  name="imagem_csm" class="form-control" maxlength="45">
   </div>
</div>

<div class="form-group">
    <label for="name" class="control-label col-sm-4">Componente</label>
    <div class="col-sm-8">
      <?php 
        echo gerar_dropdown('tb_comp_curc','id_ccr', 'nome_ccr', 'id_ccr')
        ?>
    </div>
</div>

<div class="form-group">
    <label for="name" class="control-label col-sm-4">Simulador</label>
    <div class="col-sm-8">
        <?php 
        echo gerar_dropdown('tb_simulador','id_sml', 'nome_sml', 'id_sml')
        ?>
    </div>
</div>

<button type="submit" class="btn btn-default"> Cadastrar </button>
</form>
