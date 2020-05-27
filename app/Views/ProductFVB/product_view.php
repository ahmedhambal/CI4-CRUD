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
    <p>Page rendered in {elapsed_time} seconds</p>
    <a href="/productFVB/add_new" class="btn btn-primary mb-3">Add New</a>
    <table class="table">
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
                        <a href="/productFVB/edit/<?= $row['product_id']; ?>">Edit</a>
                        <a href="/productFVB/delete/<?= $row['product_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= view('assets/jquery.html') ?>
    <?= view('assets/popper.html') ?>
    <?= view('assets/bootstrap/bootstrap-min-js.html') ?>
</body>

</html>