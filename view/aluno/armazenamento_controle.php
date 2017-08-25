
    <div class="card col-md-4">

        <h3> Componente Curricular: <br> Armazenamento e Controle de Estoque</h3>
        <br> Ciclo do simulador 1
        <br>
        <div class="col-md-6">
            <img style="width: 150px" src="<?= base_url('assets/img/mapa1.png')?>"> Figura 1
        </div>
        <div class="col-md-6">
            <img style="width: 150px" src="<?= base_url('assets/img/mapa2.png')?>"> Figura 2
        </div>
    </div>
    <div class="card col-md-10 col-md-offset-1">
        <center>
            
        <?php foreach ($listar as $r): ?>

        <div class="col-md-3">
            <a href="<?= base_url('aluno/passo2/' . $r->id_sml)?>">
            <h2><?= $r->nome_sml ; ?></h2>
            <img src="<?= base_url('assets/img/icon-cal.png') ?>" style="width:150px">
            </a>
        </div>
        <?php endforeach; ?>
            
        
            </center>
    </div>