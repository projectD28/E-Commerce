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

    <a type="button" href="/tambah_produk" class="btn btn-primary mt-2 mb-2">Tambah Produk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
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
                    <td>{{$product->category->name_category}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}</td>
                    <td><img src="{{asset('storage/'.$product->url_image)}}" ></td>
                    <td>
                        <a href="/ubah_produk/{{$product->id}}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
