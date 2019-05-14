<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= (isset($equipe)) === true ? 'Alteração' : 'Cadastro' ?> de Equipes</li>
        </ol>
    </nav>
    <?= ($this->session->flashdata('retorno')) ? $this->session->flashdata('retorno') : ''; ?>
    <?= validation_errors(); //var_dump($equipe)?>
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <form action="" method="POST">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="form-control" type="text" name="Nome" id="Nome" value="<?= (isset($equipe)) ? $equipe->nome : ''; ?>">
                </div>
                <div class="text-center mb-5">
                    <button class="btn btn-success" type="submit">Enviar</button>
                    <a class="btn btn-warning" href="<?= base_url('Equipe/listar'); ?>">Cancelar</a> 
                </div>
            </form>
        </div>
    </div>
</div>
