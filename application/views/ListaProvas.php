<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Provas</li>
        </ol>
    </nav> 
    <?= ($this->session->flashdata('retorno')) ? $this->session->flashdata('retorno') : ''; ?>
    <?= validation_errors(); ?>
    <div class="table-responsive">
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
                if (count($provas) > 0) {
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
                } else {
                    echo '<tr><td colspan="6">Nenhuma Prova foi cadastrada até o momento.</td></tr>';
                }
                ?>
            </tbody>
        </table>

    </div>
</div>