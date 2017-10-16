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
        $data = array('resultado' => $this->cicloSimulador->procurar($id));
        echo $this->template->template('templates/template.tpl')->view('view/cicloSimulador/editar.php')->data( $data )->render();
    }
    
    
    public function novo(){
        
        $descricao_csm = isset($_POST['descricao_csm']) ? $_POST['descricao_csm'] : ''; #Resgata variáveis do formulário
        $imagem_csm = isset($_FILE['imagem_csm']) ? $_FILE['imagem_csm'] : ''; #Resgata variáveis do formulário
        $id_ccr = isset($_POST['id_ccr']) ? $_POST['id_ccr'] : ''; #Resgata variáveis do formulário
        $id_sml = isset($_POST['id_sml']) ? $_POST['id_sml'] : ''; #Resgata variáveis do formulário
        
		
			$imagem_csm = $_FILES['imagem_csm']['name'];
			
			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = 'foto2/';
			
			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*100*9999; //5mb
			
			//Array com a extensões permitidas
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif',);
			
			//Renomeiar
			$_UP['renomeia'] = false;
			
			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['imagem_csm']['error'] != 0){
				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['imagem_csm']['error']]);
				exit; //Para a execução do script
			}
			
			//Faz a verificação da extensao do arquivo
			$extensao = strtolower(end(explode('.', $_FILES['imagem_csm']['name'])));
			if(array_search($extensao, $_UP['extensoes'])=== false){		
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/upload_imagem.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
			}
			
			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['imagem_csm']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/upload_imagem.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
			}
			
			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				if($UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = time().'.jpg';
				}else{
					//mantem o nome original do arquivo
					$nome_final = time().'.jpg'; #$_FILES['imagem_csm']['name'];
				}
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['imagem_csm']['tmp_name'], $_UP['pasta'] . $nome_final)){
					//Upload efetuado com sucesso, exibe a mensagem
					
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/upload_imagem.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem cadastrada com Sucesso.\");
						</script>
					";	
				}else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/upload_imagem.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada com Sucesso.\");
						</script>
					";
				}
			}
		
        
        $this->cicloSimulador->__set('descricao_csm', $descricao_csm);
        $this->cicloSimulador->__set('imagem_csm', $_UP['pasta'] . $nome_final);
        $this->cicloSimulador->__set('id_ccr', $id_ccr);
        $this->cicloSimulador->__set('id_sml', $id_sml);
        
        $this->cicloSimulador->adicionar();

        redirect('cicloSimulador');
    }

    public function atualizar(){
        $id = $this->uri->segment(4);
       	$this->cicloSimulador->__set('descricao_csm', $descricao_csm);
        $this->cicloSimulador->__set('imagem_csm', $imagem_csm);
        $this->cicloSimulador->__set('id_ccr', $id_ccr);
        $this->cicloSimulador->__set('id_sml', $id_sml);
        

        $this->cicloSimulador->atualizar($id);

        redirect('cicloSimulador/editar/' . $id);
    }
    
     public function deletar(){
        $id = $this->uri->segment(4);
        if ($this->cicloSimulador->deletar($id)){ 
               setcookie('msg','Dados Deletado!'); #Deu bom
        }
        redirect('cicloSimulador/listar');
    }
    

    //public function Eliminar(){
        //$this->model->Eliminar($_REQUEST['id_asm']);
       // header('Location: index.php');
   // }
}
