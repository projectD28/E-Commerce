<?php

namespace App\Service\Produk;


interface ProdukInterface
{
    public function Product();
    public function AddProduct($validated);
    public function UpdateProduct($validated, $id);
    public function DeleteProduct($id);
}
