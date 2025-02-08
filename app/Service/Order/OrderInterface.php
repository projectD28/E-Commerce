<?php

namespace App\Service\Order;


interface OrderInterface
{
    public function Cart();
    public function AddChart($request);
    public function DeleteChart($request);
    public function Checkout($request);
}
