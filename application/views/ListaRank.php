<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ranking</li>
        </ol>
    </nav> 
    <?= ($this->session->flashdata('retorno')) ? $this->session->flashdata('retorno') : ''; ?>
    <?= validation_errors(); ?>
    <div class="table-responsive">
        <table class="table table-striped">        
            <thead class="thead-dark">
                <tr>
                    <th>Equipe</th>
                    <th>Pontos</th>
                </tr>
            </thead>        
            <tbody>
                <?php
                if (count($pontuacoes) > 0) {
                    foreach ($pontuacoes as $p) {
                        echo '<tr>';
                        echo '<td>' . $p->equipe . '</td>';
                        echo '<td>' . $p->ranking . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">Nenhuma Pontuação foi atribuída até o momento.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>