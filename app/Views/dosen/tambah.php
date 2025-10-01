<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h2>Form Tambah Data Dosen</h2>
            
            <form action="/dosen/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="form-group mb-3">
                    <label for="nama_dosen">Nama Dosen</label>
                    <input type="text" class="form-control <?= (session('errors.nama_dosen')) ? 'is-invalid' : ''; ?>" 
                           id="nama_dosen" name="nama_dosen" value="<?= old('nama_dosen'); ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.nama_dosen'); ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= old('email'); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="no_telepon">No. Telepon</label>
                    <input type="number" class="form-control" id="no_telepon" name="no_telepon" value="<?= old('no_telepon'); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="bidang_mengajar">Bidang Mengajar</label>
                    <input type="text" class="form-control" id="bidang_mengajar" name="bidang_mengajar" value="<?= old('bidang_mengajar'); ?>">
                </div>
                
                <div class="form-group mb-3">
                    <label for="jadwal_tugas">Jadwal Tugas</label>
                    <input type="text" class="form-control" id="jadwal_tugas" name="jadwal_tugas" value="<?= old('jadwal_tugas'); ?>">
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="/dosen" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
