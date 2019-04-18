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
            <input type="hidden" name="id" value="<?= (isset($prova)) ? $prova->id : ''; ?>">
            <label for="nome">Nome</label><br>
            <input type="text" name="nome" id="nome" value="<?= (isset($prova)) ? $prova->nome : ''; ?>"><br>
            <label for="tempo">Tempo em Minutos</label><br>
            <input type="number" name="tempo" id="tempo" value="<?= (isset($prova)) ? $prova->tempo : ''; ?>"><br>
            <label for="descricao">Descrição da Prova</label><br>
            <textarea  name='descricao' id="descricao" value=""><?= (isset($prova)) ? $prova->descricao : ''; ?></textarea><br>
            <label for="nIntegrantes">Número de Integrantes</label><br>
            <input type="number" name="nIntegrantes" id="nIntegrantes" value="<?= (isset($prova)) ? $prova->NIntegrantes : ''; ?>"><br>
            <button type="submit">Enviar</button>
            <button type="reset">Cancelar</button>
        </form>
    </body>
</html>