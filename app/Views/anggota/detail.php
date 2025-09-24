<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Detail Anggota</h3>
    <div class="card" style="max-width: 540px;">
        <div class="card-body">
            <h5 class="card-title"><?= $anggota['nama']; ?></h5>
            <p class="card-text"><b>Alamat:</b> <?= $anggota['alamat']; ?></p>
            <p class="card-text"><b>Telp:</b> <?= $anggota['telp']; ?></p>
            
            <a href="/anggota/edit/<?= $anggota['id_anggota']; ?>" class="btn btn-warning">Ubah</a>
            <a href="/anggota/delete/<?= $anggota['id_anggota']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus anggota ini?');">Hapus</a>
            <br><br>
            <a href="/anggota" class="btn btn-secondary">Kembali ke Daftar Anggota</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
