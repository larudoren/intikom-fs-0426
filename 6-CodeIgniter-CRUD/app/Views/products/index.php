<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Product List</h1>
        <a href="<?= base_url('/products/create') ?>" class="btn btn-primary">+ Add Product</a>
    </div>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($product['name']) ?></h5>
                            <p class="card-text">Price: Rp<?= number_format($product['price'], 0) ?></p>
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('/products/edit/' . $product['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?= base_url('/products/delete/' . $product['id']) ?>" method="post" onsubmit="return confirm('Delete this product?')">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info">No products found. Create one!</div>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>