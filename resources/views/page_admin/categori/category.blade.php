@extends('page_admin.index')
@section('content')
<div class="tab-pane fade" id="category" role="tabpanel">
    <h4>Daftar Kategori</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Elektronik</td>
                <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
