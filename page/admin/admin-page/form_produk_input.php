<?php
if (isset($_SESSION['kategori_list'])) {
    $kategoriList = $_SESSION['kategori_list'];
    unset($_SESSION['kategori_list']);
} else {
    require_once __DIR__ . '/../../../model/Kategori.php';
    $kat = new Kategori();
    $kategoriList = $kat->getAll();
}
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Tambah Produk</h5>
    <a href="?page=produk&action=index" class="btn btn-secondary btn-sm">
        <i class="ti ti-arrow-left me-1"></i>Kembali
    </a>
</div>

<?php if (isset($_GET['error'])): ?>
<div class="alert alert-danger">Nama produk tidak boleh kosong!</div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <form method="POST" action="?page=produk&action=create">
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Kemeja Flannel Lengan Panjang" required autofocus>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="id_kategori" class="form-select">
                        <option value="">-- Pilih Kategori --</option>
                        <?php if (!empty($kategoriList)): ?>
                            <?php foreach ($kategoriList as $k): ?>
                                <option value="<?= $k['ID_kategori'] ?>">
                                    <?= htmlspecialchars($k['nama_kategori']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" placeholder="0" min="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Stok</label>
                    <input type="number" name="stok" class="form-control" placeholder="0" min="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">URL Foto</label>
                    <input type="text" name="foto_produk" class="form-control" placeholder="https://... atau foto/nama.jpg">
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi produk..."></textarea>
                </div>
            </div>
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-success">
                    <i class="ti ti-device-floppy me-1"></i>Simpan
                </button>
                <a href="?page=produk&action=index" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>