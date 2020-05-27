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
    <?= isset($validation) ? $validation->listErrors() : ''; ?>
    <form action="/productFVB/save" method="post">
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

    <?= view('assets/jquery.html') ?>
    <?= view('assets/popper.html') ?>
    <?= view('assets/bootstrap/bootstrap-min-js.html') ?>
</body>

</html>