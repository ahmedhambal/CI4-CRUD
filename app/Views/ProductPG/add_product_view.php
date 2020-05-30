<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product</title>
    <?= view('assets/bootstrap/bootstrap-min-css.html') ?>
</head>

<body>
    <?= view('ProductPG/navbar') ?>
    <div class="container-fluid">
        <div class="card shadows-sm">
            <div class="card-header">
                Add New Product
            </div>
            <div class="card-body">
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger pb-0">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif ?>
                <form action="/productPG/save" method="post">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="product_name">
                    </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" class="form-control" name="product_price">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
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