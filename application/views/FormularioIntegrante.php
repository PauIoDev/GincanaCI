<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#RG").mask("000000000000000");
    $("#CPF").mask("000.000.000-00");
</script>
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= (isset($integrante)) === true ? 'Alteração' : 'Cadastro' ?> de Integrantes</li>
        </ol>
    </nav>
    <?= ($this->session->flashdata('retorno')) ? $this->session->flashdata('retorno') : ''; ?>
    <?= validation_errors(); //var_dump($integrante)?>
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <form action="" method="POST">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="Nome">Nome</label>
                    <input class="form-control" type="text" name="Nome" id="Nome" value="<?= (isset($integrante)) ? $integrante->nome : ''; ?>" placeholder="Digite o Nome do Integrante">
                </div>                
                <div class="form-group">
                    <label for="Equipe">Equipe</label>
                    <select class="form-control" id="Equipe" name="Equipe">
                        <?php
                        if (count($equipes) > 0) {
                            echo '<option value="">selecione uma equipe</option>';
                            foreach ($equipes as $e) {
                                echo '<option ' . (($e->id == $integrante->id_equipe) ? 'selected' : '') . ' value="' . $e->id . '">' . $e->nome . '</option>';
                            }
                        } else {
                            echo '<option value="">nenhuma equipe cadastrada.</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="data_nasc">Data de Nascimento</label>
                    <input class="form-control" type="date" name="data_nasc" id="data_nasc" value="<?= (isset($integrante)) ? $integrante->data_nasc : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="RG">RG</label>
                    <input class="form-control" type="text" name="RG" id="RG" value="<?= (isset($integrante)) ? $integrante->rg : ''; ?>" placeholder="Digite o RG do Integrante">
                </div> 
                <div class="form-group">
                    <label for="CPF">CPF:</label>
                    <input class="form-control" type="text" name="CPF" id="CPF" value="<?= (isset($integrante)) ? $integrante->cpf : ''; ?>" placeholder="Digite o CPF do Integrante">
                    <?php /*
                      if (strlen($_POST['cpf']) < 30) {
                      echo '<span style="color: red"><i class="fas fa-exclamation-circle"></i>A descrição deve conter pelo menos 30 caracteres, Total é ' . strlen($_POST['cpf']) . '.</span>';
                     */ ?>
                </div>
                <div class="text-center mb-5">
                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i><?= (isset($integrante)) === true ? ' Alterar' : ' Salvar' ?></button>
                    <a class="btn btn-warning" href="<?= base_url('Integrante/listar'); ?>"><i class="fas fa-undo"></i> Cancelar</a> 
                </div>
            </form>
        </div>
    </div>
</div>


