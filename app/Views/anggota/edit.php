<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Form Ubah Data Anggota</h3>
    <form action="/anggota/update/<?= $anggota['id_anggota']; ?>" method="post">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama"
                   value="<?= old('nama', $anggota['nama']); ?>">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat"><?= old('alamat', $anggota['alamat']); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="telp" class="form-label">Telp</label>
            <input type="text" class="form-control" id="telp" name="telp"
                   value="<?= old('telp', $anggota['telp']); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/anggota" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection(); ?>
