<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <div class="container py-5">
        <header class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="text-center">Product Catalog</h1>
            <div>
                <button class="btn btn-outline-primary me-2">
                    <i class="bi bi-person"></i> Login
                </button>
                <button class="btn btn-outline-primary position-relative">
                    <i class="bi bi-cart-fill"></i> Cart
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        0
                    </span>
                </button>
            </div>
        </header>
        <div class="row">
            <div class="col-md-4" id="product-list">
                <div class="card shadow-lg rounded-3">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product A">
                    <div class="card-body">
                        <h5 class="card-title">Product A</h5>
                        <p class="card-text text-muted">$20</p>
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-cart-fill"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg rounded-3">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product B">
                    <div class="card-body">
                        <h5 class="card-title">Product B</h5>
                        <p class="card-text text-muted">$30</p>
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-cart-fill"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg rounded-3">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product C">
                    <div class="card-body">
                        <h5 class="card-title">Product C</h5>
                        <p class="card-text text-muted">$25</p>
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-cart-fill"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
