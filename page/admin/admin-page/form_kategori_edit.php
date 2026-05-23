<?php
if (isset($_SESSION['edit_kategori'])) {
    $row = $_SESSION['edit_kategori'];
    unset($_SESSION['edit_kategori']);
} else {
    header('Location: ?page=kategori&action=index');
    exit();
}
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Edit Kategori</h5>
    <a href="?page=kategori&action=index" class="btn btn-secondary btn-sm">
        <i class="ti ti-arrow-left me-1"></i>Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="?page=kategori&action=edit">
            <input type="hidden" name="id" value="<?= $row['ID_kategori'] ?>">
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="<?= htmlspecialchars($row['nama_kategori']) ?>" required autofocus>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                    <i class="ti ti-device-floppy me-1"></i>Update
                </button>
                <a href="?page=kategori&action=index" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
