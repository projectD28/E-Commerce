<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Service\Produk\ProdukInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProdukController extends Controller
{

    private $ServiceProduk;

    public function __construct(ProdukInterface $ServiceProduk)
    {
        $this->ServiceProduk = $ServiceProduk;
    }

    public function index()
    {

        $products = $this->ServiceProduk->Product()->with('category')->paginate('10')->withQueryString();

        return view('page_admin.produk.produk', compact('products'));
    }

    public function PageTambahProduk()
    {
        $category = Category::all();

        return view('page_admin.produk.form_produk', compact('category'));
    }
    public function PageUbahProduk($id)
    {
        $category = Category::all();
        $products = $this->ServiceProduk->Product()->where("id", $id)->first();

        return view('page_admin.produk.form_produk_edit', compact('category', 'products'));
    }

    public function Store(Request $request)
    {
        $validated = $request->validate([
            'name_product' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'url_image' => 'required|image'
        ]);
        try {
            $this->ServiceProduk->AddProduct($validated);

            return redirect('/admin_produk')->with('success', 'Produk berhasil ditambah');
        } catch (\Throwable $th) {
            Log::info($th);
            return redirect('/admin_produk')->with('error', $th->getMessage());
        }
    }
    public function Edit(Request $request, $id)
    {
        $validated = $request->validate([
            'name_product' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'url_image' => 'required|image'
        ]);
        try {
            $this->ServiceProduk->AddProduct($validated, $id);

            return redirect('/admin_produk')->with('success', 'Produk berhasil ditambah');
        } catch (\Throwable $th) {
            Log::info($th);
            return redirect('/admin_produk')->with('error', $th->getMessage());
        }
    }
}
