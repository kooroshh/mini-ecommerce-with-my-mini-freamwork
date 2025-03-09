<?php namespace App\Http\Controllers\Panel\AdminPanel;



use App\Models\Orders;
use App\Models\OrdersProducts;
use Main\Core\Controller;

class AdminPanelOrdersController extends Controller
{

    public function panelView()
    {

        if(!isAdmin())
            return $this->render("errors.404");

        $orders = (new Orders())
                ->join('users', "id", "orders.user_id")
                ->select("users.id", "orders.order_index as orderCode", "orders.id as orderId", 'users.image', "users.email", "orders.status", "orders.created_at", "orders.close_at", "orders.price")
                ->get();

        $ordersWithProducts = [];
        foreach($orders as $order)
        {
            $userId = $order->id;
            $orderId = $order->orderId;
            $ordersWithProducts[$orderId] = (object) get_object_vars($order);
            $ordersWithProducts[$orderId]->close_at = is_null($ordersWithProducts[$orderId]->close_at) ? "Not Closed" : $ordersWithProducts[$orderId]->close_at;
            $ordersProducts = [];
            $products = (new OrdersProducts())
                ->join('products', "id", "orders_products.product_id")
                ->where('orders_products.order_id', $orderId)
                ->select("products.slug")
                ->get();
            
            
          
            foreach($products as $product)
            {
                $ordersProducts[$orderId][] = $product->slug;
            }
            $ordersWithProducts[$orderId]->productsSlugs = $ordersProducts[$orderId];

   
        }


        return $this->render("user.admin-panel.orders.admin-panel-orders",[
            "orders" => $ordersWithProducts
        ]);
    }



}