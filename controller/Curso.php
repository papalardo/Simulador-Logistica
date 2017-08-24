<?php

class Curso {
    
    
    public function __construct(){
        $this->curso = new Curso_model();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    public function index(){
        echo $this->template->template('templates/template.tpl')->view('view/curso/index.php')->render();
    }
    
    public function listar(){
        $data = array('titulo' => 'Painel usuario',
                      'listar' => $this->curso->listarTodos());
        echo $this->template->template('templates/template.tpl')->view('view/curso/listar.php')->data( $data )->render();
    }
    
    public function editar(){
        $id = $this->uri->segment(4);
        $data = array( 'resultado' => $this->curso->procurar($id) );
        echo $this->template->template('templates/template.tpl')->view('view/curso/editar.php')->data( $data )->render();
    }
    
    public function deletar(){
        $id = $this0>uri->segment(4);
        if ( $this->curso->deletar($id) ){ 
            setcookie('msg',"Deletado!"); 
        }
        redirect('Curso/listar');
    }
    
    public function novo(){
        $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
        if (empty($nome)){ #Verifica se os campos estão preenchidos
            setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    $nome  = htmlspecialchars(strip_tags($_POST['nome'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    $this->curso->__set('nome', $nome);

                    if ($this->curso->adicionar()){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                        setcookie('msg','Novo curso cadastrado!'); #Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); #Deu ruim
                    }

            }
        redirect('curso');
    }
    
    public function atualizar(){
        
        $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
        $id = $this->uri->segment(4);
        
        if (empty($nome)){ #Verifica se os campos estão preenchidos
            setcookie('msg',"Dados em branco!"); #Se não tiver, armazena mensagem para mostrar.
            } else {
                    #$descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                    $this->curso->__set('nome', $nome); #Pega o que foi digitado e muda seu valor no objeto
                    
                    if ($this->curso->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                        setcookie('msg','Dados atualizados!'); # Deu bom
                    } else {
                        setcookie('msg','Ocorreu algum erro..'); # Deu ruim
                    }

            }
        redirect('Curso/editar/' . $id);
    }
}

?>
