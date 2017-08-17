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
    public function Crud(){
        $it = new item_model();

        //obtem os dados 
        if(isset($_REQUEST['id_ias'])){
            $it = $this->model->Obtener($_REQUEST['id_ias']);
        }
        
        $tmpl = new Template('templates/template.tpl','view/item/editar.php', array('titulo' => 'Painel usuario', 'it' => $it->Listar()));
        echo $tmpl->render();
  }

   
    public function listar(){
        $it = new item_model();        
        $tmpl = new Template('templates/template.tpl','view/item/listar.php', array('titulo' => 'Painel usuario', 'it' => $it->listarTodos()));
        echo $tmpl->render();
    }

    public function Guardar(){
        $it = new item();

        $it->id_ias = $_REQUEST['id_ias'];
        $it->nome_ias = $_REQUEST['nome_ias'];
        $it->seguencia_ias = $_REQUEST['seguencia_ias'];

        
        $this->model->Registrar($it);

        header('Location: index.php');
    }

    public function Editar(){
        $it = new item();

        $it->id_ias = $_REQUEST['id_ias'];
        $it->nome_ias = $_REQUEST['nome_ias'];
        $it->seguencia_ias = $_REQUEST['seguencia_ias'];
       

        $this->model->Atualizar($it);

        header('Location: index.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_ias']);
        header('Location: index.php');
    }
}
