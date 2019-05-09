    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Equipes</li>
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
                        <th>Ações</th>
                    </tr>
                </thead>        
                <tbody>
                    <?php
                    foreach ($equipes as $e) {
                        echo '<tr>';
                        echo '<td>' . $e->nome . '</td>';
                        echo '<td>'
                        . '<a href="' . $this->config->base_url() . 'Equipe/alterar/' . $e->id . '" class="btn btn-sm btn-outline-secondary mr-2" >Alterar</a>'
                        . '<a href="' . $this->config->base_url() . 'Equipe/deletar/' . $e->id . '" class="btn btn-sm btn-outline-secondary" >Deletar</a>'
                        . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
    </div>
