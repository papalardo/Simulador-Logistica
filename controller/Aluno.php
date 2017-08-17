<?php


class Aluno {
    
    public function __construct(){
        require_once base_url('model/classes.php');
    }
    
    
    public function index(){
        $tmpl = new Template('view/aluno/escolher_componente.php',' ', array('titulo' => 'Painel usuario'));
        echo $tmpl->render();
    }
    
    public function exComp(){
        $tmpl = new Template('view/aluno/componente_arrastar.php',' ', array('titulo' => 'Painel usuario'));
        echo $tmpl->render();
    }
    
    public function passo1(){
        $tmpl = new Template('view/aluno/armazenamento_controle.php',' ', array('titulo' => 'Painel usuario'));
        echo $tmpl->render();
    }
    
    public function passo2(){
        $tmpl = new Template('view/aluno/escolher_atividade.php',' ', array('titulo' => 'Painel usuario'));
        echo $tmpl->render();
    }
    
    public function passo3(){
        $tmpl = new Template('view/aluno/componente_arrastar.php',' ', array('titulo' => 'Painel usuario'));
        echo $tmpl->render();
    }
    
    
    
}

?>
