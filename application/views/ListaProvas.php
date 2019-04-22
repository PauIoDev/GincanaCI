<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Lista de Provas</title>
        <script src="../Essenciais/Jquery.js" type="text/javascript"></script>
        <link href="../Essenciais/FontAwesome.css" rel="stylesheet" type="text/css"/>
        <link href="../Essenciais/Bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <h1>Lista de Provas</h1>
    <?php
    $mensagem = $this->session->flashdata('mensagem');
    echo (isset($mensagem) ? $mensagem : '');
    ?>
    <body>
        <table border="1">
            <thead>
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
                    . '<a href="' . $this->config->base_url() . 'index.php/Prova/alterar/' . $p->id . '">Alterar</a>'
                    . ' / '
                    . '<a href="' . $this->config->base_url() . 'index.php/Prova/deletar/' . $p->id . '">Deletar</a>'
                    . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </body>
</html>