<?php namespace App\Http\Controllers\Checkout;

use App\Models\Orders;
use App\Models\OrdersProducts;
use App\Models\ShoppingCart;
use Main\Core\Controller;


class CheckoutController extends Controller
{
 
    public function checkoutView()
    {
        if(!auth()->check())
            return redirect('auth/sign-in');

        $userId = auth()->user()->id;
        $data = request()->all() == [] ? session()->flash('orderCode') != null ? [
            "orderCode" => session()->flash('orderCode'),
        ] : [] : request()->all();
        session()->flash('orderCode', session()->flash('orderCode'));
        $validation = $this->validate($data,[
            "orderCode" => "required|max:20|exist:orders,order_index,user_id,$userId",
        ]);
        if ($validation->fails())
        {
            $products = (new ShoppingCart())
                        ->join('products', "id", "shopping_cart.product_id")
                        ->where('user_id', $userId)
                        ->select('products.id', "products.price", "products.name", "products.image", "products.count")
                        ->get() ?? [];

            $products = array_filter($products, fn($item) => $item->count > 0);
            
            if(!$products)
                return redirect('/shopping-cart');

            (new ShoppingCart())->delete($userId, 'user_id');

            $totalPrice = 0;

            foreach($products as $product)
            {
                $totalPrice += $product->price;
            }
            $orderWithIndex = true;
            while($orderWithIndex)
            {
                $orderIndex = bin2hex(random_bytes(length: 4));
                $orderWithIndex = (new Orders())->find($orderIndex, 'order_index');
                if($orderWithIndex != false)
                    $orderWithIndex = true;
            }

            (new Orders())->create([
                'user_id' => $userId,
                "price" => $totalPrice,
                "order_index" => $orderIndex,
            ]);

            $orderId = (new Orders())
                        ->select('id')
                        ->find($orderIndex, "order_index")->id;

            foreach ($products as $product)
            {
                (new OrdersProducts())->create([
                    'product_id' => $product->id,
                    "order_id" => $orderId
                ]);
            }

            session()->flash('orderCode', $orderIndex);

            return $this->render('checkout.checkout', [
                "products" => $products,
                "totalPrice" => $totalPrice,
                "orderCode" => $orderIndex,
            ]);

        }

        $orderCode = $validation->getValidatedData()['orderCode'];

        $products = (new OrdersProducts())
                    ->join('orders', "id", "orders_products.order_id")
                    ->join("products", "id", "orders_products.product_id")
                    ->where('orders.user_id', $userId)
                    ->where("orders.order_index", $orderCode)
                    ->select('products.id', "products.price", "products.name", "products.image", "products.count")
                    ->get() ?? [];

        $totalPrice = 0;

        foreach($products as $product)
        {
            $totalPrice += $product->price;
        }

        return $this->render('checkout.checkout', [
            "products" => $products,
            "totalPrice" => $totalPrice,
            "orderCode" => $orderCode
        ]);

    }

    public function pay()
    {
        if(!auth()->check())
            return redirect('auth/sign-in');

        $orderCode = request()->input("orderCode");

        if(!$orderCode)
            redirect("/shopping-cart");

        $validation = $this->validate([], [
            "error" => "required|min:999999"
        ],[
            "error" => "Sorry but we do not have any payment yet!"
        ]);

        if($validation->fails())
        {
            return redirect("/checkout?orderCode=$orderCode");
        }

    }


    public function paid()
    {
        if(!auth()->check())
            return redirect('auth/sign-in');

        $userId = auth()->user()->id;

        $orderCode = request()->input("orderCode");

        if(!$orderCode)
            redirect("/shopping-cart");

        $order = (new Orders())
                ->where('user_id', $userId)
                ->find($orderCode, "order_index");

        $orderId = $order->id;

        if(!$orderId)
            redirect("/shopping-cart");

        $date = date("Y-m-d H-i-s");

        $orderStatus = $order->status;

        if($orderStatus != "paying")
        {
            return redirect('/shopping-cart');
        }

        (new Orders())->update($orderCode, [
            "status" => "paid",
            "close_at" => $date
        ], "order_index");

        dd("thank you");
        

    }

    public function cancel()
    {
        if(!auth()->check())
            return redirect('auth/sign-in');

        $userId = auth()->user()->id;

        $orderCode = request()->input("orderCode");

        if(!$orderCode)
            redirect("/shopping-cart");

        $order = (new Orders())
                ->where('user_id', $userId)
                ->find($orderCode, "order_index");

        $orderId = $order->id;

        if(!$orderId)
            redirect("/shopping-cart");

        $date = date("Y-m-d H-i-s");

        $orderStatus = $order->status;

        if($orderStatus != "paying")
        {
            return redirect('/shopping-cart');
        }

        (new Orders())->update($orderCode, [
            "status" => "cancelled",
            "close_at" => $date
        ], "order_index");

        dd("Canceled");
        

    }
    
    
}