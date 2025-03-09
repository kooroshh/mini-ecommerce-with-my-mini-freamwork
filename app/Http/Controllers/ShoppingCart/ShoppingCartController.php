<?php namespace App\Http\Controllers\ShoppingCart;

use App\Models\ShoppingCart;
use Main\Core\Controller;

class ShoppingCartController extends Controller
{

    public function view()
    {
        if(!auth()->check())
            return redirect('/auth/sign-in');

        $shoppingCartCount = (new ShoppingCart())
                            ->where('user_id', auth()->user()->id)
                            ->select('count(user_id) as count')
                            ->get()[0]->count;
                            

        $products = (new ShoppingCart())
                    ->join('products', "id", "shopping_cart.product_id")
                    ->where('user_id', auth()->user()->id)
                    ->select('products.count', "products.name", "products.image", "products.price", 'products.id')
                    ->get();

        $totalPrice = 0;

        foreach($products as $product)
        {
            $totalPrice += $product->price;
        }

        return $this->render('shopping-cart.shopping-cart', [
            "productCount" => $shoppingCartCount,
            "products" => $products,
            "totalPrice" => $totalPrice,
        ]);
    }

    public function add()
    {
        if(!auth()->check())
            return redirect('/auth/sign-in');

        $userId = auth()->user()->id;

        $validation = $this->validate(request()->all(),[
            "productId" => "required|existFalse:shopping_cart,product_id,user_id,$userId",
        ]);

        if ($validation->fails()) {
            return redirect("/shopping-cart");
        }
        
        $productId = $validation->getValidatedData()['productId'];
        (new ShoppingCart)->create([
            "product_id" => $productId,
            "user_id" => $userId,
        ]);

        return redirect('/shopping-cart');
    }

    public function remove()
    {
        if(!auth()->check())
            return redirect('/auth/sign-in');

        $userId = auth()->user()->id;

        $validation = $this->validate(request()->all(),[
            "productId" => "required|exist:shopping_cart,product_id,user_id,$userId",
        ]);

        if ($validation->fails()) {
            return redirect("/shopping-cart");
        }
        
        $productId = $validation->getValidatedData()['productId'];
        (new ShoppingCart)->deleteMultiple([
            "user_id" =>$userId,
            "product_id" => $productId
        ]);

        return redirect('/shopping-cart');
    }

}