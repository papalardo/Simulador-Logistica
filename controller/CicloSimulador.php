<?php

class CicloSimulador {
    
    
    public function __construct(){
        $this->cicloSimulador = new CicloSimulador_Model();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    public function index(){
        $data = array('titulo' => 'Painel usuario');
        echo $this->template->template('templates/template.tpl')->view('view/cicloSimulador/index.php')->data( $data )->render();
    }
    
    public function listar(){
        $data = array('titulo' => 'Painel usuario',
                      'listar' => $this->cicloSimulador->listarTodos());
        echo $this->template->template('templates/template.tpl')->view('view/cicloSimulador/listar.php')->data( $data )->render();
    }
    
    public function editar(){
        $id = $this->uri->segment(4);
        $data = array('resultado' => $simulador->procurar($id));
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
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
        $imagem = isset($_POST['imagem']) ? $_POST['imagem'] : ''; #Resgata variáveis do formulário
        $id_ccr = isset($_POST['id_ccr']) ? $_POST['id_ccr'] : ''; #Resgata variáveis do formulário
        $id_sml = isset($_POST['id_sml']) ? $_POST['id_sml'] : ''; #Resgata variáveis do formulário
        
        if (empty($descricao)){ #Verifica se os campos estão preenchidos
            setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    #$nome  = htmlspecialchars(strip_tags($_POST['nome'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    
                    
                    $this->cicloSimulador->__set('descricao_csm', $descricao);
                    $this->cicloSimulador->__set('imagem_csm', $imagem);
                    $this->cicloSimulador->__set('id_ccr', $id_ccr);
                    $this->cicloSimulador->__set('id_sml', $id_sml);
                    
                    if ( $this->cicloSimulador->adicionar() ){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                        setcookie('msg','Novo curso cadastrado!'); #Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); #Deu ruim
                    }
                    

            }
        redirect('cicloSimulador/listar');
    }
    
    public function atualizar(){
        $simulador = new Simulador_model(); #Cria novo objeto
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
        $id = $_GET['id'];
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
        redirect('?pag=perfil&acao=editar&id=' . $_GET['id']);
    }
}

?>
