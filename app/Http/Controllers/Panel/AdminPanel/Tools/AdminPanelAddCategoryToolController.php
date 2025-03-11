<?php namespace App\Http\Controllers\Panel\AdminPanel\Tools;

use App\Models\Categories;
use Main\Core\Controller;

class AdminPanelAddCategoryToolController extends Controller
{
    public function addUserView()
    {


        if(!isAdmin())
            return $this->render("errors.404");


        return $this->render("user.admin-panel.tools.add-category-tool",[
        ]);
    }

    public function addUser()
    {
        if(!isAdmin())
            return $this->render("errors.404");


        $validation = $this->validate(request()->all(),[
            "name" => "required|min:3|max:191|unique:categories,name",
        ],[
            "name:required" => "Name Cant Be Empty",
            "name:min" => "Name Cant Be Lower Than 3",
            "name:max" => "Name Cant Be Bigger Than 191",
            "name:unique" => "Category Already Exist"
        ]);

        if ($validation->fails()) {
            return redirect("/admin-panel/categories/add");
        }


        $userData = $validation->getValidatedData();


        (new Categories())->create([
            ...$userData,
        ]);

        return redirect("/admin-panel/categories");
    }

}