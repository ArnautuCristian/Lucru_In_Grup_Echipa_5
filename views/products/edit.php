<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php include '../views/navbar.php'; ?>
    <div class="container">
        <div class="row py-2 justify-content-center h5">
            Edit Product
        </div>
        <div class="row">
            <div class="col-md-6 m-auto">
                <form action="/products/update/<?= $product->id ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_METHOD" value="PUT" />
                    <div class="mb-3">
                        <label for="nume">Name</label>
                        <input type="text" name="nume" id="nume" class="form-control" value="<?= $product->nume ?>"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="descriere">Description</label>
                        <textarea name="descriere" id="descriere" class="form-control"
                            required><?= $product->descriere ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pret">Price</label>
                        <input type="number" name="pret" id="pret" class="form-control" step="0.01"
                            value="<?= $product->pret ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="stoc">Stock</label>
                        <input type="number" name="stoc" id="stoc" class="form-control" value="<?= $product->stoc ?>"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="categorie_id">Category</label>
                        <select name="categorie_id" id="categorie_id" class="form-select" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>" <?= $product->categorie_id == $category->id ? 'selected' : '' ?>>
                                    <?= $category->nume ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="culoare">Color</label>
                        <input type="text" name="culoare" id="culoare" class="form-control"
                            value="<?= $product->culoare ?>">
                    </div>
                    <div class="mb-3">
                        <label for="marime">Size</label>
                        <input type="text" name="marime" id="marime" class="form-control"
                            value="<?= $product->marime ?>">
                    </div>
                    <div class="mb-3">
                        <label for="colectie">Collection</label>
                        <input type="text" name="colectie" id="colectie" class="form-control"
                            value="<?= $product->colectie ?>">
                    </div>

                    <button type="submit" class="btn btn-dark btn-sm">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>