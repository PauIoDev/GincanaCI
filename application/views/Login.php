<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login de Usuário - Sistema Comércio</title>
        <link href="<?= base_url('Incluir/Bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('Incluir/FontAwesome.css') ?>" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url('Incluir/Bootstrap.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('Incluir/Jquery.js') ?>" type="text/javascript"></script>
    </head>
    <body>
        <div class="container mt-3">
            <div Class="card mx-auto" style="max-width: 300px">
                <div Class="card-header">
                    Login de Usuário
                </div>
                <div Class="card-body">
                    <form action="" method="POST" name="login">
                        <div class="form-group">
                            <label for="email">e-mail:</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
                        </div>
                        <div class="form-group">
                            <label for="email">senha:</label>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua Senha">
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Acessar</button>
                    </form>
                </div>
            </div>
        </div>

        <?php
        // put your code here
        ?>
        
    </body>
</html>
