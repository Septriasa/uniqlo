<?php
if (isset($_SESSION['kategori_data'])) {
    $data = $_SESSION['kategori_data'];
    unset($_SESSION['kategori_data']);
} else {
    require_once __DIR__ . '/../../../model/Kategori.php';
    $kat = new Kategori();
    $data = $kat->getAll();
}
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Daftar Kategori</h5>
    <a href="?page=kategori&action=create" class="btn btn-primary btn-sm">
        <i class="ti ti-plus me-1"></i>Tambah Kategori
    </a>
</div>

<?php if (isset($_GET['success'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_GET['success'] === 'tambah' ? '✅ Kategori berhasil ditambahkan!' : ($_GET['success'] === 'edit' ? '✅ Kategori berhasil diperbarui!' : '✅ Kategori berhasil dihapus!') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th width="60">#</th>
                    <th>Nama Kategori</th>
                    <th width="160" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if (empty($data)): ?>
                <tr><td colspan="3" class="text-center text-muted py-4">Belum ada data kategori.</td></tr>
            <?php else: ?>
                <?php $no = 1; foreach ($data as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
                    <td class="text-center">
                        <a href="?page=kategori&action=edit&id=<?= $row['ID_kategori'] ?>" class="btn btn-warning btn-sm me-1">
                            <i class="ti ti-edit"></i>
                        </a>
                        <a href="?page=kategori&action=delete&id=<?= $row['ID_kategori'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus kategori \'<?= htmlspecialchars(addslashes($row['nama_kategori'])) ?>\'?')">
                            <i class="ti ti-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
