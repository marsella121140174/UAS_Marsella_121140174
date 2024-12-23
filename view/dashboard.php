<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
require_once('../controller/ProdukController.php');

$username = $_SESSION['username'];

$produkController = new ProdukController();
$produkList = $produkController->getAllProduk();

function setCookieCustom($name, $value, $expire = 3600, $path = "/", $domain = "", $secure = false, $httpOnly = true)
{
    setcookie($name, $value, time() + $expire, $path, $domain, $secure, $httpOnly);
}

function getCookieCustom($name)
{
    return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
}

function deleteCookieCustom($name, $path = "/", $domain = "")
{
    setcookie($name, "", time() - 3600, $path, $domain);
}

$coockie_val = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $value = $_POST['cookie'];

        switch ($action) {
            case 'set':
                setCookieCustom($value,  $value, 86400);
                $coockie_val = null; 
                break;
            case 'get':
                $coockie_val  = getCookieCustom($value);
                break;
            case 'delete':
                deleteCookieCustom($value);
                break;
            default:
        }
    }
}

include('../layout/header.php');
?>

<nav class="navbar bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-white fw-bold" href="#">UAS PEMWEB</a>
    <div class="d-flex gap-2">
        <span class="text-white fw-semibold fs-5"><?php echo $username ?></span>
    </div>
  </div>
</nav>

<div class="container-fluid py-4">
    <div class="card mb-5" style="width: 100%">
    <div class="card-body">
        <h1>Add Produk</h1>
        <form action="../controller/Request/addproduk.php" method="POST">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option selected>Pilih Category</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>
                            <option value="Kebutuhan Primer">Kebutuhan Primer</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-100">
                Simpan
            </button>
        </form>
    </div>
</div>


<div class="card" style="width: 100%">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Category</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($produkList) > 0): ?>
                    <?php foreach ($produkList as $produk): ?>
                        <tr>
                            <td><? echo $key + 1 ?></td>
                            <td><?php echo htmlspecialchars($produk['nama_produk']); ?></td>
                            <td><?php echo htmlspecialchars($produk['harga']); ?></td>
                            <td><?php echo htmlspecialchars($produk['stok']); ?></td>
                            <td><?php echo htmlspecialchars($produk['category']); ?></td>
                            <td>
                                <a href="../controller/Request/deleteproduk.php?id=<?php echo $produk['id']; ?>" class="btn btn-sm btn-danger">X</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada produk yang tersedia</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card mt-4" style="width: 100%;">
    <div class="card-body">
        <h1>Cookie</h1>

        <form method="POST">
             <div class="mb-3">
                <input type="text" name="cookie" class="form-control">
            </div>
            <button class="btn btn-sm btn-primary" name="action" value="set">Set Cookie</button>
            <button class="btn btn-sm btn-success" name="action" value="get">Get Cookie</button>
            <button class="btn btn-sm btn-danger" name="action" value="delete">Delete Cookie</button>
            
            <?php if($coockie_val !== null): ?>
                <span class="mx-2">Cookie Value adalah : <?php echo $coockie_val?></span>
            <?php endif; ?>
        </form>
    </div>
</div>
</div>

<?php include('../layout/footer.php') ?>