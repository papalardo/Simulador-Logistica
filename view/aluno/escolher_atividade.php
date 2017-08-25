    <div class="card col-md-4">

        <div class="col-md-3">
            <img style="width: 100px" src="<?= base_url('assets/img/icon-cal.png')?>">
        </div>
        <div class="col-md-9">
            Ciclo simulador  <br>
            Comprar 
        </div>
    </div>
    <div class="card col-md-10 col-md-offset-1">
        <center>
        <h3> Atividades</h3>
          <?php foreach ($listar as $r): ?>
            <div class="col-md-3">
            <a href="<?= base_url('aluno/passo3/' . $r->id_asm)?>">
            <h2><?= $r->nome_asm ; ?></h2>
            <img src="<?= base_url('assets/img/paper.jpg') ?>" style="width:100px">
            </a>
        </div>
        <?php endforeach; ?>
        </center>
        - 
    </div>
