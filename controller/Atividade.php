<?php

class Atividade {

    public function __construct(){
        $this->atividade = new Atividade_model();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    public function index(){
        $data = array('titulo' => 'Painel usuario');
        echo $this->template->template('templates/template.tpl')->view('view/atividade/index.php')->data( $data )->render();
    }


    public function listar(){
        $data = array('titulo' => 'Painel usuario',
                      'listar' => $this->atividade->Listar());
        echo $this->template->template('templates/template.tpl')->view('view/atividade/listar.php')->data( $data )->render();
    }
    
    public function deletar(){
        $id = $this->uri->segment(4);
        if ($this->atividade->deletar($id)){ 
               setcookie('msg','Perfil Deletado!'); #Deu bom
        }
        redirect('atividade/listar');
    }

    public function novo(){
        
        $nome_asm = isset($_POST['nome_asm']) ? $_POST['nome_asm'] : ''; #Resgata variáveis do formulário
        $nome_asm = isset($_POST['tempo_asm']) ? $_POST['tempo_asm'] : ''; #Resgata variáveis do formulário
        $pontuacao_asm = isset($_POST['pontuacao_asm']) ? $_POST['pontuacao_asm'] : ''; #Resgata variáveis do formulário
        $imagem_asm = isset($_POST['imagem_asm']) ? $_POST['imagem_asm'] : ''; #Resgata variáveis do formulário
        
        
        $this->atividade->__set('nome_asm', $nome_asm);
        $this->atividade->__set('tempo_asm', $tempo_asm);
        $this->atividade->__set('pontuacao_asm', $pontuacao_asm);
        $this->atividade->__set('imagem_asm', $imagem_asm);
        $this->atividade->__set('id_csm', $id_csm);
        
        $this->atividade->adicionar();

        redirect('atividade');
    }

    public function editar(){
        $ativ = new atividade();

        $ativ->id_asm = $_REQUEST['id_asm'];
        $ativ->nome_asm = $_REQUEST['nome_asm'];
        $ativ->tempo_asm = $_REQUEST['tempo_asm'];
        $ativ->pontuacao_asm = $_REQUEST['pontuacao_asm'];
		$ativ->imagem_asm = $_REQUEST['imagem_asm'];

        $this->model->Atualizar($ativ);

        header('Location: index.php?c=atividade');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_asm']);
        header('Location: index.php');
    }
}
