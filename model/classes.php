<?php



class Geral_Model {
    
    public function __construct(){
        $this->innerjoin = '';
        $this->table = '';
    }
    public function table($table){
        $this->table = $table;
        return $this;
    }
    public function innerjoin($table_join, $condicoes){
        $this->innerjoin =  "INNER JOIN {$table_join} ON ( {$condicoes} )";
	   return $this;
    }
    
    public function listarTodos() {
		$sql = "SELECT * FROM $this->table";
		$stmt = DB::prepare ( $sql );
		$stmt->execute ();
		return $stmt->fetchAll();
	}
    
    public function procurarEm($coluna, $dado){
        $sql = "SELECT * FROM $this->table $this->innerjoin WHERE $coluna = :dado";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':dado', $dado );
		$stmt->execute();
        return $stmt->fetchAll();
    }
}


// Classe Usuario
// Autor: Pablo (modificada pelo professor glauco)
// A classe Usuario é o modelo a ser seguido para construir as outras classes


class Usuario_model {
	protected $table = 'tb_usuario'; // nome da tabela do banco de dados
	protected $id = 'id_usu'; // atributo chave primária da tabela do banco de dados

	// atributos da classe de acordo com a tabela, não precisa usar os mesmos nomes da tabela.
	private $nome;
    private $sobrenome;
	private $email;
	private $username;
	private $senha;
	private $cpf;
	private $sexo;
	private $perfil;
	private $avatar;

	// métodos gets e sets
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}

	// métodos dos cruds
	public function adicionar() {
		$sql = "INSERT INTO $this->table (nome_usu,sobrenome_usu,email_usu,cpf_usu,sexo_usu, TB_PERFIL_id_per, senha_usu,username_usu )
                                VALUES    (:nome, :sobrenome, :email,:cpf,:sexo,:perfil,:senha,:username)";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':nome', $this->nome);
		$stmt->bindParam ( ':sobrenome', $this->sobrenome);
		$stmt->bindParam ( ':email', $this->email );
		$stmt->bindParam ( ':username', $this->username);
		$stmt->bindParam ( ':senha', $this->senha);
		$stmt->bindParam ( ':cpf', $this->cpf );
		$stmt->bindParam ( ':sexo', $this->sexo);
		$stmt->bindParam ( ':perfil', $this->perfil);
		#$stmt->bindParam ( ':avatar', $this->avatar );
		return $stmt->execute();
	}
	public function atualizar($id) {
		$sql = "UPDATE $this->table SET  nome_usu = :nome,
			                             sobrenome_usu = :sobrenome,
                                         email_usu = :email,
                                         username_usu = :username,
                                         senha_usu = :senha,
                                         cpf_usu = :cpf,
                                         sexo_usu = :sexo,
                                         TB_PERFIL_id_per = :perfil
                                         WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':nome', $this->nome);
		$stmt->bindParam ( ':sobrenome', $this->sobrenome);
		$stmt->bindParam ( ':email', $this->email );
		$stmt->bindParam ( ':username', $this->username);
		$stmt->bindParam ( ':senha', $this->senha);
		$stmt->bindParam ( ':cpf', $this->cpf );
		$stmt->bindParam ( ':sexo', $this->sexo);
		$stmt->bindParam ( ':perfil', $this->perfil);
		$stmt->bindParam ( ':id', $id);
        #$stmt->bindParam ( ':avatar', $avatar );
		return $stmt->execute ();
	}

    /*

    Metodo procurar($id) é utilizado para usar o ID, neste caso, procurar na coluna $this->id

    */
    
    public function procurar($id) {
		$sql = "SELECT * FROM $this->table INNER JOIN tb_perfil ON ( $this->table.TB_PERFIL_id_per = tb_perfil.id_per) WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
        return $stmt->fetch();
	}

    /*

    Metodo procurarEm( $coluna, $dado ) e utilizado para escolher a coluna ao qual deseja procurar o dado.

    */

    public function procurarEm($coluna, $dado){
        $sql = "SELECT * FROM $this->table
                INNER JOIN tb_perfil ON ( $this->table.TB_PERFIL_id_per = tb_perfil.id_per)
                WHERE $coluna = :dado";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':dado', $dado );
		$stmt->execute();
        return $stmt->fetch();

    }

	public function listarTodos() {
		$sql = "SELECT * FROM $this->table INNER JOIN tb_perfil ON ( $this->table .TB_PERFIL_id_per = tb_perfil.id_per)";
		$stmt = DB::prepare ( $sql );
		$stmt->execute ();
		return $stmt->fetchAll ();
	}
	public function deletar($id) {
		$sql = "DELETE FROM $this->table WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute ();
	}

    public function procurarPorUsername() {
        $username = $this->__get('username');
		$sql = "SELECT * FROM $this->table WHERE username_usu = :username";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':username', $username);
		$stmt->execute();
		return $stmt->fetch();
	}
}


