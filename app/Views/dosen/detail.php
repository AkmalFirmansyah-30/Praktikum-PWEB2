<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Detail Dosen</h3>
    <div class="card" style="max-width: 540px;">
        <div class="card-body">
            <h5 class="card-title"><?= $dosen['nama_dosen']; ?></h5>
            <p class="card-text"><b>Alamat:</b> <?= $dosen['alamat']; ?></p>
            <p class="card-text"><b>Email:</b> <?= $dosen['email']; ?></p>
            <p class="card-text"><b>No. Telepon:</b> <?= $dosen['no_telepon']; ?></p>
            <p class="card-text"><b>Bidang Mengajar</b> <?= $dosen['bidang_mengajar']; ?></p>
            <p class="card-text"><b>Jadwal Tugas</b> <?= $dosen['jadwal_tugas']; ?></p>
            
            <a href="/dosen/edit/<?= $dosen['ktp_dosen']; ?>" class="btn btn-warning">Ubah</a>
            <a href="/dosen/delete/<?= $dosen['ktp_dosen']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus dosen ini?');">Hapus</a>
            <br><br>
            <a href="/dosen" class="btn btn-secondary">Kembali ke Daftar Dosen</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
