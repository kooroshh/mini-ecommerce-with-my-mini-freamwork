<?php namespace App\Http\Controllers\Panel\AdminPanel;

use App\Models\Categories;
use App\Models\Orders;
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

        if(!$productId)
            return redirect('/admin-panel/products');

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
        $userId = auth()->user()->id;


        $productId = request()->input("productId");
        if(!$productId)
            return redirect('/admin-panel/products');


        $categories = (new ProductsCategories())->where('product_id', $productId)->get();
        $orders = (new Orders())
                    ->join('orders_products', "order_id", "orders.id")
                    ->where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->select('orders.id as orderId')
                    ->get();


        foreach($categories as $category)
        {
            (new ProductsCategories())->delete($category->product_id,"product_id");
        }

        foreach($orders as $order)
        {
            (new Orders())->delete($order->orderId);
        }

        (new Products())->delete($productId);
        
        return redirect("/admin-panel/products");
    }

        
    public function editProductView()
    {
        
        if(!isAdmin())
            return $this->render("errors.404");

        $productId = request()->input('id');

        if(!$productId)
            return redirect('/admin-panel/products');

        $product = (new Products())->select("id", 'name', "slug", "image", "description", "price", "count")->find($productId);

        if(!$product)
            return redirect("/admin-panel/products");

        $productCategories = (new ProductsCategories())->join('categories', "id","products_categories.category_id")->where('products_categories.product_id', $productId)->get();
        $productCategories = array_map(fn($item) => $item->name, $productCategories);
        $productWithCategories = (object) get_object_vars($product);
        $productWithCategories->categories = $productCategories;

        $categories = (new Categories())->select("name")->get();
        $oldCategories = $productWithCategories->categories ?? [];

        return $this->render("user.admin-panel.products.admin-panel-products-edit",[
            "product" => $productWithCategories,
            'categories' => $categories,
            "oldCategories" => $oldCategories
        ]);
    }

    public function editProduct()
    {

        if(!isAdmin())
            return $this->render("errors.404");

            
        $productId = request()->input('id');

        if(!$productId)
            return redirect('/admin-panel/products');

        $data = request()->all();

        $productSlug = (new Products())->select('slug')->find($productId)->slug;
        if($data['slug'] == $productSlug)
        {
            while($data['slug'] == $productSlug)
            {
                $data['slug'] = bin2hex(random_bytes(10));
            }
        }


        $validation = $this->validate($data + $_FILES,[
            "name" => "required|min:5|max:255",
            "slug" => "required|max:255|min:5|unique:products,slug",
            "description" => "required|min:5",
            "price" => "required|numeric",
            "count" => "required|numeric",
            "categories" => "required|array",
            "image" => "uploaded_file:0,500K,png,jpeg,jpg",
        ],[
            "name:required" => "Name Cant Be Empty",
            "name:min" => "Name Cant Be Lower Than 5",
            "name:max" => "Name Cant Be Bigger Than 255",
            "slug:required" => "Slug Cant Be Empty",
            "slug:max" => "Slug Cant Be Bigger Than 255",
            "slug:min" => "Slug Cant Be Lower Than 5",
            "slug:unique" => "Slug Already Exist",
            "description:required" => "Description Cant Be Empty",
            "description:min" => "Description Cant Be Lower Than 5",
            "price:required" => "Price Cant Be Empty",
            "price:numeric" => "Price Should Be A Number",
            "count:required" => "Count Cant Be Empty",
            "count:numeric" => "Count Should Be A Number",
            "categories:required" => "Categories Cant Be Empty",
            "categories:array" => "Categories Should Be A List",
            "image:uploaded_file" => "Image Should Be A Image",
            "image:mimes" => "Image Should Be A Valid Type (png,jpeg,jpg)",
            "image:max" => "Image Cant Be Bigger Than 500K",
            "image:min" => "Image Cant Be Lower Than 0",

        ]);

        if ($validation->fails()) {
            return redirect("/admin-panel/products/edit?id={$productId}");
        }

        $productData = $validation->getValidatedData(); 
        $categories = $productData['categories'];


        unset($productData['categories']);

        if($productData['image']['name'] == '')
        {
            unset($productData['image']);
        }else
        {
            saveImage($productData['image'], "products/{$productSlug}");
            $productData['image'] = $productSlug . "/" . $productData['image']['name'];
        }

        $categoriesId = [];
        foreach($categories as $category)
        {
            $categoryId = (new Categories())->select('id')->find($category, 'name')->id;
            $categoriesId[] = $categoryId;
        }


        (new ProductsCategories)->delete($productId, 'product_id');

        (new Products())->update($productId, [
            ...$productData,
            "slug" => $productSlug,
        ]);
        
        foreach($categoriesId as $categoryId)
        {
            (new ProductsCategories)->create([
                "product_id" => $productId,
                "category_id" => $categoryId
            ]);
        }



        return redirect("/admin-panel/products");
    }



}