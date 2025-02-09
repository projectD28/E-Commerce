<?php

namespace App\Service\Order;

use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use App\Service\Order\OrderInterface;
use Carbon\Carbon;
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
        DB::transaction(function () use ($request) {

            $order = $this->Order()->create([
                "user_id" => $request->id,
                "name" => $request->fullname,
                "email" => $request->email,
                "address" => $request->address,
                "phone" => $request->phone,
                "payment_method" => $request->payment,
                "date_order" => Carbon::now(),
                "total_price" => $request->total_price,
                "status" => "Order",
            ]);

            $cart = $this->Cart()->with("product")->where("user_id", $request->id)->get();


            foreach ($cart as $key => $value) {
                $subtotal = $value->qty * $value->product->price;
                $uniteprice = $value->product->price;
                $this->OrderList()->create([
                    'order_id' => $order->id,
                    'product_id' => $value->product_id,
                    'qty' => $value->qty,
                    'unit_price' => $uniteprice,
                    'subtotal' => $subtotal
                ]);

                $value->delete();
            }
        });
    }
}
