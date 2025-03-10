<?php namespace App\Http\Controllers\Product;

use App\Models\Categories;
use App\Models\Products;
use Main\Core\Controller;


class ProductsController extends Controller
{

    public function productsView()
    {
        $productsIds = session()->flash('productsIds');

        if(is_null($productsIds))
        {
            $search = false;
            $lastCategories = false;
            $products = (new Products())
            ->select('image', "name", "description", "price", "count", "slug")
            ->get();
        }else
        {
            $products = [];
            $lastCategories = session()->flash('categories');
            $search = session()->flash('search');
            foreach($productsIds as $productId)
            {
                $product = (new Products())
                ->select('image', "name", "description", "price", "count", "slug")
                ->find($productId); 
                $products[] = $product;
            }
        }


        $categories = (new Categories())
                        ->select('name')
                        ->get();

        return $this->render('products.products', [
            "categories" => $categories,
            "products" => $products,
            "lastCategories" => $lastCategories,
            "search" => $search,
        ]);
    }

    public function filterProducts()
    {

        $filterMethod = request()->input('filter');
        $methods = ['filter', "search"];
        $result = true;

        foreach($methods as $method)
        {
            if($filterMethod == $method)
            {
                $result = false;
                break;
            }
        }

        if($result)
            return redirect('/products');

        if($filterMethod == "filter")
        {
            $data = request()->all();
            
            $validation = $this->validate($data, [
                "categories" => "required|array",
            ],[
                "categories:required" => "Please select at least one category",
                "categories:array" => "Wrong input",
            ]);

            if($validation->fails())
            {
                return redirect('/products');
            }

            $categories = $validation->getValidData()['categories'];
            $products = [];

            foreach($categories as $category)
            {
                $product = (new Products())
                ->join('products_categories', "product_id", "products.id")
                ->join('categories', "id", "products_categories.category_id")
                ->where("categories.name", $category)
                ->select('products.id as productId', "categories.name as categoryName")
                ->get();

                foreach($products as $value)
                {
                    foreach($value as $items)
                    {
                        foreach($product as $amount)
                        {
                            if($items->productId == $amount->productId)
                            {
                                $product = array_filter($product, fn($item) => $item->productId != $amount->productId);
                            }
                                                    
                        }
                    }
                }

                if($product)
                    $products[] = $product;
            }

            $productsIds = [];

            foreach($products as $productArray)
            {
                foreach($productArray as $product)
                {
                    $productsIds[] = $product->productId;
                }
            }

            session()->flash('productsIds', $productsIds);
            session()->flash('categories', $categories);

            return redirect('/products');

        }

        if($filterMethod == "search")
        {
            $data = request()->all();
            
            $validation = $this->validate($data, [
                "search" => "required",
            ],[
                "search:required" => "Search cant be empty",
            ]);

            if($validation->fails())
            {
                return redirect('/products');
            }

            $search = $validation->getValidatedData()['search'];
            
            $products = (new Products())
                        ->select('id as productId')
                        ->where('name', "%$search%", 'LIKE')
                        ->get();

            $productsIds = [];
            foreach($products as $product)
            {
                $productsIds[] = $product->productId;
            }
            

            session()->flash('productsIds', $productsIds);
            session()->flash("search", $search);
        
            return redirect('/products');

        }

    }

}