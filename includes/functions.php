
<?php


/*

Função para ajudar no uso de links internos
@base_url('www.exemplo.com/')

*/

function base_url($url = ''){
$site = URL_BASE . $url;
 return $site;
}


/*

Função para redirecionamento
@redirect('?pag=login');

*/

function redirect($url){
    header('location:'. base_url($url));'">';
    #echo '<meta http-equiv="Location" content=" ' . $redirect . '">';
    #exit();
}

/*

Função para destruir um cookie
@DestroyCookie('nome_cookie');

*/

function DestroyCookie($name)
    {
        unset($_COOKIE[$name]);
        return setcookie($name, NULL, -1);
    }

/*


*/

function gerar_dropdown($table, $key, $name, $name_select){
    $lista = new Geral_Model();
    
    #$total = count($classe->listarTodos());
    $dados = $lista->table($table)->listarTodos();
    $return = "<select class='form-control' name='" . $name_select . "'>";
    
    if (count($dados) > 0){
        foreach ($dados as $r){
            $return .= "<option value='" . $r->$key . "'>" . $r->$name . "</option>";
        }
    } else  {
        $return .= '<option> Não existem dados </option>';
    }
    
    $return .= '</select>';
    return $return;
}


?>
