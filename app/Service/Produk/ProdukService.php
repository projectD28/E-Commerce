<?php

namespace App\Service\Produk;


use App\Models\Products;
use App\Service\Produk\ProdukInterface as ProdukProdukInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\Uuid;

class ProdukService implements ProdukProdukInterface
{

    public function Product()
    {
        return $product = Products::query();
    }

    public function AddProduct($validated)
    {
        DB::transaction(function () use ($validated) {



            if ($validated['url_image']) {
                $image = Uuid::uuid4() . '.' . $validated['url_image']->extension();
                $imageurl = $validated['url_image']->storeAs("Produk", $image, 'public');
            }


            Products::create([
                'name_product' => $validated["name_product"],
                'description' => $validated["description"],
                'price' => $validated["price"],
                'qty' => $validated["qty"],
                'url_image' => $imageurl
            ]);
        });
    }
    public function UpdateProduct($validated, $id)
    {
        DB::transaction(function () use ($validated, $id) {


            $product = $this->Product()->where('id', $id)->first();

            $product->name_product = $validated['name_product'];
            $product->description = $validated['description'];
            $product->price = $validated['price'];
            $product->qty = $validated['qty'];

            if (isset($validated['url_image'])) {
                $image = Uuid::uuid4() .  '.' . $validated['url_image']->extension();
                $imageurl = $validated['url_image']->storeAs("Produk", $image, 'public');
                $product->url_image = $imageurl;
            }

            $product->update();
        });
    }

    public function DeleteProduct($id)
    {
        DB::transaction(function () use ($id) {
            $this->Product()->where("id", $id)->delete();
        });
    }
}