/*

#Classe Simulador
@Author: João

*/

class Simulador_model {
	protected $table = 'tb_simulador'; // nome da tabela do banco de dados
	protected $id = 'id_sml'; // atributo chave primária da tabela do banco de dados
	// atributos da classe de acordo com a tabela, não precisa usar os mesmos nomes da tabela.
	private $nome;
    private $descricao;
	
	// métodos gets e sets
		
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}
	
	// métodos dos cruds
	public function adicionar() {
		$sql = "INSERT INTO $this->table ( nome_sml , descricao_sml)
                                VALUES    ( :nome , :descricao)";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':nome', $this->__get('nome'));
		$stmt->bindParam ( ':descricao', $this->__get('descricao'));
		
		return $stmt->execute();
	}
	public function atualizar($id) {
		$sql = "UPDATE $this->table SET  nome_sml = :nome,
			                             descricao_sml = :descricao,
                                        WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':nome', $this->__get('nome'));
		$stmt->bindParam ( ':descricao', $this->__get('descricao'));
		
		return $stmt->execute ();
	}
    /*
    Metodo procurar($id) é utilizado para usar o ID, neste caso, procurar na coluna $this->id
    */
    
    
	public function procurar($id) {
		$sql = "SELECT * FROM $this->table WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
        return $stmt->fetch();
	}
    /*
    Metodo procurarEm( $coluna, $dado ) e utilizado para escolher a coluna ao qual deseja procurar o dado.
    */
   
	public function listarTodos() {
		$sql = "SELECT * FROM $this->table";
		$stmt = DB::prepare ( $sql );
		$stmt->execute ();
		return $stmt->fetchAll ();
	}
	public function deletar($id) {
		$sql = "DELETE FROM $this->table WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute ();
	}
   
}


// Autor:
class Atividade_model
{
    
	protected $table = 'tb_ativ_simu'; // nome da tabela do banco de dados
	protected $id = 'id_asm'; // atributo chave primária da tabela do banco de dados
    
    private $id_asm;
    private $nome_asm;
    private $tempo_asm;
    private $pontuacao_asm;
	private $imagem_asm;
    

    // métodos gets e sets
		
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}
	
	public function adicionar() {
		$sql = "INSERT INTO $this->table ( nome_asm, tempo_asm, pontuacao_asm, imagem_asm) VALUES ( ?, ?, ?, ?)";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( 1, $this->__get('nome_asm'));
		$stmt->bindParam ( 2, $this->__get('tempo_asm'));
		$stmt->bindParam ( 3, $this->__get('pontuacao_asm'));
		$stmt->bindParam ( 4, $this->__get('imagem_asm'));
		return $stmt->execute();
	}
    
	public function atualizar( $id ) {
		$sql = "UPDATE $this->table SET  nome_sml = :nome,
			                             descricao_sml = :descricao,
                                        WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':nome', $this->__get('nome'));
		$stmt->bindParam ( ':descricao', $this->__get('descricao'));
		
		return $stmt->execute ();
	}
    /*
    Metodo procurar($id) é utilizado para usar o ID, neste caso, procurar na coluna $this->id
    */
    
    
	public function procurar($id) {
		$sql = "SELECT * FROM $this->table WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
        return $stmt->fetch();
	}
    /*
    Metodo procurarEm( $coluna, $dado ) e utilizado para escolher a coluna ao qual deseja procurar o dado.
    */
   
	public function listarTodos() {
		$sql = "SELECT * FROM $this->table";
		$stmt = DB::prepare ( $sql );
		$stmt->execute ();
		return $stmt->fetchAll ();
	}
	public function deletar($id) {
		$sql = "DELETE FROM $this->table WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute ();
	}
   
}




