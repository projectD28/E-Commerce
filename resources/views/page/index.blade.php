<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
          .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

    </style>
</head>
<body>
    <div class="container py-5">
        <header class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="text-center">Product Catalog</h1>
            <div>
                <button class="btn btn-outline-primary me-2">
                    <i class="bi bi-person"></i> Login
                </button>
                <a href="/show_cart/1" class="btn btn-outline-primary position-relative">
                    <i class="bi bi-cart-fill"></i> Cart

                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger CountQty">

                    </span>
                </a>
            </div>
        </header>
        @yield('content-product')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
       $.ajax({
            url: "/total_item/1",
            type: "GET",
            success: function(response) {
                $(".CountQty").html(response);
            },
            error: function() {
                $(".CountQty").html(0);
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
