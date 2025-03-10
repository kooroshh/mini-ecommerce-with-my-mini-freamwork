<?php namespace App\Http\Controllers\Home;

use App\Models\Categories;
use App\Models\Products;
use Main\Core\Controller;

class HomeController extends Controller
{

    public function homeView()
    {
        $categories = (new Categories())
                        ->select('name')
                        ->limit(4)
                        ->get();

        $products = (new Products)
                    ->select('name', "slug", "price", 'image')
                    ->limit(3)
                    ->get();

        return $this->render('home.home', [
            "categories" => $categories,
            "products" => $products
        ]);
    }

}