// classe Componente curricular
// Autor:
class ComponenteCurricular_model {
	protected $table = 'tb_comp_curc'; // nome da tabela do banco de dados
	protected $id = 'id_ccr'; 
    
	private $nome;
	private $cargaHoraria;

	/*public function __construct() {
		$this->id_ccr = 0;
		$this->nome_ccr = "";
		$this->cargaHoraria_ccr = 0;
	}

	public function __construct($id_ccr, $nome_ccr, $cargaHoraria_ccr) {
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
		$this->cargaHoraria_ccr = $cargaHoraria_ccr;
	}

	public function __construct($id_ccr) {
		$this->id_ccr = $id_ccr;
	}*/

	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}

	public function __get($atrib) {
		return $this->$atrib;
	}
    
    public function adicionar() {
                $sql = "INSERT INTO $this->table (nome_ccr, cargaHoraria_ccr) VALUES (:nome, :cargaHoraria)";
                $stmt = DB::prepare ($sql);
                $stmt->bindParam (':nome', $this->__get('nome'));
                $stmt->bindParam (':cargaHoraria', $this->__get('cargaHoraria'));
                return $stmt->execute();
        }

    public function atualizar($id){
                $sql  = "UPDATE $this->table SET nome_ccr = :nome 
                                                 cargaHoraria_ccr = :cargaHoraria 
                                                 WHERE $this->id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam (':nome', $this->__get('nome'));
                $stmt->bindParam (':cargaHoraria', $this->__get('cargaHoraria'));
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
		}

    public function procurar($id){
                $sql  = "SELECT * FROM $this->table WHERE $this->id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch();
		}

    public function listarTodos(){
                $sql  = "SELECT * FROM $this->table";
                $stmt = DB::prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
		}

    public function deletar($id){
                $sql  = "DELETE FROM $this->table WHERE $this->id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
		}
    
}



/*

Classe Competências Norteadoras
@Author: Pablo Papalardo

*/ 

class CompetenciaNorteadora_Model {
	protected $table = 'tb_comp_nort'; // nome da tabela do banco de dados
	protected $id = 'id_cnr'; 
    
	private $nome;
	private $cargaHoraria;

	/*
    
    public function __construct() {
		$this->id_ccr = 0;
		$this->nome_ccr = "";
		$this->cargaHoraria_ccr = 0;
	}

	public function __construct($id_ccr, $nome_ccr, $cargaHoraria_ccr) {
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
		$this->cargaHoraria_ccr = $cargaHoraria_ccr;
	}

	public function __construct($id_ccr) {
		$this->id_ccr = $id_ccr;
	}
    
    */

	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}

	public function __get($atrib) {
		return $this->$atrib;
	}
    
    public function adicionar() {
                $sql = "INSERT INTO $this->table (nome_cnr, TB_SIMULADOR_id_sml) VALUES ( ?, ? )";
                $stmt = DB::prepare ($sql);
                $stmt->bindParam (1, $this->__get('nome_cnr'));
                $stmt->bindParam (2, $this->__get('id_sml'));
                return $stmt->execute();
        }

    public function atualizar($id){
                $sql  = "UPDATE $this->table SET nome_ccr = :nome 
                                                 cargaHoraria_ccr = :cargaHoraria 
                                                 WHERE $this->id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam (':nome', $this->__get('nome'));
                $stmt->bindParam (':cargaHoraria', $this->__get('cargaHoraria'));
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
		}

    public function procurar($id){
                $sql  = "SELECT * FROM $this->table WHERE $this->id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch();
		}

    public function listarTodos(){
                $sql  = "SELECT * FROM $this->table  INNER JOIN tb_simulador ON ( $this->table .TB_SIMULADOR_id_sml = tb_simulador.id_sml)";
                $stmt = DB::prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
		}

    public function deletar($id){
                $sql  = "DELETE FROM $this->table WHERE $this->id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
		}
    
}



