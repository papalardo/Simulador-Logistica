<?php

require_once base_url('model/classes.php');


class CompetenciaNorteadora {

    public function __construct(){
        $this->competenciaNorteadora = new CompetenciaNorteadora_Model();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    public function index(){
        echo $this->template->template('templates/template.tpl')->view('view/competenciaNorteadora/index.php')->render();
    }
    
    public function listar(){
        $data = array('titulo' => 'Painel usuario',
                      'listar' => $this->competenciaNorteadora->listarTodos());
        echo $this->template->template('templates/template.tpl')->view('view/competenciaNorteadora/listar.php')->data( $data )->render();
    }
    
    public function editar(){
        $id = $this->uri->segment(4);
        $data = array('resultado' => $this->competenciaNorteadora->procurar($id));
        echo $this->template->template('templates/template.tpl')->view('view/competenciaNorteadora/editar.php')->data( $data )->render();
    }
    
    public function deletar(){
        $id = $this->uri->segment(4);
        if ( $this->competenciaNorteadora->deletar($id) ){ 
            setcookie('msg',"Deletado!"); 
        }
        redirect('competenciaNorteadora/listar');
    }
    
    public function adicionar(){
        // resgata variáveis do formulário
        $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
        $id_sml = isset($_POST['id_sml']) ? $_POST['id_sml'] : ''; #Resgata variáveis do formulário
        
        if (empty($nome)){ #Verifica se os campos estão preenchidos
            setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    #$nome  = htmlspecialchars(strip_tags($_POST['nome'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    
                    $this->competenciaNorteadora->__set('nome_cnr', $nome);
                    $this->competenciaNorteadora->__set('id_sml', $id_sml);

                    if ($this->competenciaNorteadora->adicionar()){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                        setcookie('msg','Dados cadastrado com sucesso!'); #Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); #Deu ruim
                    }

            }
        redirect('competenciaNorteadora');
    }
    
    public function atualizar(){
        $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
        $id_sml = isset($_POST['id_sml']) ? $_POST['id_sml'] : ''; #Resgata variáveis do formulário
        $id = $this->uri->segment(4);
        
        if (empty($descricao)){ #Verifica se os campos estão preenchidos
            setcookie('msg',"Dados em branco!"); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    $descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                   
                    $this->competenciaNorteadora->__set('nome_cnr', $nome);
                    $this->competenciaNorteadora->__set('id_sml', $id_sml);
                    
                    if ($this->competenciaNorteadora->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                        setcookie('msg','Dados atualizados!'); # Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); # Deu ruim
                    }

            }
        redirect('competenciaNorteadora/editar/ ' . $id);
    }
}

?>
