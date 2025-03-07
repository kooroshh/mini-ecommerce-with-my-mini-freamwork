<?php namespace App\Http\Controllers\Panel\AdminPanel;


use App\Models\Comments;
use App\Models\Orders;
use App\Models\ShoppingCart;
use Main\Core\Controller;

class AdminPanelOrdersController extends Controller
{

    public function panelView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $orders = (new Orders())
                ->join('users', "id", "orders.user_id")
                ->select("users.id", 'users.image', "users.email", "orders.status", "orders.created_at", "orders.close_at", "orders.price")
                ->get();

        $ordersWithProducts = [];
        foreach($orders as $order)
        {
            $userId = $order->id;
            $ordersWithProducts[$userId] = (object) get_object_vars($order);
            $ordersWithProducts[$userId]->close_at = is_null($ordersWithProducts[$userId]->close_at) ? "Not Closed" : $ordersWithProducts[$userId]->close_at;
            $ordersProducts = [];
            $products = (new ShoppingCart)
                ->join('products', "id", "shopping_cart.product_id")
                ->where('shopping_cart.user_id', $userId)
                ->select("products.slug")
                ->get();
          
            foreach($products as $product)
            {
                $ordersProducts[$userId][] = $product->slug;
            }
            $ordersWithProducts[$userId]->productsSlugs = $ordersProducts[$userId];

   
        }


        return $this->render("user.admin-panel.orders.admin-panel-orders",[
            "orders" => $ordersWithProducts
        ]);
    }



}