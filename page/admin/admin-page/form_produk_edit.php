<?php
if (isset($_SESSION['edit_produk'], $_SESSION['kategori_list'])) {
    $row = $_SESSION['edit_produk'];
    $kategoriList = $_SESSION['kategori_list'];
    unset($_SESSION['edit_produk'], $_SESSION['kategori_list']);
} else {
    header('Location: ?page=produk&action=index');
    exit();
}
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Edit Produk</h5>
    <a href="?page=produk&action=index" class="btn btn-secondary btn-sm">
        <i class="ti ti-arrow-left me-1"></i>Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="?page=produk&action=edit">
            <input type="hidden" name="id" value="<?= $row['id_produk'] ?>">
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                    <input type="text" name="nama_produk" class="form-control" value="<?= htmlspecialchars($row['nama_produk']) ?>" required autofocus>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="id_kategori" class="form-select">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategoriList as $k): ?>
                        <option value="<?= $k['ID_kategori'] ?>" <?= $k['ID_kategori'] == $row['id_kategori'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($k['nama_kategori']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" value="<?= $row['harga'] ?>" min="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= $row['stok'] ?>" min="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">URL Foto</label>
                    <input type="text" name="foto_produk" class="form-control" value="<?= htmlspecialchars($row['foto_produk'] ?? '') ?>">
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($row['deskripsi'] ?? '') ?></textarea>
                </div>
            </div>
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-warning">
                    <i class="ti ti-device-floppy me-1"></i>Update
                </button>
                <a href="?page=produk&action=index" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
