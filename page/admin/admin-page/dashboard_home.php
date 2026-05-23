<?php
$kategori = new Kategori();
$produk   = new Produk();
$totalKategori = $kategori->count();
$totalProduk   = $produk->count();
?>
<div class="row g-3 mb-4">
    <div class="col-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-s bg-light-primary">
                            <i class="ti ti-category f-20 text-primary"></i>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0 text-muted">Total Kategori</p>
                        <h4 class="mb-0"><?= $totalKategori ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-s bg-light-success">
                            <i class="ti ti-shirt f-20 text-success"></i>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0 text-muted">Total Produk</p>
                        <h4 class="mb-0"><?= $totalProduk ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kategori Terbaru</h5>
                <a href="?page=kategori&action=index" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead><tr><th>#</th><th>Nama Kategori</th></tr></thead>
                    <tbody>
                    <?php
                    $dataKat = $kategori->getAll();
                    $no = 1;
                    foreach (array_slice($dataKat, 0, 5) as $k): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($k['nama_kategori']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($dataKat)): ?>
                        <tr><td colspan="2" class="text-center text-muted py-3">Belum ada data</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Produk Terbaru</h5>
                <a href="?page=produk&action=index" class="btn btn-sm btn-success">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead><tr><th>Nama Produk</th><th>Harga</th></tr></thead>
                    <tbody>
                    <?php
                    $dataProd = $produk->getAll();
                    foreach (array_slice($dataProd, 0, 5) as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['nama_produk']) ?></td>
                            <td>Rp<?= number_format($p['harga'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($dataProd)): ?>
                        <tr><td colspan="2" class="text-center text-muted py-3">Belum ada data</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
