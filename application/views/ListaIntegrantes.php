<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Integrantes</li>
        </ol>
    </nav> 
    <?php echo validation_errors(); ?>
    <?php
    echo ($this->session->flashdata('retorno')) ? $this->session->flashdata('retorno') : '';
    ?>
    <body>
        <table class="table table-striped">        
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Equipe</th>
                    <th>Data de Nascimento</th>
                    <th>Nº RG</th>
                    <th>Nº CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>        
            <tbody>
                <?php
                foreach ($integrantes as $i) {
                    echo '<tr>';
                    echo '<td>' . $i->nome . '</td>';
                    echo '<td>' . $i->time . '</td>';
                    echo '<td>' . $i->data_nasc . '</td>';
                    echo '<td>' . $i->rg . '</td>';
                    echo '<td>' . $i->cpf . '</td>';
                    echo '<td>'
                    . '<a href="' . $this->config->base_url() . 'Integrante/alterar/' . $i->id . '" class="btn btn-sm btn-outline-secondary mr-2" >Alterar</a>'
                    . '<a href="' . $this->config->base_url() . 'Integrante/deletar/' . $i->id . '" class="btn btn-sm btn-outline-secondary" >Deletar</a>'
                    . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
</div>
