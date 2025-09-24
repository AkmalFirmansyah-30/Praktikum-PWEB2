<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2>Daftar Anggota</h2>
    <a href="/anggota/tambah" class="btn btn-primary mb-3">Tambah Anggota</a>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('pesan'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($anggota as $a) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $a['nama']; ?></td>
                <td><?= $a['alamat']; ?></td>
                <td><?= $a['telp']; ?></td>
                <td>
                    <a href="/anggota/<?= $a['id_anggota']; ?>" class="btn btn-success btn-sm">Detail</a>
                    <a href="/anggota/edit/<?= $a['id_anggota']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/anggota/delete/<?= $a['id_anggota']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
