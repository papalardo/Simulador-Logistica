<?php


class Aluno {
    
    public function __construct(){
        $this->classe = new Geral_Model();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    public function index(){
        $data = array( 'listar' => $this->classe->table('tb_comp_curc')->listarTodos());
        echo $this->template->template('view/aluno/escolher_componente.php')->data( $data )->render();
    }
    
    
    /*public function index(){
        $tmpl = new Template('view/aluno/escolher_componente.php',' ', array('titulo' => 'Painel usuario'));
        echo $tmpl->render();
    } */
    
    public function exComp(){
        echo $this->template->template('view/aluno/componente_arrastar.php')->render();
    }
    
    public function passo1(){
        $id = $this->uri->segment(4);
        $data = array( 'listar' => $this->classe->table('tb_cicl_simu')
                      ->innerjoin('tb_simulador', 'tb_cicl_simu.TB_SIMULADOR_id_sml = tb_simulador.id_sml')
                      ->procurarEm('TB_COMP_CURC_id_ccr', $id));
        echo $this->template->template('view/aluno/armazenamento_controle.php')->data( $data )->render();
    }
    
    public function passo2(){
        $id = $this->uri->segment(4);
        $data = array( 'listar' => $this->classe->table('tb_ativ_simu')->procurarEm('TB_CICL_SIMU_id_csm', $id));        
        echo $this->template->template('view/aluno/escolher_atividade.php')->data( $data )->render();
    }
    
    public function passo3(){
        $id = $this->uri->segment(4);
        $data = array( 'listar' => $this->classe->table('tb_iten_atv_sml')->procurarEm('TB_ATIV_SIMU_id_asm', $id));
        echo $this->template->template('view/aluno/componente_arrastar.php')->data( $data )->render();
     
        /*
        $id = $this->uri->segment(4);
        $.getJson("http://localhost/Simulador_Logistica/aluno/json_itens/2" , function( data ){
           var items = [];
            $.each(data, function( key ,val ) {
                item.push("<li id='" + key + "'>" + val + "</li>");
            });
            
        });
        */ 
    }
    
    public function json_itens(){
        $id = $this->uri->segment(4);
        $itens = $this->classe->table('tb_iten_atv_sml')->procurarEm('TB_ATIV_SIMU_id_asm', $id);
        $json_itens = array();
        $i = 0;
        foreach ($itens as $r ){
            $json_itens[$i]['nome'] = $r->nome_ias;
            $json_itens[$i]['posicao'] = $r->sequencia_ias;
            $i++;
        }
        
        echo json_encode($json_itens);
    }
}

?>
