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
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Integrantes</li>
        </ol>
    </nav>
    <?php echo validation_errors(); ?>
    <?php
    echo ($this->session->flashdata('retorno')) ? $this->session->flashdata('retorno') : '';
    //var_dump($integrante);
    ?>
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <form action="" method="POST">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" id="nome" value="<?= (isset($integrante)) ? $integrante->nome : ''; ?>" placeholder="Digite o Nome do Integrante">
                </div>                
                <div class="form-group">
                    <label for="id_equipe">Equipe</label>
                    <select class="form-control" id="id_equipe" name="id_equipe">
                        <?php
                        if (count($equipes) > 0) {
                            echo '<option value="">selecione uma equipe</option>';
                            foreach ($equipes as $e) {
                                echo '<option '.(($e->id == $integrante->id_equipe) ? 'selected' : '').' value="' . $e->id . '">' . $e->nome . '</option>';
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
                    <label for="rg">RG</label>
                    <input class="form-control" type="text" name="rg" id="rg" value="<?= (isset($integrante)) ? $integrante->rg : ''; ?>" placeholder="Digite o RG do Integrante">
                </div> 
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input class="form-control" type="text" name="cpf" id="cpf" value="<?= (isset($integrante)) ? $integrante->cpf : ''; ?>" placeholder="Digite o CPF do Integrante">
                    <?php /*
                      if (strlen($_POST['cpf']) < 30) {
                      echo '<span style="color: red"><i class="fas fa-exclamation-circle"></i>A descrição deve conter pelo menos 30 caracteres, Total é ' . strlen($_POST['cpf']) . '.</span>';
                     */ ?>
                </div>
                <div class="text-center mb-5">
                    <button class="btn btn-success" type="submit">Enviar</button>
                    <button class="btn btn-warning" type="reset">Limpar</button> 
                </div>
            </form>
        </div>
    </div>
</div>


