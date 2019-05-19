<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#rg").mask("000000000000000");
    $("#cpf").mask("000.000.000-00");
</script>
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= (isset($pontuacao)) === true ? 'Alteração' : 'Cadastro' ?> da Pontuações</li>
        </ol>
    </nav>
    <?= ($this->session->flashdata('retorno')) ? $this->session->flashdata('retorno') : ''; ?>
    <?= validation_errors(); //var_dump($pontuacao)?>
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <form action="" method="POST">
                <input type="hidden" name="id" value="">

                <div class="form-group">
                    <label for="Equipe">Equipe</label>
                    <select class="form-control" id="Equipe" name="Equipe">
                        <?php
                        var_dump($pontuacao->id);
                        if (count($equipes) > 0) {
                            echo '<option value="">Selecione uma Equipe</option>';
                            foreach ($equipes as $e) {
                                echo '<option ' . (($e->id == $pontuacao->id_equipe) ? 'selected' : '') . ' value="' . $e->id . '">' . $e->nome . '</option>';
                            }
                        } else {
                            echo '<option value="">Nenhuma Equipe Cadastrada.</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Prova">Prova</label>
                    <select class="form-control" id="Prova" name="Prova">
                        <?php
                        if (count($provas) > 0) {
                            echo '<option value="">Selecione uma Prova</option>';
                            foreach ($provas as $p) {
                                echo '<option ' . (($p->id == $pontuacao->id_prova) ? 'selected' : '') . ' value="' . $p->id . '">' . $p->nome . '</option>';
                            }
                        } else {
                            echo '<option value="">Nenhuma Prova Cadastrada.</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Pontos">Pontos</label>
                    <input class="form-control" type="number" name="Pontos" id="Pontos" value="<?= (isset($pontuacao)) ? $pontuacao->pontos : ''; ?>" placeholder="Digite a Pontuação da Equipe">
                </div> 
                <div class="form-group">
                    <label for="data_hora">Data e Hora da Prova</label>
                    <input class="form-control" type="datetime" name="data_hora" id="data_hora" value="<?= (isset($pontuacao)) ? $pontuacao->data_hora : ''; ?>">
                </div>
                <div class="text-center mb-5">
                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i><?= (isset($pontuacao)) === true ? ' Alterar' : ' Salvar' ?></button>
                    <a class="btn btn-warning" href="<?= base_url('Pontuacao/listar'); ?>"><i class="fas fa-undo"></i> Cancelar</a> 
                </div>
            </form>
        </div>
    </div>
</div>


