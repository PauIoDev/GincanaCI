<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Integrantes</li>
        </ol>
    </nav> 
    <?= ($this->session->flashdata('retorno')) ? $this->session->flashdata('retorno') : ''; ?>
    <?= validation_errors(); ?>
    <div class="table-responsive">
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
                if (count($integrantes) > 0) {
                    foreach ($integrantes as $i) {
                        echo '<tr>';
                        echo '<td>' . $i->nome . '</td>';
                        echo '<td>' . $i->time . '</td>';
                        if (($i->data_nas) === '00/00/0000') {
                            echo '<td>Não informada</td>';
                        } else {
                            echo '<td>' . $i->data_nas . '</td>';
                        }
                        if (empty($i->rg)) {
                            echo '<td>Não informado</td>';
                        } else {
                            echo '<td>' . $i->rg . '</td>';
                        }
                        if (empty($i->cpf)) {
                            echo '<td>Não informado</td>';
                        } else {
                            echo '<td>' . $i->cpf . '</td>';
                        }
                        echo '<td>'
                        . '<a href="' . $this->config->base_url() . 'Integrante/alterar/' . $i->id . '" class="btn btn-sm btn-outline-secondary mr-2" >Alterar</a>'
                        . '<a href="' . $this->config->base_url() . 'Integrante/deletar/' . $i->id . '" class="btn btn-sm btn-outline-secondary" >Deletar</a>'
                        . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">Nenhum Integrante de equipe foi cadastrado até o momento.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>