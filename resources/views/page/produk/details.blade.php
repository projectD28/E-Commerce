@extends('page.index')
@section('content-product')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$product->name_product}}</li>
    </ol>
  </nav>
<div class="row">
    <div class="col-md-6">
        <img src="{{asset('storage/'.$product->url_image)}}" class="img-fluid rounded" alt="Product Detail">
    </div>
    <div class="col-md-6">
        <h2>{{$product->name_product}}</h2>
        <p class="text-muted">Rp.{{number_format($product->price)}}</p>
        <p>{{$product->description}}</p>
        <form action="/cart" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <div class="d-flex align-items-center mb-3">
                <label for="quantity" class="me-2">Quantity:</label>
                <input type="number" name="qty" id="quantity" class="form-control w-25" min="1" max="{{$product->qty}}" value="1">
            </div>
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-cart-fill"></i> Add to Cart
            </button>
        </form>
    </div>
</div>
@endsection
