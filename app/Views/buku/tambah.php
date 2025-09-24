<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h2>Form Tambah Data Buku</h2>
            
            <form action="/buku/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="form-group mb-3">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control <?= (session('errors.judul')) ? 'is-invalid' : ''; ?>" 
                           id="judul" name="judul" value="<?= old('judul'); ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.judul'); ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= old('pengarang'); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= old('tahun_terbit'); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="sampul">Upload Sampul</label>
                    <input type="file" class="form-control <?= (session('errors.sampul')) ? 'is-invalid' : ''; ?>" 
                           id="sampul" name="sampul">
                    <div class="invalid-feedback">
                        <?= session('errors.sampul'); ?>
                    </div>
                    <small class="form-text text-muted">Format yang diperbolehkan: jpg, jpeg, png</small>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="/buku" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
