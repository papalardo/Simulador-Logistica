<?php


class Perfil {
    
    public function __construct(){
        $this->perfil = new Perfil_model();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    public function index(){
        echo $this->template->template('templates/template.tpl')->view('view/perfil/index.php')->render();
    }
    
    public function listar(){
        $data = array('titulo' => 'Painel usuario',
                      'listar' => $this->perfil->listarTodos());
        echo $this->template->template('templates/template.tpl')->view('view/perfil/listar.php')->data($data)->render();
    }
    
    public function editar(){
        $id = $this->uri->segment(4);
        $data = array('resultado' => $this->perfil->procurar($id));
        echo $this->template->template('templates/template.tpl')->view('view/perfil/editar.php')->data($data)->render();
    }
    
    public function deletar(){
        $id = $this->uri->segment(4);
        if ($this->perfil->deletar($id)){ 
               setcookie('msg','Perfil Deletado!'); #Deu bom
        }
        redirect('perfil/listar');
    }
    
    public function novo(){
        // resgata variáveis do formulário
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
        
        if ( empty( $descricao ) ){ #Verifica se os campos estão preenchidos
            setcookie( 'msg' , 'Dados em branco!' ); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    $descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    
                    $this->perfil->__set('descricao', $descricao);

                    if ( $this->perfil->adicionar() ){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                        setcookie('msg','Novo perfil cadastrado!'); #Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); #Deu ruim
                    }

            }
        redirect('perfil/listar');
    }
    
    public function atualizar(){
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; #Resgata variáveis do formulário
        
        $id = $this->uri->segment(4);
        
        if (empty($descricao)){ #Verifica se os campos estão preenchidos
            setcookie('msg',"Dados em branco!"); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    $descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    $this->perfil->__set('descricao', $descricao); #Pega o que foi digitado e muda seu valor no objeto
                    
                    if ( $this->perfil->atualizar($id) ){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                        setcookie('msg','Dados atualizados!'); # Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); # Deu ruim
                    }

            }
        redirect('perfil/editar/' . $id);
    }
}

?>
