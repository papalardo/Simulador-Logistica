<?php


class Item {

    public function __construct(){
        $this->item = new Item_model();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    public function index(){
        echo $this->template->template('templates/template.tpl')->view('view/item/index.php')->render();
    }
    
    //Chamada para ver item de-edit
    public function editar(){
        $id = $this->uri->segment(4);
        $data = array('resultado' => $this->item->procurar($id));
        echo $this->template->template('templates/template.tpl')->view('view/item/editar.php')->data( $data )->render();
    
  }

   
    public function listar(){
        $data = array( 'listar' => $this->item->listarTodos());
        echo $this->template->template('templates/template.tpl')->view('view/item/listar.php')->data( $data )->render();
    }

    public function novo(){
        $this->item->__set('nome_ias', $_POST['nome_ias']);
        $this->item->__set('sequencia_ias', $_POST['sequencia_ias']);
        $this->item->__set('id_asm', $_POST['id_asm']);

        
        $this->item->adicionar();

        redirect('Item/listar');
    }

    public function atualizar(){
        
        
        $id = $this->uri->segment(4);
        $this->item->__set('nome_ias', $_POST['nome_ias']);
        $this->item->__set('sequencia_ias', $_POST['sequencia_ias']);
        $this->item->__set('id_asm', $_POST['id_asm']);
       

        $this->item->atualizar($id);

        redirect('Item/listar');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_ias']);
        header('Location: index.php');
    }
}
