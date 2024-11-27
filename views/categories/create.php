<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include '../views/navbar.php'; ?>
    <div class="container">
        <div class="row py-2 justify-content-center h5">
            Add New Category
        </div>
        <div class="row">
            <div class="col-md-6 m-auto">
                <form action="/categories/store" method="post">
                    <div class="mb-3">
                        <label for="nume">Category Name</label>
                        <input type="text" name="nume" id="nume" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-dark btn-sm">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>