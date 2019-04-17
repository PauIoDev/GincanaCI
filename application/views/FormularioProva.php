<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cadastro de Prova</title>
    </head>
    <body>
        <form action="" method="POST">
            <label for="nome">Nome</label><br>
            <input type="text" name="nome" id="nome" value=""><br>
            <label for="tempo">Tempo em Minutos</label><br>
            <input type="number" name="tempo" id="tempo" value=""><br>
            <label for="descricao">Descrição da Prova</label><br>
            <textarea  name='descricao' id="descricao" value=""></textarea><br>
            <label for="nIntegrantes">Número de Integrantes</label><br>
            <input type="number" name="nIntegrantes" id="nIntegrantes" value=""><br>
            <button type="submit">Enviar</button>
            <button type="reset">Cancelar</button>
        </form>
    </body>
</html>