<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cadastro de Prova</title>
        <script src="../Essenciais/Jquery.js" type="text/javascript"></script>
        <link href="../Essenciais/FontAwesome.css" rel="stylesheet" type="text/css"/>
        <link href="../Essenciais/Bootstrap.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <?php
        $mensagem = $this->session->flashdata('mensagem');
        echo (isset($mensagem) ? $mensagem : '');
        ?>
        <div class="container">
            <div class="row">
                <div class="mt-3 col-4">
                    <form action="" method="POST" class="border rounded">
                        <input type="hidden" name="id" value="<?= (isset($prova)) ? $prova->id : ''; ?>">
                        <label for="nome">Nome</label><br>
                        <input type="text" name="nome" id="nome" value="<?= (isset($prova)) ? $prova->nome : ''; ?>"><br>
                        <label for="tempo">Tempo em Minutos</label><br>
                        <input type="number" name="tempo" id="tempo" value="<?= (isset($prova)) ? $prova->tempo : ''; ?>"><br>
                        <label for="descricao">Descrição da Prova</label><br>
                        <textarea  name='descricao' id="descricao" value=""><?= (isset($prova)) ? $prova->descricao : ''; ?></textarea><br>
                        <label for="nIntegrantes">Número de Integrantes</label><br>
                        <input type="number" name="nIntegrantes" id="nIntegrantes" value="<?= (isset($prova)) ? $prova->NIntegrantes : ''; ?>"><br>
                        <div class="text-center mb-5">
                            <button class="btn btn-success" type="submit">Enviar</button>
                            <button class="btn btn-warning" type="reset">Cancelar</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>