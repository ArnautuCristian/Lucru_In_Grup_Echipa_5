<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include '../views/nav.view.php' ?>
    <div class="container">
        <div class="row py-2 justify-content-center h5">
            Add New Product
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="/products/store" method="post">
                    <div class="mb-3">
                        <label for="nume">Name</label>
                        <input type="text" name="nume" id="nume" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="descriere">Description</label>
                        <textarea name="descriere" id="descriere" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pret">Price</label>
                        <input type="number" name="pret" id="pret" class="form-control" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="stoc">Stock</label>
                        <input type="number" name="stoc" id="stoc" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="categorie_id">Category</label>
                        <select name="categorie_id" id="categorie_id" class="form-select" required>
                            <!-- Exemplu de opțiuni - înlocuiește cu datele din baza de date -->
                            <option value="1">Electronics</option>
                            <option value="2">Clothing</option>
                            <option value="3">Home & Kitchen</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="culoare">Color</label>
                        <input type="text" name="culoare" id="culoare" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="marime">Size</label>
                        <input type="text" name="marime" id="marime" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="colectie">Collection</label>
                        <input type="text" name="colectie" id="colectie" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark btn-sm">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
