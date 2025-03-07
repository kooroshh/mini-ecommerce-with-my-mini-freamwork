<?php namespace App\Http\Controllers\Panel\AdminPanel;


use App\Models\Comments;
use Dom\Comment;
use Main\Core\Controller;

class AdminPanelCommentsController extends Controller
{
    public function unregisteredPanelView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $data = (new Comments())
                ->where('is_active', false)
                ->join('products', "id", "product_id")
                ->join('users', "id", "user_id")
                ->select("comments.id", "users.image", "users.email", "products.slug", "comments.created_at")
                ->get();



        return $this->render("user.admin-panel.comments.admin-panel-unregistered-comments",[
            "data" => $data
        ]);
    }

    public function registerCommentView()
    {
        if(!isAdmin())
            return $this->render("errors.404");

        $commentId = request()->input('id');
        
        if(!$commentId)
            return redirect('/admin-panel/unregistered-comments');

        $comment = (new Comments())
                    ->select("comments.id", 'comments.body', "comments.created_at", "users.name", "users.image")
                    ->join('users', "id", "comments.user_id")
                    ->find($commentId, "comments.id");


        return $this->render("user.admin-panel.comments.admin-panel-unregistered-comments-register",[
            "data" => $comment
        ]);
    }

    public function registerComment()
    {
        if(!isAdmin())
            return $this->render("errors.404");

        $commentId = request()->input('commentId');

        if(!$commentId)
            return redirect('/admin-panel/unregistered-comments');


        (new Comments())->update($commentId, [
            "is_active" => true
        ]);

        return redirect("/admin-panel/unregistered-comments");

    }


        
    public function deleteCommentView()
    {


        if(!isAdmin())
            return $this->render("errors.404");
        
        $commentId = request()->input('id') ?? 0;

        if(!$commentId)
            return redirect('/admin-panel/comments');


        return $this->render("user.admin-panel.comments.admin-panel-comments-delete",[
            "commentId" => $commentId,
        ]);
    }


    public function deleteComment()
    {

        if(!isAdmin())
            return $this->render("errors.404");

        $commentId = request()->input('commentId') ?? 0;
        if(!$commentId)
            return redirect('/admin-panel/comments');


        $validation = $this->validate(request()->all(),[
            "commentId" => "exist:comments,id",
        ]);


        if ($validation->fails()) {
            return redirect("/admin-panel/comments/");
        }

        (new Comments())->delete($commentId);
        
        return redirect("/admin-panel/comments");
    }


    public function panelView()
    {


        if(!isAdmin())
            return $this->render("errors.404");

        $data = (new Comments())
                ->join('products', "id", "product_id")
                ->join('users', "id", "user_id")
                ->select("comments.id", "comments.is_active", "users.image", "users.email", "products.slug", "comments.created_at")
                ->get();

        return $this->render("user.admin-panel.comments.admin-panel-comments",[
            "data" => $data
        ]);
    }



}