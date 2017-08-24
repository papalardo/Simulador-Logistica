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
        $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
        $cargaHoraria = isset($_POST['cargaHoraria']) ? $_POST['cargaHoraria'] : ''; #Resgata variáveis do formulário
        
        if (empty($nome)){ #Verifica se os campos estão preenchidos
            setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
            } else {
                #$descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                
                $this->componentes->__set('nome', $nome);
                $this->componentes->__set('cargahoraria', $cargaHoraria);
            
                if ($this->componentes->adicionar()){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                    setcookie('msg','Novo perfil cadastrado!'); #Deu bom
                } else {
                    setcookie('msg','Ocorreu algum erro..'); #Deu ruim
                }
            }
        redirect('ComponenteCurricular/listar');
    }
    
    public function atualizar(){
        
        $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
        $cargaHoraria = isset($_POST['cargaHoraria']) ? $_POST['cargaHoraria'] : ''; #Resgata variáveis do formulário
        
        $id = $this->uri->segment(4);
        if (empty($nome)){ #Verifica se os campos estão preenchidos
            setcookie('msg',"Dados em branco!"); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    $descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    
                    $this->componentes->__set('nome', $nome);
                    $this->componentes->__set('cargahoraria', $cargaHoraria);
            
                    if ($this->componentes->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                        setcookie('msg','Dados atualizados!'); # Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); # Deu ruim
                    }

            }
        redirect('ComponenteCurricular/editar/' . $id);
    }
}

?>
