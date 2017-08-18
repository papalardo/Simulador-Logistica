<?php

class Login {
    
    public function __construct(){
        $this->login = new Usuario_model();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    
    public function  index(){
        echo $this->template->template('view/login/login_aluno.php')->render();
    }
    
    public function  admin(){
        echo $this->template->template('view/login/login_admin.php')->render();
    }
    
    public function panel(){    
        echo $this->template->template('templates/template.tpl')->view('view/login/panel.php')->render();
    }
    public function logout(){
        session_destroy(); #Destroi a sessão
        setcookie('msg',"Deslogado!"); #Guarda mensagem
        redirect('login'); #Redireciona para página de login
    }
    
    public function entrarAdmin(){
        /* resgata variáveis do formulário */
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($username) || empty($password)){ #Verifica se os dados estão todo preenchidos
        setcookie('msg','Campos em branco.');
        redirect('login/admin');
        } else {
                /* Cria o HASH MD5 da senha */
                #$passwordHash = md5($password);

                /* O html special e strip_tags serve para evitar a tentativa de sql_eject no BD */
                $username  = htmlspecialchars(strip_tags($_POST['username']));
                $password = htmlspecialchars(strip_tags($_POST['password']));

                $this->login->__set('username', $username);
                $this->login->__set('password', $password); # __set da senha SEM HASH
                #$login->__set('password', $passwordHash); # __set da senha COM HASH

                $user = $this->login->procurarEm('username_usu', $this->login->__get('username')); #Verifica se o Username existe
                if ($user) {
                    if ($user->senha_usu == $this->login->__get('password')){ #Se usuario existe, compara a senha
                            /* Se a senha for igual, seta as sessions. */
                            $_SESSION['logged_in'] = TRUE;
                            $_SESSION['user_id'] = $user->id_usu;
                            $_SESSION['nome_usu'] = $user->nome_usu;
                            $_SESSION['email_usu'] = $user->email_usu;
                            $_SESSION['sexo_usu'] = $user->sexo_usu;
                            $_SESSION['perfil'] = $user->TB_PERFIL_id_per;
                            $_SESSION['cpf_usu'] = $user->cpf_usu;
                            $_SESSION['sobrenome_usu'] = $user->sobrenome_usu;
                            redirect('login/panel');
                            } else {
                                // Se a senha for diferente..
                                setcookie('msg', 'Senha invalida..' );
                                redirect('login/admin');
                                }
                        } else {
                    //Se nao achou o usuario..
                    setcookie('msg', 'Usuario nao cadastrado' );
                    redirect('login/admin');
                }

    }
    }
    
    
    public function entrarAluno(){
        /* resgata variáveis do formulário */
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($username) || empty($password)){ #Verifica se os dados estão todo preenchidos
        setcookie('msg','Campos em branco.');
        redirect('login');
        } else {
                /* Cria o HASH MD5 da senha */
                #$passwordHash = md5($password);

                /* O html special e strip_tags serve para evitar a tentativa de sql_eject no BD */
                $username  = htmlspecialchars(strip_tags($_POST['username']));
                $password = htmlspecialchars(strip_tags($_POST['password']));

                $this->login->__set('username', $username);
                $this->login->__set('password', $password); # __set da senha SEM HASH
                #$login->__set('password', $passwordHash); # __set da senha COM HASH

                $user = $this->login->procurarEm('username_usu', $this->login->__get('username')); #Verifica se o Username existe
                if ($user) {
                    if ($user->senha_usu == $this->login->__get('password')){ #Se usuario existe, compara a senha
                        /* Se a senha for igual, seta as sessions. */
                        $_SESSION['logged_in'] = TRUE;
                        $_SESSION['user_id'] = $user->id_usu;
                        $_SESSION['nome_usu'] = $user->nome_usu;
                        $_SESSION['sobrenome_usu'] = $user->sobrenome_usu;
                        $_SESSION['email_usu'] = $user->email_usu;
                        $_SESSION['perfil'] = $user->TB_PERFIL_id_per;
                        $_SESSION['cpf_usu'] = $user->cpf_usu;
                        redirect('aluno');
                        
                        } else {
                        // Se a senha for diferente..
                        setcookie('msg', 'Senha invalida..' );
                        redirect('login');
                    }
                } else {
                    //Se nao achou o usuario..
                        setcookie('msg', 'Usuario nao cadastrado' );
                        redirect('login');
                }

    }
    }
    
    
}

?>
