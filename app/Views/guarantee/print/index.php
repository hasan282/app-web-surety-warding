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
<div class="card collapsed-card">
    <div class="card-header">
        <h3 class="card-title">Preview</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="mx-auto mw-8">
            <div class="card">
                <div class="card-body">

                    <?= $this->include('guarantee/draft/mb_ind'); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-5">
                <div class="mx-auto mw-3 text-center">
                    <small class="text-secondary">Print dokumen dengan</small>
                    <button type="button" class="btn btn-danger btn-lg btn-block">
                        Jadikan <strong>PDF</strong>
                    </button>
                    <small class="text-secondary">atau</small>
                    <button type="button" class="btn btn-primary btn-block">
                        Download File <strong>Word</strong>
                    </button>
                </div>
            </div>
            <div class="col-7">
                <div class="border-fade px-3 text-center py-3">

                    <?= $this->include('guarantee/print/issued'); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('jscript'); ?>

<?= $this->endSection(); ?>