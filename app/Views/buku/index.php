<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h1><?= $title; ?></h1>

    <!-- Form Pencarian -->
    <form action="" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukan Pencarian Data Buku"
                   name="cari" value="<?= esc($cari ?? '') ?>">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </form>

    <!-- Pesan Flashdata -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <a href="/buku/tambah" class="btn btn-primary mb-3">Tambah Data Buku</a>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Sampul</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($buku) && is_array($buku)) : ?>
            <?php $i = 1 + (5 * ($current - 1)); ?>
            <?php foreach ($buku as $b) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><img src="/img/<?= esc($b['sampul']); ?>" alt="<?= esc($b['judul']); ?>" width="75"></td>
                    <td><?= esc($b['judul']); ?></td>
                    <td><?= esc($b['pengarang']); ?></td>
                    <td><?= esc($b['penerbit']); ?></td>
                    <td><?= esc($b['tahun_terbit']); ?></td>
                    <td>
                        <a href="/buku/<?= $b['id_buku']; ?>" class="btn btn-success btn-sm">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="7" class="text-center">Belum ada data buku.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center">
    <?= $pager->links('buku', 'page_buku') ?>
</div>

<?= $this->endSection(); ?>
