<form action="<?= base_url('cicloSimulador/adicionar') ?>" method="post" class="form-horizontal">

<div class="form-group">
    <label for="name" class="control-label col-sm-4">Descricao</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="descricao">
   </div>
</div>

<div class="form-group">
    <label for="name" class="control-label col-sm-4">Descricao</label>
    <div class="col-sm-8">
        <input type="" class="form-control" name="imagem">
   </div>
</div>

<div class="form-group">
    <label for="name" class="control-label col-sm-4">Descricao</label>
    <div class="col-sm-8">
      <?php 
        echo gerar_dropdown('tb_comp_curc','id_ccr', 'nome_ccr', 'id_ccr')
        ?>
    </div>
</div>

<div class="form-group">
    <label for="name" class="control-label col-sm-4">Componente Curricular</label>
    <div class="col-sm-8">
        <?php 
        echo gerar_dropdown('tb_simulador','id_sml', 'nome_sml', 'id_sml')
        ?>
    </div>
</div>

<button type="submit" class="btn btn-default"> Cadastrar </button>
</form>
