<?php namespace App\Http\Controllers\Auth\Panel\AdminPanel;

use App\Models\Categories;
use App\Models\Comments;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use App\Models\Views;
use Main\Core\Controller;

class AdminPanelUsersController extends Controller
{
    public function panelView()
    {


        if(!isAdmin())
            return $this->render("errors.404");
        return $this->render("user.admin-panel.admin-panel-users",[
            
        ]);
    }
}