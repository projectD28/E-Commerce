<?php

namespace App\Http\Controllers;

use App\Livewire\Forms\LoginForm;
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

        $products = $this->ServiceProduk->Product()->paginate('10')->withQueryString();

        return view('page_admin.produk.produk', compact('products'));
    }

    public function PageTambahProduk()
    {
        return view('page_admin.produk.form_produk');
    }
    public function PageUbahProduk($id)
    {
        $products = $this->ServiceProduk->Product()->where("id", $id)->first();

        return view('page_admin.produk.form_produk_edit', compact('products'));
    }

    public function Store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name_product' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'qty' => 'required|numeric',
                'url_image' => 'required|image'
            ]);
            $this->ServiceProduk->AddProduct($validated);

            return redirect('/admin/daftar_produk')->with('success', 'Produk berhasil ditambah');
        } catch (\Throwable $th) {
            Log::info($th);
            return redirect('/admin/daftar_produk')->with('error', $th->getMessage());
        }
    }
    public function Edit(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name_product' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'qty' => 'required|numeric',
                'url_image' => 'nullable|image'
            ]);
            $this->ServiceProduk->UpdateProduct($validated, $id);

            return redirect('/admin/daftar_produk')->with('success', 'Produk berhasil diubah');
        } catch (\Throwable $th) {
            Log::info($th);
            return redirect('/admin/daftar_produk')->with('error', $th->getMessage());
        }
    }

    public function Delete(Request $request)
    {
        try {
            $this->ServiceProduk->DeleteProduct($request->id);
            return back()->with('success', "Produk berhasil didelete");
        } catch (\Throwable $th) {
            Log::info($th);
            return redirect('/admin/daftar_produk')->with('error', $th->getMessage());
        }
    }

   
}
