<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service\Produk\ProdukInterface;

class PageController extends Controller
{

    private $ServiceProduk;

    public function __construct(ProdukInterface $ServiceProduk)
    {
        $this->ServiceProduk = $ServiceProduk;
    }

    public function index()
    {
        $products = $this->ServiceProduk->Product()->get();
        return view('page.produk.card', compact('products'));
    }

    public function DetailProduk($id)
    {
        $product = $this->ServiceProduk->Product()->where('id', $id)->first();

        return view('page.produk.details', compact('product'));
    }
}
