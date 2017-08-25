<?php


class Aluno {
    
    public function __construct(){
        $this->classe = new Geral_Model();
        $this->realizarCiclo = new RealizarCiclo();
        $this->uri = new Uri();
        $this->template = new Template();
    }
    
    public function index(){
        $data = array( 'listar' => $this->classe->table('tb_comp_curc')->listarTodos());
        echo $this->template->template('view/aluno/escolher_componente.php')->data( $data )->render();
    }
    
    
    public function exComp(){
        echo $this->template->template('view/aluno/componente_arrastar.php')->render();
    }
    
    public function passo1(){
        $id = $this->uri->segment(4);
        $data = array( 'listar' => $this->classe->table('tb_cicl_simu')
                      ->innerjoin('tb_simulador', 'tb_cicl_simu.TB_SIMULADOR_id_sml = tb_simulador.id_sml')
                      ->procurarEm('TB_COMP_CURC_id_ccr', $id));
        #echo $this->template->template('view/aluno/armazenamento_controle.php')->data( $data )->render();
        echo $this->template->template('templates/template_aluno.tpl')->view('view/aluno/armazenamento_controle.php')->data( $data )->render();
    }
    
    public function passo2(){
        $id = $this->uri->segment(4);
        $data = array( 'listar' => $this->classe->table('tb_ativ_simu')->procurarEm('TB_CICL_SIMU_id_csm', $id));        
        #echo $this->template->template('view/aluno/escolher_atividade.php')->data( $data )->render();
        echo $this->template->template('templates/template_aluno.tpl')->view('view/aluno/escolher_atividade.php')->data( $data )->render();
    
    }
    
    public function passo3(){
        $id = $this->uri->segment(4);
        $data = array( 'listar' => $this->classe->table('tb_iten_atv_sml')->procurarEm('TB_ATIV_SIMU_id_asm', $id),
                      'simulador' => $this->classe->table('tb_ativ_simu')
                                        ->innerjoin('tb_cicl_simu', 'tb_ativ_simu.TB_CICL_SIMU_id_csm = tb_cicl_simu.id_csm')
                                        ->procurarRow('id_asm', $id));
        echo $this->template->template('view/aluno/componente_arrastar.php')->data( $data )->render();
       #echo $this->template->template('templates/template_aluno.tpl')->view('view/aluno/componente_arrastar.php')->data( $data )->render();
    
    }
    
    public function realizar_ciclo(){
        
        $this->realizarCiclo->__set('id_usu', $_SESSION['user_id']);
        $this->realizarCiclo->__set('id_csm', $_POST['id_csm']);
        $this->realizarCiclo->__set('pontuacao', $_POST['pontuacao']);
        $this->realizarCiclo->adicionar();
        redirect('aluno');
        
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
