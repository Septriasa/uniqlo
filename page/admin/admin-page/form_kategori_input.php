<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Tambah Kategori</h5>
    <a href="?page=kategori&action=index" class="btn btn-secondary btn-sm">
        <i class="ti ti-arrow-left me-1"></i>Kembali
    </a>
</div>

<?php if (isset($_GET['error'])): ?>
<div class="alert alert-danger">❌ Nama kategori tidak boleh kosong!</div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <form method="POST" action="?page=kategori&action=create">
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" placeholder="Contoh: Pria, Wanita, Anak..." required autofocus>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-device-floppy me-1"></i>Simpan
                </button>
                <a href="?page=kategori&action=index" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
