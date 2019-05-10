<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#cpf").mask("000.000.000-00");
</script>
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Integrantes</li>
        </ol>
    </nav>
    <?php
    $mensagem = $this->session->flashdata('mensagem');
    echo (isset($mensagem) ? '<div class="alert alert-success" role="alert">' . $mensagem . ' </div>' : '');
    ?>
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= (isset($integrante)) ? $integrante->id : ''; ?>">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" id="nome" value="<?= (isset($integrante)) ? $integrante->nome : ''; ?>" placeholder="Digite o Nome do Integrante">
                </div>                
                <div class="form-group">
                    <label for="id_equipe">Equipe</label>
                    <select class="form-control" id="id_equipe" name="id_equipe">
                         <?php
                    if (count($integrantes) > 0) {
                        echo '<option value="">selecione uma equipe</option>';
                        foreach ($integrantes as $i) {
                            echo '<option '.set_select('id_equipe', $i->id).' value="' . $i->id . '">' . $i->nome . '</option>';
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
                </div>
                <div class="text-center mb-5">
                    <button class="btn btn-success" type="submit">Enviar</button>
                    <button class="btn btn-warning" type="reset">Limpar</button> 
                </div>
            </form>
        </div>
    </div>
</div>


