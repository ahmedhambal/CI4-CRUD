<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <?= view('assets/bootstrap/bootstrap-min-css.html') ?>
</head>

<body>
    <?= view('ProductPG/navbar') ?>

    <div class="container-fluid">
        <div class="card bg-light shadow-sm">
            <div class="card-header">
                Product
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                            <div class="alert alert-success">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <a href="/productPG/add_new" class="btn btn-primary mb-3">Add New</a>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <form action="/productPG" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search keyword ... " name="keyword" autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <input class="btn btn-outline-secondary" type="submit" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product as $row) : ?>
                            <tr>
                                <td><?= $row['product_name']; ?></td>
                                <td><?= $row['product_price']; ?></td>
                                <td>
                                    <a href="/productPG/edit/<?= $row['product_id']; ?>">Edit</a>
                                    <a href="/productPG/delete/<?= $row['product_id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php echo $pager->links('product', 'bootstrap_pagination') ?>
            </div>
            <div class="card-footer text-center text-muted">
                Page rendered in {elapsed_time} seconds
            </div>
        </div>
    </div>

    <?= view('assets/jquery.html') ?>
    <?= view('assets/popper.html') ?>
    <?= view('assets/bootstrap/bootstrap-min-js.html') ?>
</body>

</html>