<?php namespace App\Http\Controllers\Panel\AdminPanel;

use App\Models\User;
use Main\Core\Controller;

class AdminPanelUsersController extends Controller
{
    public function panelView()
    {

        if(!isAdmin())
            return $this->render("errors.404");

        $users = (new User)->select("id", "name", "email", "image", "is_admin", "is_ban", "created_at", "updated_at")->get();
        
        return $this->render("user.admin-panel.users.admin-panel-users",[
            "users" => $users,
        ]);
    }


    public function deleteUserView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $userId = request()->input('id');
        if(!$userId)
            return redirect("/admin-panel/users");

        $user = (new User())->select("email")->find($userId);
        
        return $this->render("user.admin-panel.users.admin-panel-users-delete",[
            "userEmail" => $user->email,
            "userId" => $userId,
        ]);
    }


    public function deleteUser()
    {


        if(!isAdmin())
            return $this->render("errors.404");


        $userId = request()->input('userId');
        if(!$userId)
            return redirect("/admin-panel/users");

        (new User())->delete($userId);
        
        return redirect("/admin-panel/users");
    }

    public function banUserView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $userId = request()->input('id');
        if(!$userId)
            return redirect("/admin-panel/users");
        
        $user = (new User())->select("email")->find($userId);
        
        return $this->render("user.admin-panel.users.admin-panel-users-ban",[
            "userEmail" => $user->email,
            "userId" => $userId,
        ]);
    }


    public function banUser()
    {


        if(!isAdmin())
            return $this->render("errors.404");



        $userId = request()->input('userId');
        if(!$userId)
            return redirect("/admin-panel/users");

        banUserToggler($userId);
        
        return redirect("/admin-panel/users");
    }

    public function unBanUserView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $userId = request()->input('id');
        if(!$userId)
            return redirect("/admin-panel/users");
        $user = (new User())->select("email")->find($userId);
        
        return $this->render("user.admin-panel.users.admin-panel-users-un-ban",[
            "userEmail" => $user->email,
            "userId" => $userId,
        ]);
    }


    public function unBanUser()
    {


        if(!isAdmin())
            return $this->render("errors.404");



        $userId = request()->input('userId');
        if(!$userId)
            return redirect("/admin-panel/users");

        banUserToggler($userId, "unBan");
        
        return redirect("/admin-panel/users");
    }


    public function editUserView()
    {
        
        if(!isAdmin())
            return $this->render("errors.404");

        $userId = request()->input('id');

        if(!$userId)
            return redirect("/admin-panel/users");

        $data = (new User())->select("name", "email")->find($userId);

        if(!$data)
            return redirect("/admin-panel/users");

        
        return $this->render("user.admin-panel.users.admin-panel-users-edit",[
            "name" => $data->name,
            "email" => $data->email,
            "id" => $userId,
        ]);
    }

    public function editUser()
    {
        if(!isAdmin())
            return $this->render("errors.404");


        $validation = $this->validate(request()->all(),[
            "name" => "required|min:5|max:255",
        ],[
            "name:required" => "Name Cant Be Empty",
            "name:min" => "Name Cant Be Lower Than 5",
            "name:max" => "Name Cant Be Bigger Than 255",
        ]);

        $userId = request()->input('id');

        if(!$userId)
            return redirect("/admin-panel/users");

        if ($validation->fails()) {
            return redirect("/admin-panel/users/edit?id=$userId");
        }

        $userData = $validation->getValidatedData();

        (new User())->update($userId, [
            ...$userData,
        ]);

        return redirect("/admin-panel/users");
    }

}