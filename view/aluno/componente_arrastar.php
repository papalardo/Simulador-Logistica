<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simulador</title>

    <link href="<?= base_url('assets/fonts/icon.css?family=Material+Icons')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/materialize/css/materialize.min.css')?>" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="<?= base_url('assets/css/bootstrap.css')?>" rel="stylesheet" />
    <link href="<?= base_url('assets/js/jquery-ui/jquery-ui.min.css')?>" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?= base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />
    <!-- Custom Styles-->
    <!-- Google Fonts-->
    <link href="<?= base_url('assets/fonts/css.css?family=Open+Sans')?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.cookie.js'); ?>"></script>
    <?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>
   
   <script type="text/javascript">
       // funcao para salvar cookies em javascript
       function setCookie(key, value) {
                var expires = new Date();
                expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
                document.cookie = key + '=' + value +';path=/'+ ';expires=' + expires.toUTCString();
            } 
        

        function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        };
       
       </script>
    
    
 
<style>
    body {
    margin: 0;
    margin-right: 0 auto;
    margin-left: 0 auto;
    background-color: #73BCDF;
   /* background-image:url("img/background-login.jpg");*/
    background-repeat: no-repeat;
    background-size: 80% 100%;
}
    #item {
        margin-top: 20px;
        height: 50px;
        text-align: center;
        padding: 15px;
        font-size: 20px;
        width: 400px;
    }
    
    .game {
        background: rgb(242,243,242);
    }
    
    #cardSlots, #cardPile {
  width:50%;
  padding: 20px;
border: 0px;
  /*
        border: 2px solid #333;
   -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -moz-box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .3em rgba(0, 0, 0, .8); 
  box-shadow: 0 0 .3em rgba(0, 0, 0, .8);*/
}
    
#cardSlots div, #cardPile div {
  width: 300px;
  height: 25px;
  padding-bottom: 0;
border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  background: #fff;
margin-top: 10px;
margin-left: auto;
}

    #cardSlots div {
        margin-right: 0;
    }
    #cardPile div {
        margin-left: 0;
    }

    
#cardSlots div:first-child, #cardPile div:first-child {
  margin-top: 0;
}
    
/* Quando passar um item em cima do outro; COR */
#cardSlots div.hovered {
  background: #aaa;
}
 
/* Bordas pontilhadas nos slots */
#cardSlots div {
  border-style: dashed;
}
    
/* Estilo dos Cards */
#cardPile div {
  background: #666;
  color: #fff;
  font-size: 15px;
  text-shadow: 0 0 3px #000;
text-align: center;
}
   
#cardPile div.ui-draggable-dragging {
  -moz-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
}
    
/* Cores individuais nos slots */
#card1.correct { background: red; }
#card2.correct { background: brown; }
#card3.correct { background: orange; }
#card4.correct { background: yellow; }
#card5.correct { background: green; }
#card6.correct { background: cyan; }
#card7.correct { background: blue; }
#card8.correct { background: indigo; }
#card9.correct { background: purple; }
#card10.correct { background: violet; }

/* Tela quando completa o jogo */
#successMessage {
  position: absolute;
  left: 580px;
  top: 250px;
  width: 0;
  height: 0;
  z-index: 100;
  background: #dfd;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -moz-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  padding: 20px;
}
    
#failedMessage {
  position: absolute;
  left: 580px;
  top: 250px;
  width: 0;
  height: 0;
  z-index: 100;
  background: red;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -moz-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  padding: 20px;
}
    
    #timer {
        text-decoration: none;
    }
    
    </style>
</head>

<body onload="init()">

    <div class="col-md-4 col-md-offset-1">
        <div class="card" style="height:170px">
            <br>
            <img src="<?= base_url('assets/img/perfil.png')?>" class="col-md-4"> Ana Carolina <br> CEP: Gama <br> Tecnico em Logistica <br>
            <a href="#"> Perfil </a><br>
            <a href="<?= base_url('login/logout') ?>"> Deslogar </a>
        
        </div>

    </div>
    <div class="card col-md-4">
    <div class="col-md-5">
    <center>
    <h4>Tempo: <a id="timer"></a></h4>
        
   <img src="<?= base_url('assets/img/paper.jpg') ?>" style="width:150px"> <br>
    Acertos: <h7 id="acertos"></h7> <br>
    Pontuacao: <h7 id="pontuacao"></h7>
    </center>
    </div>
    
    <div class="col-md-7">
        <br>
        <?= $simulador->descricao_csm ?>
        </div>
    </div>
    <div class="card col-md-10 col-md-offset-1 game" id="content">
  <div id="cardSlots" class="col-md-6"> </div>
    <div id="cardPile" class="col-md-6"> </div>
 </div>
    
    
    <div id="successMessage">
    <!-- <h2>Voce ganhou, parabens</h2>
    <button onclick="init()">Jogar novamente</button> -->
      <form action="<?= base_url('aluno/realizar_ciclo') ?>" method="post">
      <input type="hidden" name="pontuacao">
    <input type="hidden" name="id_csm" value="<?= $simulador->id_csm ?>">
    <button type="submit" class="btn btn-primary">Finalizar atividade</button>
      </form>
  </div>
    
    <div id="failedMessage">
    <!-- <h2>Voce ganhou, parabens</h2>
    <button onclick="init()">Jogar novamente</button> -->
      <form action="<?= base_url('aluno/realizar_ciclo') ?>" method="post">
        <h4> O tempo acabou :'( </h4>
      <input type="hidden" name="pontuacao">
    <input type="hidden" name="id_csm" value="<?= $simulador->id_csm ?>">
    <button type="submit" class="btn btn-primary">Finalizar atividade</button>
      </form>
  </div>
    
    
    
    
 <script src="<?= base_url('assets/js/jquery-1.12.4.js')?>"></script>
    
    <script src="<?= base_url('assets/js/jquery-ui.js')?>"></script>

    <!-- Bootstrap Js -->
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>

    <script src="<?= base_url('assets/materialize/js/materialize.min.js')?>"></script>

    <!-- Metis Menu Js -->
    <script src="<?= base_url('assets/js/jquery.metisMenu.js')?>"></script>
    <!-- Custom Js -->
    <script src="<?= base_url('assets/js/custom-scripts.js')?>"></script>
    
    
    <script type="text/javascript">


