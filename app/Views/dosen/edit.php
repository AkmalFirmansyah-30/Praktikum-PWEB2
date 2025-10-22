<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Form Ubah Data dosen</h3>
    <form action="/dosen/update/<?= $dosen['ktp_dosen']; ?>" method="post">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dosen</label>
            <input type="text" class="form-control" id="nama" name="nama"
                   value="<?= old('nama_dosen', $dosen['nama_dosen']); ?>">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat"><?= old('alamat', $dosen['alamat']); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="<?= old('email', $dosen['email']); ?>">
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No. Telepon</label>
            <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                   value="<?= old('no_telepon', $dosen['no_telepon']); ?>">
        </div>

        <div class="mb-3">
            <label for="bidang_mengajar" class="form-label">Bidang Mengajar</label>
            <input type="text" class="form-control" id="bidang_mengajar" name="bidang_mengajar"
                   value="<?= old('bidang_mengajar', $dosen['bidang_mengajar']); ?>">
        </div>
                <div class="mb-3">
            <label for="jadwal_tugas" class="form-label">Jadwal Tugas</label>
            <input type="text" class="form-control" id="jadwal_tugas" name="jadwal_tugas"
                   value="<?= old('jadwal_tugas', $dosen['jadwal_tugas']); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/dosen" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection(); ?>
