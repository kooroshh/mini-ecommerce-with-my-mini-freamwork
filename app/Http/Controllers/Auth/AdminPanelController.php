<?php namespace App\Http\Controllers\Auth;

use App\Models\Categories;
use App\Models\Comments;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use App\Models\Views;
use Main\Core\Controller;

class AdminPanelController extends Controller
{
    public function panelView()
    {

        $viewsCount = (new Views())->count();
        $usersCount = (new User())->count();
        $registeredCommentsCount = (new Comments)->count("is_active", true);
        $commentsCount = (new Comments())->count();
        $registeredOrdersCount = (new Orders())->count("status", "paid");
        $ordersCount = (new Orders())->count();
        $productsCount = (new Products())->count();
        $categoriesCount = (new Categories())->count();

        $todayViewsCount = (new Views)->get();
        $todayDate = date("Y-m-d");
        $todayViews = array_filter($todayViewsCount, function($items) use($todayDate){
            return explode(" ", $items->view_at)[0] == $todayDate;
        });
        $todayViewsCount = count($todayViews);

        if(!isAdmin())
            return $this->render("errors.404");
        return $this->render("user.admin-panel.admin-panel",[
            "usersCount" => $usersCount,
            "registeredCommentsCount" => $registeredCommentsCount,
            "commentsCount" => $commentsCount,
            "viewsCount" => $viewsCount,
            "todayViewsCount" => $todayViewsCount,
            "registeredOrdersCount" => $registeredOrdersCount,
            "productsCount" => $productsCount,
            "categoriesCount" => $categoriesCount,
            "ordersCount" => $ordersCount,
        ]);
    }
}