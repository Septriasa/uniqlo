<?php
if (isset($_SESSION['produk_data'])) {
    $data = $_SESSION['produk_data'];
    unset($_SESSION['produk_data']);
} else {
    require_once __DIR__ . '/../../../model/Produk.php';
    $p = new Produk();
    $data = $p->getAll();
}
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Daftar Produk</h5>
    <a href="?page=produk&action=create" class="btn btn-success btn-sm">
        <i class="ti ti-plus me-1"></i>Tambah Produk
    </a>
</div>

<?php if (isset($_GET['success'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_GET['success'] === 'tambah' ? '✅ Produk berhasil ditambahkan!' : ($_GET['success'] === 'edit' ? '✅ Produk berhasil diperbarui!' : '✅ Produk berhasil dihapus!') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th width="50">#</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th width="80" class="text-center">Stok</th>
                    <th width="160" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if (empty($data)): ?>
                <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data produk.</td></tr>
            <?php else: ?>
                <?php $no = 1; foreach ($data as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <?php if (!empty($row['foto_produk'])): ?>
                        <img src="<?= htmlspecialchars($row['foto_produk']) ?>" alt="" width="40" height="40" style="object-fit:cover;border-radius:4px;margin-right:8px;">
                        <?php endif; ?>
                        <?= htmlspecialchars($row['nama_produk']) ?>
                    </td>
                    <td><?= htmlspecialchars($row['nama_kategori'] ?? '-') ?></td>
                    <td>Rp<?= number_format($row['harga'], 0, ',', '.') ?></td>
                    <td class="text-center">
                        <span class="badge <?= $row['stok'] > 0 ? 'bg-success' : 'bg-danger' ?>">
                            <?= $row['stok'] ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="?page=produk&action=edit&id=<?= $row['id_produk'] ?>" class="btn btn-warning btn-sm me-1">
                            <i class="ti ti-edit"></i>
                        </a>
                        <a href="?page=produk&action=delete&id=<?= $row['id_produk'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus produk \'<?= htmlspecialchars(addslashes($row['nama_produk'])) ?>\'?')">
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
</div>
