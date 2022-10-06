<?php
date_default_timezone_set('america/sao_paulo');

$curriculo = new stdClass();

$curriculo->nome = trim($_POST['nome']);
$curriculo->celular = trim($_POST['celular']);
$curriculo->email = trim($_POST['email']);
$curriculo->experiencias = $_POST['exp'];
$nascimento = $_POST['nascimento'];
$curriculo->idade = calcularIdade($nascimento);

// foreach ($_POST['exp'] as $key => $experiencia) {
    
//     var_dump('Experiência '.$key .' - '.$experiencia);

// }

var_dump($curriculo);

function calcularIdade($data){
    $idade = 0;
    $data_nascimento = date('Y-m-d', strtotime($data));
    list($anoNasc, $mesNasc, $diaNasc) = explode('-', $data_nascimento);

    $idade      = date("Y") - $anoNasc;
    if (date("m") < $mesNasc){
        $idade -= 1;
    } elseif ((date("m") == $mesNasc) && (date("d") <= $diaNasc) ){
        $idade -= 1;
    }

    return $idade;
}

// echo("<script>window.print();</script>");

?>