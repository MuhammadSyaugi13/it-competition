<?= $this->extend('layout/templateDasar') ?>
<?= $this->section('content'); ?>
<div class="container my-3 bgc ">

    <h2 class="mb-5 text-center">Daftar Rencana Keuangan</h2>

    <form action="" method="POST">
        <div class="container-form rounded-3 ">
            <!-- pemasukan -->
            <h4 class="text-center mt-6">Pemasukan</h4>
            <div class="my-3 p-2 pemasukan mx-auto">
                <div class="input-group  mb-1 mx-0">
                    <!-- <span class="input-group-text">5.000.000</span> -->
                    <input type="number" name="pemasukan" placeholder="Input Nominal" class="form-control pemasukan rounded-pill text-center" id="pemasukan">
                </div>
                <div id="emailHelp" class="form-text">*We'll never share your email with anyone else.</div>
            </div>
            <br>
            <!-- rencana Pengeluaran -->
            <div class="m-5 border-top border-2 p-2 rounded-3">

                <div class="areaPlanning">
                    <h4 class="text-center">Pengeluaran</h5>

                </div>
                <br><br>

                <div class="d-grid gap-2 mt-5 ">
                    <button class="btn btn-secondary btnTambah" type="button">+ Tambah Rencana Keuangan</button>
                </div>

            </div>
            <!-- Akhir rencana Pengeluaran -->

        </div>
    </form>
    <br>

</div>

<script src="/assets/js/planning.js"></script>

<?= $this->endSection(); ?>