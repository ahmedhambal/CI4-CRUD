<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <?= view('assets/bootstrap/bootstrap-min-css.html') ?>
</head>

<body>
    <?= view('ProductPG/navbar') ?>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                Edit Product
            </div>
            <div class="card-body">
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger pb-0">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif ?>
                <form action="/productPG/update" method="post">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="product_name" value="<?= $product->product_name; ?>">
                    </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" class="form-control" name="product_price" value="<?= $product->product_price; ?>">
                    </div>
                    <input type="hidden" name="product_id" value="<?= $product->product_id; ?>">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="card-footer">
                Page rendered in {elapsed_time} seconds
            </div>
        </div>
    </div>

    <?= view('assets/jquery.html') ?>
    <?= view('assets/popper.html') ?>
    <?= view('assets/bootstrap/bootstrap-min-js.html') ?>
</body>

</html>