class Curso_model {
	private $id_cur;
	private $nome_cur;
    
    protected $table = "tb_curso";
    protected $id = "id_cur";
    
	/*public function __construct() {
		$this->id_cur = 0;
		$this->nome_cur = "";
	} */
	/*public function __construct($id_cur, $nome_cur) {
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
	} */
	/*public function __construct($id_cur) {
		$this->id_cur = $id_cur;
	}*/
    
    
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}
    
    public function adicionar() {
                $sql = "INSERT INTO tb_curso (nome_cur) VALUES (:nome)";
                $stmt = DB::prepare ($sql);
                $stmt->bindParam (':nome', $this->__get('nome'));
                return $stmt->execute();
        }

    public function atualizar($id){
                $sql  = "UPDATE $this->table SET nome_cur = :nome 
                                             WHERE $this->id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam (':nome', $this->__get('nome'));
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
		}

    public function procurar($id){
                $sql  = "SELECT * FROM $this->table WHERE $this->id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch();
		}

    public function listarTodos(){
                $sql  = "SELECT * FROM $this->table";
                $stmt = DB::prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
		}

    public function deletar($id){
                $sql  = "DELETE FROM $this->table WHERE $this->id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
		}

}



// Classe Item
// Autor:

class Item_model
{
	
	private $pdo;

		
    private $id_ias;
    private $nome_ias;
    private $seguencia_ias;
    
    
    protected $table = "tb_iten_atv_sml"; 
    
    
	public function __set($atrib, $value) {
        $this->$atrib = $value;
    }
    
    public function __get($atrib) {
        return $this->$atrib ;
    }

	public function listarTodos()
	{
		try
		{
			$sql = "SELECT * FROM " . $this->table;
            $stm = DB::prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_ias)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM tbl_item WHERE id_ias = ?");
			$stm->execute(array($id_ias));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_ias)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM tbl_item WHERE id_ias = ?");

