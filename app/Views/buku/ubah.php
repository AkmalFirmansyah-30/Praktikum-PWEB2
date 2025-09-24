<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h2>Form Ubah Data Buku</h2>
            <form action="/buku/update/<?= $buku['id_buku']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="sampulLama" value="<?= $buku['sampul']; ?>">

                <div class="form-group mb-3">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul', $buku['judul']); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= old('pengarang', $buku['pengarang']); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit', $buku['penerbit']); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= old('tahun_terbit', $buku['tahun_terbit']); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="sampul">Sampul</label><br>
                    <img src="/img/<?= $buku['sampul']; ?>" width="100" class="mb-2">
                    <input type="file" class="form-control" id="sampul" name="sampul">
                </div>

                <button type="submit" class="btn btn-primary">Ubah Data</button>
                <a href="/buku" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
