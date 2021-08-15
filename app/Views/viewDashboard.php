<?= $this->extend('layout/templateDasar') ?>
<?= $this->section('content'); ?>

<div class="container mt-2">

    <!-- Bagian menu -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 contain">

            <div class="row d-flex justify-content-around p-3">
                <div class="col-md-4 mx-2 text-center perencanaan p-2">
                    <a href="<?= base_url('/planning'); ?>" class="text-decoration-none">
                        <div><i class="fas fa-notes-medical perencanaan-icon"></i></div>
                        <div class="text-center perencanaan-text">Perencanaan Keuangan</div>
                    </a>
                </div>
                <div class="col-md-4 mx-2 text-center pencatatan p-2">
                    <a href="<?= base_url('/debit'); ?>" class="text-decoration-none">
                        <div><i class="fas fa-book-open pencatatan-icon"></i></div>
                        <div class="text-center pencatatan-text">Catatan Pengeluaran</div>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- Akhir Bagian menu -->
    <div class="border-top border-2 mt-3"></div>


</div>

<?= $this->endSection(); ?>