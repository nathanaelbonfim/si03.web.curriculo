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
$curriculo->objetivo = $_POST['objetivo'];
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>

        
    </head>
    <body>
        <main class="container">
            <div class="sobre" >

                <h1><b><u><?php echo $curriculo->nome; ?></u></b></h1>
                <p><b><?=$curriculo->idade?> Anos</b></p>

                <p><b><u>CONTATO</u></b></p>
                <h2><?php echo $curriculo->celular; ?></h2>
                <h2><?php echo $curriculo->email; ?></h2>
            </div>
            <div class="experiencias">
                <p><b><u>EXPERIÊNCIAS</u></b></p>
                <?php
            if (isset($_POST['nome'])){
                foreach ($curriculo->experiencias as $index => $experiencia) {
                    
                    renderizarExperiencia($experiencia);
                    // echo('<hr>');
                }
                
            }
            ?>
            <p><b><u>OBJETIVO</u></b></p>
            <h2><?php echo $curriculo->objetivo; ?></h2>

                <div class="flex mb-6 p-3 rounded align-middle">
                    <button class="mr-auto mt-2 btn bg-indigo-600 hover:bg-indigo-800 text-white" type="button" id="imprimir" onclick = "imprimir()" >Imprimir currículo</button>
                </div>
            
            </div>
        </main>
    </body>
</html>

<?php
  echo"<script language='javascript'>

    function imprimir(){
        document.getElementById('imprimir').remove();
        window.print();
    }

</script>
";
?>
