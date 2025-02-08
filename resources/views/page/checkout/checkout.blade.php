@extends('page.index')
@section('content')
<<div class="container py-5">
    <h2 class="mb-4 text-center">Checkout</h2>

    <div class="row">
        <!-- Formulir Checkout -->
        <div class="col-md-7">
            <div class="card p-4">
                <h4 class="mb-3">Billing Details</h4>
                <form action="/checkout_process" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Shipping Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="payment" class="form-label">Payment Method</label>
                        <select class="form-select" id="payment" name="payment" required>
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="cod">Cash on Delivery</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Ringkasan Pesanan -->
        <div class="col-md-5">
            <div class="card p-4">
                <h4 class="mb-3">Order Summary</h4>
                <table class="table">
                    <tbody>
                        @foreach ($CartCheckout as $item)
                        <tr>
                            <td><img src="{{ asset('storage/'.$item->product->url_image) }}" class="product-img me-2"></td>
                            <td>{{ $item->product->name_product }}</td>
                            <td>{{ $item->qty }}x</td>
                            <td>${{ number_format($item->product->price * $item->qty, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <h5 class="text-end">Total: <strong>${{ number_format($total_price, 2) }}</strong></h5>
                <button type="submit" class="btn btn-success w-100 mt-3">Place Order</button>
            </div>
        </div>
    </div>
</div>
@endsection
