@extends('page_admin.index')
@section('content')
<div class="tab-pane fade show active" id="product" role="tabpanel">
    @if ($message = Session::get("success"))
    <div class="alert alert-primary" role="alert">
        {{$message}}
      </div>

    @endif
    @if ($message = Session::get("error"))
    <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>

    @endif
    <h4>Daftar Produk</h4>

    <a type="button" href="/admin/tambah_produk" class="btn btn-primary mt-2 mb-2">Tambah Produk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product )
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name_product}}</td>
                    <td>{{$product->qty}}</td>
                    <td>Rp. {{number_format($product->price)}}</td>
                    <td><img src="{{asset('storage/'.$product->url_image)}}" width="200"></td>
                    <td>
                        <a href="/admin/ubah_produk/{{$product->id}}" class="btn btn-warning btn-sm" >Edit</a>
                        <form method="POST" action="/admin/action_delete">
                            @csrf
                            @method("delete")
                            <input type="hidden" value="{{$product->id}}" name="id">
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
