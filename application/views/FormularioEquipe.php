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
                <input type="hidden" name="id" value="<?= (isset($equipe)) ? $equipe->id : ''; ?>">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" id="nome" value="<?= (isset($equipe)) ? $equipe->nome : ''; ?>">
                </div>
                <div class="text-center mb-5">
                    <button class="btn btn-success" type="submit">Enviar</button>
                    <button class="btn btn-warning" type="reset">Limpar</button> 
                </div>
            </form>
        </div>
    </div>
</div>
