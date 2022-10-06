<?php
date_default_timezone_set('america/sao_paulo');

if (!isset($_POST['nome'])){
    header('Location:../index.html');
}

$curriculo = new stdClass();

$curriculo->nome = trim($_POST['nome']);
$curriculo->nascimento = $_POST['nascimento'];
$curriculo->celular = trim($_POST['celular']);
$curriculo->email = trim($_POST['email']);
$curriculo->experiencias = $_POST['exp'];
$curriculo->idade = calcularIdade($curriculo->nascimento);


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


function renderizarExperiencia($experiencia) {
    ?>
    <div>
        <?php echo $experiencia; ?>
    </div>
    <?php
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/style/imprimir.css" rel="stylesheet">
    </head>
    <body>
        <main class="container">
            <div class="sobre">
                <h1><?php echo $curriculo->nome; ?></h1>
                <h1><?php echo $curriculo->celular; ?></h1>
                <h1><?php echo $curriculo->email; ?></h1>
            </div>
            <div class="experiencias">
            <?php
            if (isset($_POST['nome'])){
                foreach ($curriculo->experiencias as $index => $experiencia) {
                    renderizarExperiencia($experiencia);
                }

            }
            ?>
            </div>
        </main>
    </body>
</html>
