<?= $this->extend('template/page_admin'); ?>

<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pengaturan Halaman</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">

        <?= $this->include('guarantee/print/setting'); ?>

    </div>
</div>
<div class="row">
    <div class="col-9">
        <div class="card">
            <div class="card-body">

                <?= $this->include('guarantee/draft/mb_ind'); ?>

            </div>
        </div>
    </div>
    <div class="col-3 d-flex justify-content-center">
        <div class="my-auto">
            <button type="button" class="btn btn-danger btn-lg btn-block">
                Jadikan <strong>PDF</strong>
            </button>
            <button type="button" class="btn btn-primary btn-block">
                Download File <strong>Word</strong>
            </button>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('jscript'); ?>

<?= $this->endSection(); ?>