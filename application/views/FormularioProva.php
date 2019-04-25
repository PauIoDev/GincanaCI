<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cadastro de Prova</title>
        <link  href="<?= base_url('Incluir/Bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('Incluir/FontAwesome.css') ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="<?= $this->config->base_url(); ?>">
                <img src="<?= base_url('Incluir/Store.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
                Sistema Gincana
            </a>
            <div class="collapse navbar-collapse" id="navTop">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a href="#" id="menuProvas" class="nav-link dropdown-toggle" data-toggle="dropdown">Provas</a>
                        <div class="dropdown-menu" aria-labelledby="menuProvas">
                            <a href="<?= $this->config->base_url() . 'index.php/Prova/listar'; ?>" class="dropdown-item">Listar</a>
                            <a href="<?= $this->config->base_url() . 'index.php/Prova/cadastrar'; ?>" class="dropdown-item">Cadastrar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
         <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastro de Provas</li>
                </ol>
            </nav>
       <?php
        $mensagem = $this->session->flashdata('mensagem');
        echo (isset($mensagem) ? '<div class="alert alert-success" role="alert">' . $mensagem . ' </div>' : '');
        ?>
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= (isset($prova)) ? $prova->id : ''; ?>">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input class="form-control" type="text" name="nome" id="nome" value="<?= (isset($prova)) ? $prova->nome : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tempo">Tempo em Minutos</label>
                            <input class="form-control" type="number" name="tempo" id="tempo" value="<?= (isset($prova)) ? $prova->tempo : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição da Prova</label>
                            <textarea  class="form-control" name='descricao' id="descricao" value=""><?= (isset($prova)) ? $prova->descricao : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nIntegrantes">Número de Integrantes</label>
                            <input class="form-control" type="number" name="nIntegrantes" id="nIntegrantes" value="<?= (isset($prova)) ? $prova->NIntegrantes : ''; ?>">
                        </div> 
                        <div class="text-center mb-5">
                            <button class="btn btn-success" type="submit">Enviar</button>
                            <button class="btn btn-warning" type="reset">Limpar</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?= base_url('Incluir/Jquery.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('Incluir/Bootstrap.js') ?>" type="text/javascript"></script>
    </body>
</html>