@extends('page_admin.index')
@section('content')

<div class="tab-pane fade show active" id="product" role="tabpanel">
    <h4>Tambah Produk</h4>

    <form action="/admin/action_tambah_produk" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="NamaProduk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="NamaProduk" placeholder="Nama Produk" name="name_product" required>
        </div>

        <div class="mb-3">
            <label for="DeskripsiProduk" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" placeholder="Deskripsi" id="DeskripsiProduk" style="height: 100px"></textarea>
        </div>
        <div class="mb-3">
            <label for="QtyProduk" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="QtyProduk" placeholder="Jumlah" name="qty" required>
        </div>
        <div class="mb-3">
            <label for="Harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="Harga" placeholder="Harga" name="price" required>
        </div>
        <div class="mb-3">
            <label for="ImageUrl" class="form-label">Uploda Gambar</label>
            <input class="form-control" name="url_image" type="file" id="ImageUrl" required>
        </div>
        <button type="submit"  class="btn btn-primary mt-2 mb-2">Tambah Produk</button>
        <a type="button" href="/admin/daftar_produk"  class="btn btn-danger mt-2 mb-2">Kembali</a>

    </form>


</div>
@endsection
