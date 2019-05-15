<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Equipes</li>
        </ol>
    </nav> 
    <?= ($this->session->flashdata('retorno')) ? $this->session->flashdata('retorno') : ''; ?>
    <?= validation_errors(); ?>
    <div class="table-responsive">
        <table class="table table-striped">        
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>        
            <tbody>
                <?php
               
                if (count($equipes) > 0) {
                    foreach ($equipes as $e) {
                        echo '<tr>';
                        echo '<td>' . $e->nome . '</td>';
                        echo '<td>';
                        echo '<a href="' . $this->config->base_url() . 'Equipe/alterar/' . $e->id . '" class="btn btn-sm btn-outline-secondary mr-2" >Alterar</a>';
                        if ($e->membros < 1) {
                            echo '<a href="' . $this->config->base_url() . 'Equipe/deletar/' . $e->id . '" class="btn btn-sm btn-outline-secondary" >Deletar</a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">Nenhuma Equipe foi cadastrada até o momento.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>