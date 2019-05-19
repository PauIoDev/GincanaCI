<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= (isset($prova)) === true ? 'Alteração' : 'Cadastro' ?> de Provas</li>
        </ol>
    </nav>
    <?= ($this->session->flashdata('retorno')) ? $this->session->flashdata('retorno') : ''; ?>
    <?= validation_errors(); //var_dump($prova)?>
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <form action="" method="POST">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="Nome">Nome</label>
                    <input class="form-control" type="text" name="Nome" id="Nome" value="<?= (isset($prova)) ? $prova->nome : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="Tempo">Tempo em Minutos</label>
                    <input class="form-control" type="number" name="Tempo" id="Tempo" value="<?= (isset($prova)) ? $prova->tempo : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="Descrição">Descrição da Prova</label>
                    <textarea  class="form-control" name='Descrição' id="Descrição" value=""><?= (isset($prova)) ? $prova->descricao : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="NºIntegrantes">NºIntegrantes</label>
                    <input class="form-control" type="number" name="NºIntegrantes" id="NºIntegrantes" value="<?= (isset($prova)) ? $prova->NIntegrantes : ''; ?>">
                </div> 
                <div class="text-center mb-5">
                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i><?= (isset($prova)) === true ? ' Alterar' : ' Salvar' ?></button>
                    <a class="btn btn-warning" href="<?= base_url('Prova/listar'); ?>"><i class="fas fa-undo"></i> Cancelar</a> 
                </div>
            </form>
        </div>
    </div>
</div>
