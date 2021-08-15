<?= $this->extend('layout/templateDasar') ?>
<?= $this->section('content'); ?>
<div class="container my-3 bgc ">

    <!-- menu -->
    <div class="btn-group sticky-top mt-2">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <b>Menu</b>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
            <li><a class="dropdown-item" href="<?= base_url('/'); ?>">Dashboard</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/planning'); ?>">Perencanaan Keuangan</a></li>
        </ul>
    </div>
    <!-- akhir menu -->

    <h2 class="mb-5 text-center">Catatan Pengeluaran</h2>

    <form action="" method="POST">
        <div class="container-form rounded-3 ">

            <!-- <br><br><br> -->
            <!-- pemasukan -->
            <h4 class="text-center mt-6">Nominal Pengeluaran</h4>
            <div class="my-3 p-2 pemasukan mx-auto">
                <div class="input-group  mb-1 mx-0">
                    <input type="number" name="debit" placeholder="Input Nominal" class="form-control pemasukan rounded-pill text-center" id="pemasukan">
                </div>
                <!-- <div id="emailHelp" class="form-text">*We'll never share your email with anyone else.</div> -->
            </div>
            <!-- rencana Pengeluaran -->
            <div class="m-5  border-2 p-2 rounded-3">

                <div class="areaPlanning">
                    <h4 class="text-center">Keterangan Pengeluaran</h5>

                        <div class="input-group my-3  mx-0">
                            <!-- <span class="input-group-text">5.000.000</span> -->
                            <input type="text" name="keteranganDebit" placeholder="Keterangan Pengeluaran" class="form-control pemasukan rounded-pill text-center" id="pemasukan">
                        </div>
                        <!-- <div id="emailHelp" class="form-text">*We'll never share your email with anyone else.</div> -->
                </div>

                <!-- <div class="d-grid gap-2 mt-5 ">
                    <button class="btn btn-secondary btnTambah" type="button">+ Tambah Rencana Keuangan</button>
                </div> -->

                <div class="d-grid gap-2 mt-5 ">
                    <button class="btn btn-secondary" type="submit">Submit</button>
                </div>

            </div>
            <!-- Akhir rencana Pengeluaran -->

        </div>
    </form>
    <br>

</div>

<script src="/assets/js/planning.js"></script>

<?= $this->endSection(); ?>