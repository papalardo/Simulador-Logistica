<?php


class Item {

    public function __construct(){
        $this->item = new Item_model();
        $this->atividade = new Atividade_model();
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
        
        $itens = '<div class="panel-group">
                    <div class="panel panel-default">';
        foreach ($this->atividade->listarTodos() as $atv){
            $itens .= "<div class='panel-heading'>
                        <h4 class='panel-title' style='text-align:center'>
                            <a data-toggle='collapse' href='#collapse{$atv->id_asm}'>{$atv->nome_asm}</a>
                        </h4>
                        </div>";
                $itens .= "<div id='collapse{$atv->id_asm}' class='panel-collapse collapse'>";
                $itens .= "<table class='table table-bordered table-hover'>
                            <thead>
                                <th>Nr. Sequencia </th>
                                <th> Nome </th>
                                <th> Ação </th>
                            </thead>
                            <tbody>";
            
            foreach ($this->item->listarItensByAtividade($atv->id_asm) as $item){
                
                $itens .= "<tr>
                                <td>{$item->sequencia_ias}</td>
                                <td>{$item->nome_ias}</td>
                                <td>
                                    <a href=" . base_url('Item/editar/' . $item->id_ias) . ">Editar</a>
                                    <a href=" . base_url('Item/deletar/' . $item->id_ias) . ">Eliminar</a>
                                </td>
                            </tr>";
            
            }
            $itens .= "</tbody>
                    </table>
                </div>";
        }
        $itens .= "</div></div>";
        
        $data = array( 'itens' => $itens);
        echo $this->template->template('templates/template.tpl')->view('view/item/listar.php')->data( $data )->render();
 }

     public function novo(){
        
        $nome_ias = isset($_POST['nome_ias']) ? $_POST['nome_ias'] : ''; #Resgata variáveis do formulário
        $sequencia_ias = isset($_POST['sequencia_ias']) ? $_POST['sequencia_ias'] : ''; #Resgata variáveis do formulário
        $id_asm = isset($_POST['id_asm']) ? $_POST['id_asm'] : ''; #Resgata variáveis do formulário
       
        $this->item->__set('nome_ias', $nome_ias);
        $this->item->__set('sequencia_ias', $sequencia_ias);
        $this->item->__set('id_asm', $id_asm);
        
        $this->item->adicionar();

        redirect('item');
    }

    public function atualizar(){
        $id = $this->uri->segment(4);
        
        $nome_ias = isset($_POST['nome_ias']) ? $_POST['nome_ias'] : ''; #Resgata variáveis do formulário
        $sequencia_ias = isset($_POST['sequencia_ias']) ? $_POST['sequencia_ias'] : ''; #Resgata variáveis do formulário
        $id_asm = isset($_POST['id_asm']) ? $_POST['id_asm'] : ''; #Resgata variáveis do formulário
       
        $this->item->__set('nome_ias', $nome_ias);
        $this->item->__set('sequencia_ias', $sequencia_ias);
        $this->item->__set('id_asm', $_POST['id_asm']);
        

        $this->item->atualizar($id);

        redirect('item/editar/' . $id);
    }
    
     public function deletar(){
        $id = $this->uri->segment(4);
        if ($this->item->deletar($id)){ 
               setcookie('msg','Dados Deletado!'); #Deu bom
        }
        redirect('item/listar');
    }
    

    //public function Eliminar(){
        //$this->model->Eliminar($_REQUEST['id_asm']);
       // header('Location: index.php');
   // }
}


