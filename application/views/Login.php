<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login de Usuário - Sistema Gincana</title>
        <link href="<?= base_url('Incluir/Bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('Incluir/FontAwesome.css') ?>" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url('Incluir/Bootstrap.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('Incluir/Jquery.js') ?>" type="text/javascript"></script>
    </head>
    <body>
        <div class="container mt-3">
            
            <div Class="card mx-auto" style="max-width: 400px">
                <div Class="card-header text-center"  style="background-color: #e3f2fd">
                    <h4 class="font-weight-bold"><i class="fas fa-user"></i> Login de Usuário</h4>
                </div>                
                <div Class="card-body">
                    <?php
                    $mensagem = $this->session->flashdata('retorno');
                    echo (isset($mensagem) ? $mensagem : '');
                    ?>
                    <?= validation_errors(); ?>
                    <form action="" method="POST" name="login">
                        <div class="form-group">
                            <label for="email">e-mail:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
                        </div>
                        <div class="form-group">
                            <label for="email">senha:</label>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua Senha">
                        </div><div class=" text-center">
                        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Acessar</button>
                       </div> <p class="mt-3 mb-3 text-muted text-center">&copy; 2017-2019</p>
                        
                    </form>
                </div>
            </div>
    </body>
</html>
