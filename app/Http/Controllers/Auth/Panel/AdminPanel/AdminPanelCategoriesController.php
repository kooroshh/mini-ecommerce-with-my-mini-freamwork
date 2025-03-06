<?php namespace App\Http\Controllers\Auth\Panel\AdminPanel;

use App\Models\Categories;
use App\Models\User;
use Main\Core\Controller;

class AdminPanelCategoriesController extends Controller
{
    public function panelView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $categories = (new Categories())->get();

        return $this->render("user.admin-panel.categories.admin-panel-categories",[
            "categories" => $categories
        ]);
    }

    
    public function deleteCategoryView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $categoryId = request()->input('id');

        $category = (new Categories())->find($categoryId);
        return $this->render("user.admin-panel.categories.admin-panel-categories-delete",[
            "categoryName" => $category->name,
            "categoryId" => $categoryId,
        ]);
    }


    public function deleteCategory()
    {


        if(!isAdmin())
            return $this->render("errors.404");




        $validation = $this->validate(request()->all(),[
            "categoryId" => "required|exist:products_categories,category_id",
        ],[
            "categoryId:required" => "Id Cant Be Empty",
            "categoryId:exist" => "Cant Delete A Category When You Have A Product That It Is Using It",
        ]);


        $categoryId = request()->all()['categoryId'];
        if (!$categoryId) {
            return redirect("/admin-panel/categories");
        }

        if ($validation->fails()) {
            return redirect("/admin-panel/categories/delete?id=$categoryId");
        }

        $categoryData = $validation->getValidatedData();

        (new Categories())->delete($categoryData['categoryId']);
        
        return redirect("/admin-panel/categories");
    }

    
    public function editCategoryView()
    {
        
        if(!isAdmin())
            return $this->render("errors.404");

        $categoryId = request()->input('id');

        $data = (new Categories())->select("name")->find($categoryId);

        if(!$data)
            return redirect("/admin-panel/categories");

        
        return $this->render("user.admin-panel.categories.admin-panel-categories-edit",[
            "name" => $data->name,
            "id" => $categoryId,
        ]);
    }

    public function editCategory()
    {
        if(!isAdmin())
            return $this->render("errors.404");


        $validation = $this->validate(request()->all(),[
            "name" => "required|min:3|max:255|unique:categories,name",
        ],[
            "name:required" => "Name Cant Be Empty",
            "name:min" => "Name Cant Be Lower Than 3",
            "name:max" => "Name Cant Be Bigger Than 255",
            "name:unique" => "Category Already Exist",
        ]);

        $categoryId = request()->input('id');

        if ($validation->fails()) {
            return redirect("/admin-panel/categories/edit?id=$categoryId");
        }

        if (is_null($categoryId)) {
            return redirect("/admin-panel/categories");
        }


        $categoryData = $validation->getValidatedData();
        
        (new Categories())->update($categoryId, [
            ...$categoryData,
        ]);

        return redirect("/admin-panel/categories");
    }


}