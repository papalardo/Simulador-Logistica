<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">  <center> Atualizar Ciclo
              <?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?></center>  </div>
        <div class="panel-body">
<form action="<?= base_url('cicloSimulador/atualizar'.$resultado->id_csm) ?>" method="post" class="form-horizontal">

<div class="form-group">
    <label for="name" class="control-label col-sm-4">Descricao</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="descricao_csm" required="required" maxlength="45" value="<?= $resultado->descricao_csm ?>">
   </div>
</div>

<div class="form-group">
    <label for="name" class="control-label col-sm-4">Imagem</label>
    <div class="col-sm-8">
        <input type="file" class="form-control" name="imagem_csm" maxlength="45" value="<?= $resultado->imagem_csm ?>">
        
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

<button type="submit" class="btn btn-default"> Atualizar  </button>
</form>
</div>
    </div>
</div>

