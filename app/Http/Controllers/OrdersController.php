<?php

namespace App\Http\Controllers;

use App\Service\Order\OrderInterface;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{

    private $ServiceOrder;

    public function __construct(OrderInterface $ServiceOrder)
    {
        $this->ServiceOrder = $ServiceOrder;
    }

    public function ShowCart($userid)
    {
        $carts = $this->ServiceOrder->Cart()->with("product")->where("user_id", $userid)->get();


        return view("page.cart.cart", compact("carts"));
    }

    public function CountQtyProduct($userid)
    {
        $cart = $this->ServiceOrder->Cart()->where("user_id", $userid)->get();


        return $cart->sum("qty");
    }

    public function ChartProduct(Request $request)
    {
        try {
            $request->validate([
                "id" => "required|numeric",
                "qty" => "required|numeric"
            ]);

            $this->ServiceOrder->AddChart($request);

            return back();
        } catch (\Throwable $th) {
            Log::info($th);
        }
    }

    public function ActionDelete(Request $request)
    {
        $request->validate([
            "id" => "required|numeric",
        ]);

        $this->ServiceOrder->DeleteChart($request);

        return back();
    }

    public function PageCheckout($userid)
    {
        $CartCheckout = $this->ServiceOrder->Cart()->with("product")->where("user_id", $userid)->get();

        return view("page.checkout.checkout", compact("CartCheckout"));
    }

    public function Checkout(Request $request)
    {
        try {
            $request->validate([
                "id" => "required|array",
                "id*" => "required|string",
                "price" => "required|array",
                "price*" => "required|string",
                "qty" => "required|array",
                "qty*" => "required|string",
                "subtotal" => "required|array",
                "subtotal*" => "required|string",
            ]);

            $this->ServiceOrder->Checkout($request);

            return redirect('/');
        } catch (\Throwable $th) {
            return redirect('/');
            Log::info($th);
        }
    }
}
