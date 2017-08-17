<?php


class ComponenteCurricular {
    
    public function __construct(){
        $this->componentes = new ComponenteCurricular_Model();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    public function index(){
        echo $this->template->template('templates/template.tpl')->view('view/ComponenteCurricular/index.php')->render();
    }
    
    public function listar(){
        $data = array('titulo' => 'Painel usuario',
                      'componentes' => $this->componentes->listarTodos());
        echo $this->template->template('templates/template.tpl')->view('view/ComponenteCurricular/listar.php')->data( $data )->render();
    }
    
    public function editar(){
        $id = $this->uri->segment(4);
        $data = array('resultado' => $this->componentes->procurar($id));
        echo $this->template->template('templates/template.tpl')->view('view/ComponenteCurricular/editar.php')->data( $data )->render();
    
    }
    
    public function deletar(){
        $id = $this->uri->segment(4);
        if ( $this->componentes->deletar($id) ) { 
            setcookie('msg',"Deletado!"); 
        }
        redirect('ComponenteCurricular/listar');
    }
    
    public function novo(){
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
        if (empty($descricao)){ #Verifica se os campos estão preenchidos
            setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
            } else {
                $descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                $this->componentes->__set('descricao', $descricao);
                if ($this->componentes->adicionar()){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                    setcookie('msg','Novo perfil cadastrado!'); #Deu bom
                } else {
                    setcookie('msg','Ocorreu algum erro..'); #Deu ruim
                }
            }
        setcookie('msg', $return);
        redirect('ComponenteCurricular/listar');
    }
    
    public function atualizar(){
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
        $id = $this->uri->segment(4);
        if (empty($descricao)){ #Verifica se os campos estão preenchidos
            setcookie('msg',"Dados em branco!"); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    $descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    $perfil->__set('descricao', $descricao); #Pega o que foi digitado e muda seu valor no objeto
                    $id = $_GET['id']; #Pega o ID para localizar no Banco de dados
                    if ($perfil->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                        setcookie('msg','Dados atualizados!'); # Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); # Deu ruim
                    }

            }
        redirect('ComponenteCurricular/editar' . $id);
    }
}

?>