if ((getCookie('clock') <= 0) || getCookie('clock') == 'NaN') {
var count = <?= $simulador->tempo_asm ?>;
setCookie('clock', count );
} else {
var count = getCookie('clock'); 
};
        
var counter = setInterval(timer, 1000);
var correctCards = 0;
        
$( init );

function init() {

  // Hide the success message
  $('#successMessage').hide();
  $('#failedMessage').hide();
  $('#successMessage').css( {
    left: '580px',
    top: '250px',
    width: 0,
    height: 0
  } );

  // Reset the game
  correctCards = 0;
  pontuacao = 100;
    acertos = 0;
  $('#cardPile').html( '' );
  $('#cardSlots').html( '' );
  $('#pontuacao').html( pontuacao );
  $('#acertos').html( acertos );
    

  // Create the pile of shuffled cards
  //var numbers = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ];
    
    
    var numbers = [
    <?php foreach ($listar as $r): ?>
    <?= "'" . $r->nome_ias . "',"; ?>
        <?php endforeach; ?>
    ];
    
    var numbers2 = [
    <?php foreach ($listar as $r): ?>
    <?= "'" . $r->sequencia_ias . "',"; ?>
        <?php endforeach; ?>
    ];
    
  for ( var i=0; i < numbers.length; i++ ) {
    $('<div>' + numbers[i] + '</div>').data( 'number', numbers2[i] ).attr( 'id', 'card'+numbers2[i] ).appendTo( '#cardPile' ).draggable( {
      containment: '#content',
      stack: '#cardPile div',
      cursor: 'move',
      revert: true
    } );
  }

  // Create the card slots
  // var words = [ 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten' ];
 var words = [
    <?php foreach ($listar as $r): ?>
    <?= "'" . $r->sequencia_ias . "',"; ?>
        <?php endforeach; ?>
    ];
    
    for ( var i=0; i < words.length; i++ ) {
    $('<div>' +  /*words[i] */+ '</div>').data( 'number', i+1 ).appendTo( '#cardSlots' ).droppable( {
      accept: '#cardPile div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    } );
  }

}

function handleCardDrop( event, ui ) {
  var slotNumber = $(this).data( 'number' );
  var cardNumber = ui.draggable.data( 'number' );

  if ( slotNumber == cardNumber ) {
    ui.draggable.addClass( 'correct' );  /* Adicionar "correct" ao class */
    ui.draggable.draggable( 'disable' ); /* Desabilita a funcao para dropar dentro da div  */
    $(this).droppable( 'disable' );   /* Desabilita a funcao arrastar do item */
    ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
    ui.draggable.draggable( 'option', 'revert', false );
    correctCards++;
    acertos = acertos+1;
    $('#acertos').html( acertos );
} else {
    pontuacao = pontuacao - 5;
    $('#pontuacao').html( pontuacao );
}
  
  // If all the cards have been placed correctly then display a message
  // and reset the cards for another go

  if ( correctCards == 5  ) {
    $('#successMessage').show();
    $('#successMessage').animate( {
      left: 'auto',
      top: 'auto',
      width: '250px',
      height: '80px',
      opacity: 1
    } );
    $( "input[type=hidden][name=pontuacao]" ).val(pontuacao);
    count = 0;
    setCookie('clock', 0);
  }

}
        
        
// CONTADOR 
       
function timer() {
    count = count - 1;
    setCookie('clock', count); // Salvar o tempo em um cookie
    if (count == -1) {
        clearInterval(counter);
        return;
    }

    var seconds = count % 60;
    var minutes = Math.floor(count / 60);
    var hours = Math.floor(minutes / 60);
    minutes %= 60;
    hours %= 60;

    $('#timer').html(minutes + ":" + seconds + "s");
    //document.getElementById("timer").innerHTML = minutes + ":" + seconds + "s";
    if (minutes <= 0 && seconds <= 0 ){
        $('#content').hide();
        
        $('#failedMessage').show();
        $('#failedMessage').animate( {
          left: 'auto',
          right:'auto',
          top: 'auto',
          width: '230px',
          height: '120px',
          opacity: 1
        } );
        $( "input[type=hidden][name=pontuacao]" ).val(0);
        count = 0;
        setCookie('clock', 0);
        

    }

    
}
</script>
    
    
</body>

</html>


