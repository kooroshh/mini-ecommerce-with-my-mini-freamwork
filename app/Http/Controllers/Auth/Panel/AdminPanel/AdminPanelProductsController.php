<?php namespace App\Http\Controllers\Auth\Panel\AdminPanel;

use App\Models\Products;
use App\Models\ProductsCategories;
use App\Models\User;
use Main\Core\Controller;

class AdminPanelProductsController extends Controller
{
    public function panelView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $products = (new Products())->get();
        $productsWithCategories = [];

        foreach($products as $product)
        {
            $productsWithCategories[$product->id] = (object) get_object_vars($product);
            $categories = (new ProductsCategories())->join('categories', "id","products_categories.category_id")->where('products_categories.product_id', $product->id)->get();
            $categories = array_map(fn($item) => $item->name, $categories);
            $productsWithCategories[$product->id]->categories = $categories;
        }
        return $this->render("user.admin-panel.products.admin-panel-products",[
            "products" => $productsWithCategories,
        ]);
    }

    
    public function deleteProductView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $productId = request()->input('id');
        $product = (new Products())->select("slug")->find($productId);
        
        return $this->render("user.admin-panel.products.admin-panel-products-delete",[
            "productSlug" => $product->slug,
            "productId" => $productId,
        ]);
    }
    
    public function deleteProduct()
    {


        if(!isAdmin())
            return $this->render("errors.404");


        $data = request()->all();


        $categories = (new ProductsCategories())->where('product_id', $data['productId'])->get();
        


        foreach($categories as $category)
        {
            (new ProductsCategories())->delete($category->product_id,"product_id");
        }

        (new Products())->delete($data['productId']);
        
        return redirect("/admin-panel/products");
    }



}