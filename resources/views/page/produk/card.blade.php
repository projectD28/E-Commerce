@extends('page.index')

@section('content-product')
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-4 mt-4" id="product-list">
        <div class="card shadow-lg rounded-3">

                <a href="/detail_produk/{{$product->id}}">
                    <img src="{{asset('storage/'.$product->url_image)}}"   class="card-img-top" alt="Product A">
                </a>

            <div class="card-body">
                <h5 class="card-title">{{$product->name_product}}</h5>
                <p class="card-text text-muted">Rp.{{number_format($product->price)}}</p>
                <form action="/cart" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="qty" value="1">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-cart-fill"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection

