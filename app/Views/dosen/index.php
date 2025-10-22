<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2>Daftar Dosen</h2>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukan " aria-label="username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
        </div>
    <a href="/dosen/tambah" class="btn btn-primary mb-3">Tambah dosen</a>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('pesan'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>

            <tr>
                <th>No</th>
                <th>KTP Dosen</th>
                <th>Nama Dosen</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No. Telpon</th>
                <th>Bidang Mengajar</th>
                <th>Jadwal Tugas</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($dosen as $a) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $a['ktp_dosen']; ?></td>
                <td><?= $a['nama_dosen']; ?></td>
                <td><?= $a['alamat']; ?></td>
                <td><?= $a['email']; ?></td>
                <td><?= $a['no_telepon']; ?></td>
                <td><?= $a['bidang_mengajar']; ?></td>
                <td><?= $a['jadwal_tugas']; ?></td>
                <td>
                    <a href="/dosen/<?= $a['ktp_dosen']; ?>" class="btn btn-success btn-sm">Detail</a>
                    <a href="/dosen/edit/<?= $a['ktp_dosen']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/dosen/delete/<?= $a['ktp_dosen']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
