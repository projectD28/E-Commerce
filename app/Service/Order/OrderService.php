<?php

namespace App\Service\Order;

use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use App\Service\Order\OrderInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\Uuid;

class OrderService implements OrderInterface
{

    public function Cart()
    {
        return $cart = Cart::query();
    }
    public function Order()
    {
        return $cart = Orders::query();
    }
    public function OrderList()
    {
        return $cart = OrderDetails::query();
    }


    public function AddChart($request)
    {
        DB::transaction(function () use ($request) {
            $UpdateCart = $this->Cart()->where("user_id", 1)->where("product_id", $request["id"])->first();
            if (isset($UpdateCart)) {
                $UpdateCart->qty += $request["qty"];
                $UpdateCart->update();
            } else {
                $this->Cart()->updateOrCreate([
                    "user_id" => 1,
                    "product_id" => $request["id"],
                    "qty" => $request["qty"],
                ]);
            }
        });
    }


    public function DeleteChart($request)
    {
        DB::transaction(function () use ($request) {
            $this->Cart()->where("id", $request->id)->delete();
        });
    }

    public function Checkout($request)
    {
        // DB::transaction(function () use ($request) {
        //     $id = $request->input('id');
        //     $price = $request->input("'price");
        //     $qty = $request->input("qty");
        //     $total = $request->input("subtotal");

        //     $order = $this->Order()->where('id',)

        //     for ($i = 0; $i < count($id); $i++) {

        //     }
        //     dd($request->input('id'));
        //     // $this->Order()->
        // });
    }
}