			$stm->execute(array($id_ias));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Atualizar($data)
	{
		try
		{
			$sql = "UPDATE tbl_item SET
						nome_ias          = ?,
						seguencia_ias        = ?
				    WHERE id_ias = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nome_ias,
                        $data->seguencia_ias,
                        $data->id_ias
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(item $data)
	{
		try
		{
			$sql = "INSERT INTO tbl_item (id_ias,nome_ias,seguencia_ias)
		        VALUES (?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_ias,
                    $data->nome_ias,
                    $data->seguencia_ias
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}


// Classe Perfil
class Perfil_model {

		private $table = 'tb_perfil';
		private $id = 'id_per';
		private $descricao;

		public function __set($atrib, $value){
			$this->atrib = $value;
		}

		public function __get($atrib){
			return $this->atrib;
		}

		/*public function __construct(){
			$this->descricao = "";
		}*/

		/*public function  __construct($descricao){
			$this->descricao = $descricao;
		}*/

		public function adicionar() {
	           $sql = "INSERT INTO $this->table (desc_per) VALUES ( ? )";
	          $stmt = DB::prepare ($sql);
	          $stmt->bindParam (1, $this->__get('descricao'));
	           return $stmt->execute();
        }

		public function atualizar($id){
			$sql  = "UPDATE $this->table SET desc_per = :descricao WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':descricao', $this->__get($descricao));
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
		}

		public function procurar($id){
			$sql  = "SELECT * FROM $this->table WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function listarTodos(){
			$sql  = "SELECT * FROM $this->table";
			$stmt = DB::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function deletar($id){
			$sql  = "DELETE FROM $this->table WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
		}
	}


class CicloSimulador_model {

		protected $table = 'tb_cicl_simu';
		protected $id = 'id_csm';
    
        private $descricao_csm;
        private $imagem_csm;
        private $id_ccr;
        private $id_sml;
    
		public function __construct(){
			$this->descricao_csm = '';
			$this->imagem_csm = '';
			$this->id_ccr = 0;
			$this->id_sml = 0;
		}
    
		public function __set($atrib, $value){
			$this->atrib = $value;
		}

		public function __get($atrib){
			return $this->atrib;
		}

		public function adicionar() {
            $sql = "INSERT INTO $this->table ( descricao_csm, imagem_csm, TB_COMP_CURC_id_ccr, TB_SIMULADOR_id_sml) VALUES ( ?,?,?,? )";
            $stmt = DB::prepare ($sql);
            $stmt->bindParam( 1 , $this->__get('descricao_csm'));
            $stmt->bindParam( 2 , $this->__get('imagem_csm'));
            $stmt->bindParam( 3 , $this->__get('id_ccr'));
            $stmt->bindParam( 4 , $this->__get('id_sml'));
            return $stmt->execute();
        }

		public function atualizar($id){
			$sql  = "UPDATE $this->table SET desc_per = :descricao WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':descricao', $this->__get($descricao));
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
		}

		public function procurar($id){
			$sql  = "SELECT * FROM $this->table WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function listarTodos(){
			$sql  = "SELECT * FROM $this->table";
			$stmt = DB::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function deletar($id){
			$sql  = "DELETE FROM $this->table WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
		}
	}




// Classe Realizar Ciclo
// Autor
class RealizarCiclo {
		private $idRcc;
		private $pontuacaoAlcancadaRcc;

		public function getIdRcc(){
			return $this->idRcc;
		}

		public function getPontuacaoAlcancadaRcc(){
			return $this->pontuacaoAlcancadaRcc;
		}


		public function setIdRcc(){
			return $this->idRcc;
		}

		public function setPontuacaoAlcancadaRcc(){
			return $this->pontuacaoAlcancadaRcc;
		}
}





/*

Classes abaixo para o funcionamento do sistema.

*/

class Template {
    protected $template, $view, $data;
    
    public function __construct() {
        $this->view = '';
        $this->template = '';
        $this->data = '';
    }
    
    /*
    
    public function __construct($template, $view = '', $data = array()) {
        $this->view = $view;
        $this->template = $template;
        $this->data = $data;
    }
    
    */
    
    public function template($template){
        $this->template = $template;
        return $this;
    }
    
    public function view($view){
        $this->view = $view;
        return $this;
    }
    
    public function data($data = array()){
        $this->data = $data;
        return $this;
    }
    
    public function render() {
        if(file_exists($this->template)){
            //Extracts vars to current view scope
            
            $this->data['conteudo'] = $this->view;
            extract($this->data);

            //Starts output buffering
            ob_start();

            //Includes contents
            include $this->template;
            $buffer = ob_get_contents();
            @ob_end_clean();

            //Returns output buffer
            return $buffer;
            
        } else {
            //Throws exception
            echo 'OPS! Template não encontrado';
        }
    }
    
}

class Uri {
    public function segment($nr){
        $partes_url = explode('/', $_SERVER['REQUEST_URI'] );
        if (isset($partes_url[$nr])){
            return $partes_url[$nr];
        } else {
            return FALSE;
        }
        }
    }

class Model {
    public function set_model($nome_classe){
    $classe = new $nome_classe;
    return $classe;
    }
}


?>
