<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Lista de Provas</title>
        <link href="<?= base_url('Incluir/Bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('Incluir/FontAwesome.css') ?>" rel="stylesheet" type="text/css"/>
    </head>
    <nav class="navbar navbar-light navbar-expand-md" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="<?= $this->config->base_url(); ?>">
            <img src="<?= base_url('Incluir/mao.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
            Sistema Gincana
        </a>
        <div class="collapse navbar-collapse" id="navTop">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a href="#" id="menuProvas" class="nav-link dropdown-toggle" data-toggle="dropdown">Provas</a>
                    <div class="dropdown-menu" aria-labelledby="menuProvas">
                        <a href="<?= $this->config->base_url() . 'Prova/listar'; ?>" class="dropdown-item">Listar</a>
                        <a href="<?= $this->config->base_url() . 'Prova/cadastrar'; ?>" class="dropdown-item">Cadastrar</a>
                    </div>
                </li>
            </ul>
            <ul class=""nav navbar justify-content-end>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Usuario/deslogar') ?>">
                            Sair  <i class="fas fa-sign-out-alt"></i> 
                        </a>
                    </li>
                </ul>
        </div>
    </nav>
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Provas</li>
            </ol>
        </nav> 
        <?php
        $mensagem = $this->session->flashdata('mensagem');
        echo (isset($mensagem) ? '<div class="alert alert-success" role="alert">' . $mensagem . ' </div>' : '');
        ?>
        <body>
            <table class="table table-striped">        
                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Tempo</th>
                        <th>Descrição</th>
                        <th>Nº Integrantes</th>
                        <th>Ações</th>
                    </tr>
                </thead>        
                <tbody>
                    <?php
                    foreach ($provas as $p) {
                        echo '<tr>';
                        echo '<td>' . $p->nome . '</td>';
                        echo '<td>' . $p->tempo . '</td>';
                        echo '<td>' . $p->descricao . '</td>';
                        echo '<td>' . $p->NIntegrantes . '</td>';
                        echo '<td>'
                        . '<a href="' . $this->config->base_url() . 'Prova/alterar/' . $p->id . '" class="btn btn-sm btn-outline-secondary mr-2" >Alterar</a>'
                        . '<a href="' . $this->config->base_url() . 'Prova/deletar/' . $p->id . '" class="btn btn-sm btn-outline-secondary mt-2" >Deletar</a>'
                        . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
    </div>
    <script src="<?= base_url('Incluir/Jquery.js') ?>" type="text/javascript"></script>   
    <script src="<?= base_url('Incluir/Bootstrap.js') ?>" type="text/javascript"></script>
</body>
</html>