<?php

class usuario {
    
   public function __construct(){
        $this->usuario = new Usuario_model();
        $this->perfil = new Perfil_model();
        $this->uri = new Uri();
        $this->template = new Template();
       
    }

    public function index(){
        $data = array('titulo' => 'Painel usuario',
                      'perfis' => $this->perfil->listarTodos());
        echo $this->template->template('templates/template.tpl')->view('view/usuario/index.php')->data( $data )->render();
     }

    public function listar(){
        $data = array('titulo' => 'Painel usuario',
                          'listar' => $this->usuario->listarTodos());
        echo $this->template->template('templates/template.tpl')->view('view/usuario/listar.php')->data( $data )->render();
     }

        public function deletar(){
            $id = $this->uri->segment(4);
            if ($this->usuario->deletar($id)){
                setcookie('msg',"Deletado!");
            }
            redirect('usuario/listar');
        }

        public function editar(){
            $id = $this->uri->segment(4);
            $data = array('resultado' => $this->usuario->procurar($id),
                         'perfis' => $this->usuario->listarTodos());
            echo $this->template->template('templates/template.tpl')->view('view/usuario/editar.php')->data( $data )->render();
        }


        public function novo(){
        // resgata variáveis do formulário
        $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
        $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
        $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : '';
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

        #$tipo_alerta = 'danger'; #Coloca como DEFAULT o alerta como ERRO.

        if (empty($username)){ #Verifica se os campos estão preenchidos
            setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
            redirect('usuario/index');
            } else {

                    if ( ($this->usuario->procurarEm('email_usu', $email)) || ($this->usarModel('usuario_model')->procurarEm('username_usu', $username)) ){
                    setcookie('msg','Email ou Username ja utilizado!'); #Se não tiver, armazena mensagem para mostrar.
                        } else {
                        #$descricao  = htmlspecialchars(strip_tags($_POST['descricao'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                        $usuario->__set('nome', $nome);
                        $usuario->__set('sobrenome', $sobrenome);
                        $usuario->__set('email', $email);
                        $usuario->__set('username', $username);
                        $usuario->__set('senha', $senha);
                        $usuario->__set('cpf', $cpf);
                        $usuario->__set('perfil', $perfil);
                        $usuario->__set('sexo', $sexo);
                        #$perfil->__set('avatar', $descricao);
                        if ($this->usarModel('usuario_model')->adicionar()){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                            setcookie('msg','Usuario cadastrado!'); #Se não tiver, armazena mensagem para mostrar.
                            redirect('usuario/index');
                        } else {
                            setcookie('msg','Ocorreu algum erro'); #Se não tiver, armazena mensagem para mostrar.
                            redirect('usuario/index');
                        }
                    }
        }
    } 



    function atualizar(){
        $usuario = new Usuario_model(); #Cria novo objeto
        $id = $this->usarModel('uri')->segment(4);

        $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
        $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
        $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : '';
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

    if (empty($username)){ #Verifica se os campos estão preenchidos
        setcookie('msg','Dados em branco!'); #Se não tiver, armazena mensagem para mostrar.
        redirect('usuario/editar/'.$id);
        } else {
                $nome = htmlspecialchars(strip_tags($_POST['nome']));
                $usuario->__set('nome', $nome);
                $usuario->__set('sobrenome', $sobrenome);
                $usuario->__set('email', $email);
                $usuario->__set('username', $username);
                $usuario->__set('senha', $senha);
                $usuario->__set('cpf', $cpf);
                $usuario->__set('perfil', $perfil);
                $usuario->__set('sexo', $sexo);
                #$perfil->__set('avatar', $descricao);

                #$descricao  = htmlspecialchars(strip_tags($_POST['descricao']));

                if ($usuario->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                    setcookie('msg','Dados atualizados!'); #Se não tiver, armazena mensagem para mostrar.
                            redirect('usuario/editar/'.$id);
                    } else {
                            setcookie('msg','Ocorreu algum erro'); #Se não tiver, armazena mensagem para mostrar.
                            redirect('usuario/editar/'.$id);
                }

        }
        #return $msg;
       #redirect('index.php?pag=perfil&acao=editar&id='.$id);  #Tudo feito, redireciona de volta à página, evitando looping de requisições.
       # redirect('index.php?pag=usuario&acao=listar');  #Tudo feito, redireciona de volta à página, evitando looping de requisições.
    }

    
    
    
}



?>
