@extends('page.index')
@section('content-product')
<div class="card p-4">
    <h3 class="mb-3">Your Cart</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
      </nav>

      {{-- <form action="/checkout" method="post"> --}}
        {{-- @csrf --}}

          <table class="table">
              <thead>
                  <tr>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($carts as $key => $item)
                  <tr class="cart-item">
                        <input type="hidden" name="id[]" value="{{$item->id}}">
                      <td class="d-flex align-items-center" order-item="{{$key}}">
                          <img src="{{asset("storage/".$item->product->url_image)}}" width="200" class="me-2" alt="Product A">
                          {{$item->name_product}}
                      </td>
                      <td><input type="text" name="price[]" value="{{number_format($item->product->price)}}" order-item="{{$key}}" class="price{{$key}}" readonly style="border: none"></td>
                      <td><input type="number" name="qty[]" class="form-control w-50" id="qty{{$key}}" value="{{$item->qty}}" min="1" max="{{$item->product->qty}}"></td>
                      <td><input type="text" value="" name="subtotal[]" class="Subtotal{{$key}} sub-total" readonly style="border: none"></td>

                      <td><button type="button" class="btn btn-danger btn-sm delete-item"
                          data-id="{{$item->id}}">
                      <i class="bi bi-trash"></i>
                  </button></td>
                  </tr>
                 @endforeach
              </tbody>
          </table>
          <div class="text-end">
              <h4 class="Total">0</h4>
              <a href="/checkout/1" class="btn btn-primary mt-3 w-100"> <i class="bi bi-cart-fill"></i> Checkout</a>
          </div>

      {{-- </form> --}}

</div>
@endsection
@push('scripts')
    <script>

    $(document).on("input", "input[id^='qty']", function () {
        let key = $(this).attr("id").replace("qty", "");
        let priceInput = $(`.price${key}`);
        let price = priceInput.val().replace(/,/g, '');
        let qty = $(this).val();
        let SubTotal = $(`.Subtotal${key}`);


        if (price && qty) {
            let Total = price * qty;
            SubTotal.val(Total.toLocaleString());
            updateTotalPrice();
        }
    });


    function updateTotalPrice() {
        let PriceTotal = 0;
        $(".sub-total").each(function () {
            let subTotalValue = $(this).val().replace(/,/g, '');
            if (subTotalValue) {
                PriceTotal += Number(subTotalValue);
            }
        });

        $(".Total").html(PriceTotal.toLocaleString());
    }

    $(document).ready(function () {
        $("input[id^='qty']").each(function () {
            $(this).trigger("input");
        });
    });


    $(".delete-item").click(function () {
        let itemId = $(this).data("id");
        let row = $(this).closest("tr");

        $.ajax({
            url: "/cart_delete",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: itemId
            },
            success: function (response) {
                row.remove();
                updateTotalPrice();
                window.location.reload(true);
            }
        });
    });

    </script>
@endpush
