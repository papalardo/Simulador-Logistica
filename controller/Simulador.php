<?php

require_once base_url('model/classes.php');


class Simulador {
    
    
    public function __construct(){
        $this->simulador = new Simulador_model();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    public function index(){
        $dados = array('titulo' => 'Painel usuario');
        echo $this->template->template('templates/template.tpl')->view('view/simulador/index.php')->data( $data )->render();
    }
    
    public function listar(){
        $data = array('titulo' => 'Painel usuario',
                      'listar' => $this->simulador->listarTodos());
        echo $this->template->template('templates/template.tpl')->view('view/simulador/listar.php')->data( $data )->render();
    }
    
    public function editar(){
        $id = $this->uri->segment(4);
        $data = array('resultado' => $this->simulador->procurar($id));
        echo $this->template->template('templates/template.tpl')->view('view/simulador/editar.php')->data( $data )->render();
    }
    
    public function deletar(){
        $id = $this->uri->segment(4);
        if ( $this->simulador->deletar($id) ){ 
            setcookie('msg',"Deletado!"); 
        }
        redirect('simulador/listar');
    }
    
    public function adicionar(){
        // resgata variáveis do formulário
        $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
        
        if (empty($nome)){ #Verifica se os campos estão preenchidos
            setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    #$nome  = htmlspecialchars(strip_tags($_POST['nome'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    
                    $this->simulador->__set('nome', $nome);
                    $this->simulador->__set('descricao', $descricao);

                    if ( $this->simulador->adicionar() ){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                        setcookie('msg','Novo curso cadastrado!'); #Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); #Deu ruim
                    }

            }
        redirect('Simulador');
    }
    
    public function atualizar(){
        $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
        
        $id = $this->uri->segment(4);
        
        if (empty($descricao)){ #Verifica se os campos estão preenchidos
            setcookie('msg',"Dados em branco!"); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    #$descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    
                    $this->simulador->__set('nome', $nome);
                    $this->simulador->__set('descricao', $descricao);
            
                    if ($this->simulador->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                        setcookie('msg','Dados atualizados!'); # Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); # Deu ruim
                    }

            }
        redirect('Simulador/editar/' . $id);
    }
}

?>
