<?php namespace App\Http\Controllers\Panel\AdminPanel\Tools;

use App\Models\Categories;
use App\Models\Products;
use App\Models\ProductsCategories;
use App\Models\User;
use Main\Core\Controller;

class AdminPanelAddProductToolController extends Controller
{
    public function addProductView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $categories = (new Categories())->select("name")->get();
        return $this->render("user.admin-panel.tools.add-product-tool",[
            'categories' => $categories,
        ]);
    }

    public function addProduct()
    {
        if(!isAdmin())
            return $this->render("errors.404");


        $validation = $this->validate(request()->all() + $_FILES,[
            "name" => "required|min:5|max:191",
            "slug" => "required|max:191|min:5|unique:products,slug",
            "description" => "required|min:5",
            "price" => "required|numeric",
            "count" => "required|numeric|min:0",
            "categories" => "required|array",
            "image" => "uploaded_file:0,500K,png,jpeg,jpg",
        ],[
            "name:required" => "Name Cant Be Empty",
            "name:min" => "Name Cant Be Lower Than 5",
            "name:max" => "Name Cant Be Bigger Than 191",
            "slug:required" => "Slug Cant Be Empty",
            "slug:max" => "Slug Cant Be Bigger Than 191",
            "slug:min" => "Slug Cant Be Lower Than 5",
            "slug:unique" => "Slug Already Exist",
            "description:required" => "Description Cant Be Empty",
            "description:min" => "Description Cant Be Lower Than 5",
            "price:required" => "Price Cant Be Empty",
            "price:numeric" => "Price Should Be A Number",
            "count:required" => "Count Cant Be Empty",
            "count:numeric" => "Count Should Be A Number",
            "count:min" => "Count Cant Be Lower Than 0",
            "categories:required" => "Categories Cant Be Empty",
            "categories:array" => "Categories Should Be A List",
            "image:uploaded_file" => "Image Should Be A Image",
            "image:mimes" => "Image Should Be A Valid Type (png,jpeg,jpg)",
            "image:max" => "Image Cant Be Bigger Than 500K",
            "image:min" => "Image Cant Be Lower Than 0",

        ]);

        if ($validation->fails()) {
            return redirect("/admin-panel/products/add");
        }

        $productsData = $validation->getValidatedData();
        $categories = [];

        foreach($productsData['categories'] as $category)
        {
            $categories[] = $category;
        }
        unset($productsData['categories']);

        if($productsData['image']['name'] == '')
        {
            unset($productsData['image']);
        }else
        {
            saveImage($productsData['image'], "products/{$productsData['slug']}");
            $productsData['image'] = $productsData['slug'] . "/" . $productsData['image']['name'];
        }

        $categoriesId = [];
        foreach($categories as $category)
        {
            $categoryId = (new Categories())->find($category, 'name');
            $categoriesId[] = $categoryId->id;
        }

        (new Products())->create([
            ...$productsData
        ]);

        $productId = (new Products())->find($productsData['slug'], "slug")->id;

        foreach($categoriesId as $categoryId)
        {
            (new ProductsCategories)->create([
                'product_id' => $productId,
                "category_id" => $categoryId,
            ]);
        }


        return redirect("/admin-panel/products");
    }

}