<?php namespace App\Http\Controllers\Product;

use App\Models\Comments;
use App\Models\Products;
use App\Models\ProductsCategories;
use Main\Core\Controller;

class SingleProductController extends Controller
{
    public function productShow($slug)
    {
        $data = [];
        $product = (new Products())->find($slug, "slug");
        if(!$product)
            return redirect("/products");

        $productComment = (new Comments())
                            ->join('users', "id", "comments.user_id")
                            ->where('product_id', $product->id)
                            ->where('is_active', true)
                            ->select("users.image", "users.name", "comments.body", "comments.created_at")
                            ->get();

        $categories = (new ProductsCategories())->join('categories', "id","products_categories.category_id")->where('products_categories.product_id', $product->id)->get();
        $categories = array_map(fn($item) => $item->name, $categories);

        $data['comments'] = $productComment;
        $data['product'] = $product;
        $data['categories'] = $categories;



        return $this->render('products.single-product', [
            "product" => $data['product'],
            "comments" => $data['comments'],
            "categories" => $data['categories'],
        ]);
    }


    public function addComment()
    {

        $productSlug = request()->input('product_slug');
        $userId = request()->input('user_id');

        if($userId != auth()->user()->id || !$productSlug)
            return redirect("/products");

        $validation = $this->validate(request()->all(),[
            "body" => "required|min:5",
            "product_slug" => "exist:products,slug"
        ],[
            "body:required" => "body Cant Be Empty",
            "body:min" => "body Cant Be Lower Than 5",
        ]);

        if ($validation->fails()) {
            return redirect("/products/" . $productSlug);
        }


        $productId = (new Products())->find($productSlug, "slug")->id;
        $body = request()->input('body');

        (new Comments())->create([
            'user_id' => $userId,
            'product_id' => $productId,
            "body" => $body,
        ]);




        return redirect("/products/" . $productSlug);
    }


}