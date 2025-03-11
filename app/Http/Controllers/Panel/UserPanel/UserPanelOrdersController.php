<?php namespace App\Http\Controllers\Panel\UserPanel;


use App\Models\Orders;
use App\Models\OrdersProducts;
use Main\Core\Controller;

class UserPanelOrdersController extends Controller
{

    public function ordersView()
    {
        if(!auth()->check())
            return redirect('/auth/sign-in');

        $userId = auth()->user()->id;

        $orders = (new Orders())
        ->where('user_id', $userId)
        ->select("user_id", "order_index as orderCode", "id", "status", "created_at", "close_at", "price")
        ->order('id', "DESC")
        ->get();



        if($orders)
        {
            $ordersWithProducts = [];
            foreach($orders as $order)
            {
                $orderId = $order->id;
                $ordersWithProducts[$orderId] = (object) get_object_vars($order);
                $ordersWithProducts[$orderId]->close_at = is_null($ordersWithProducts[$orderId]->close_at) ? "Not Closed" : $ordersWithProducts[$orderId]->close_at;
                $ordersProducts = [];
                $products = (new OrdersProducts())
                    ->join('products', "id", "orders_products.product_id")
                    ->where('orders_products.order_id', $orderId)
                    ->get();

                foreach($products as $product)
                {
                    $ordersProducts[$orderId][] = $product;
                }

                $ordersWithProducts[$orderId]->products = $ordersProducts[$orderId];
            }

        }else
        {
            $ordersWithProducts = false;
        }


        return $this->render('user.panel.orders.orders', [
            "orders" => $ordersWithProducts,
        ]);
    }
}