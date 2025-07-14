<?php 
include_once "../inc/fn.php";

$DATA = isset($_POST["categorie"]) ? getPublicationByCategory($_POST["categorie"]) : getPublication();
$DATAcat = getCategories();
?>

<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

<style>
    body {
  background-color: #f2f2f2;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  color: #333333;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 1140px;
  margin: 0 auto;
  padding: 0 20px;
}

.text-center {
  text-align: center;
}

.mb-5 {
  margin-bottom: 40px;
}

.mt-3 {
  margin-top: 24px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin-left: -12px;
  margin-right: -12px;
}

.col-sm-6,
.col-md-4,
.col-lg-3 {
  width: 100%;
  padding: 12px;
}

@media (min-width: 576px) {
  .col-sm-6 {
    width: 50%;
  }
}

@media (min-width: 768px) {
  .col-md-4 {
    width: 33.3333%;
  }
}

@media (min-width: 992px) {
  .col-lg-3 {
    width: 25%;
  }
}

.product-card {
  background-color: #ffffff;
  border-radius: 10px;
  padding: 20px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08);
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.product-card:hover {
  transform: translateY(-6px);
  box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.15);
}

.card-title {
  font-size: 20px;
  font-weight: bold;
  color: #1a1a1a;
  margin-bottom: 12px;
}

.badge {
  background-color: #ffb347;
  color: #ffffff;
  font-size: 12px;
  padding: 6px 10px;
  border-radius: 4px;
  display: inline-block;
  margin-bottom: 8px;
}

.btn {
  display: inline-block;
  padding: 10px 16px;
  font-size: 14px;
  font-weight: 600;
  text-align: center;
  background-color: #007bff;
  color: #ffffff;
  border: none;
  border-radius: 6px;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  width: 100%;
}

.btn:hover {
  background-color: #0056b3;
  box-shadow: 0px 6px 12px rgba(0, 91, 187, 0.3);
}

.alert {
  background-color: #fff3cd;
  color: #856404;
  padding: 16px;
  border-radius: 6px;
  border: 1px solid #ffeeba;
}

</style>
<div class="container my-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-dark">Browse Products</h1>
        <p class="text-muted fs-5">Find what you need among the latest publications</p>
    </div>

    <form action="./index.php?page=home" method="POST" class="row g-3 align-items-end mb-5">
        <div class="col-sm-8 col-md-6 col-lg-4">
            <label for="categorie" class="form-label fw-semibold">Category</label>
            <select name="categorie" id="categorie" class="form-select">
                <option value="">All Categories</option>
                <?php foreach ($DATAcat as $cat): ?>
                    <option value="<?= htmlspecialchars($cat['id_categorie']) ?>">
                        <?= htmlspecialchars($cat['nom_categorie']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-dark px-4">
                Filter
            </button>
        </div>
    </form>

    <div class="row g-4">
        <?php if ($DATA): ?>
            <?php foreach ($DATA as $publication): ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <div class="mb-2 text-muted small text-end">
                                <span class="badge bg-secondary"><?= htmlspecialchars($publication['objet_categorie']) ?></span>
                            </div>
                            <h5 class="card-title text-dark"><?= htmlspecialchars($publication['nom_objet']) ?></h5>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-outline-dark btn-sm w-100 mt-3">View Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No publications found.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>


