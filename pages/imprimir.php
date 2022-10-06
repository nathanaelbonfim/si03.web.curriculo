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
            <div class="experiencias"></div>
        </main>
    </body>
</html>
