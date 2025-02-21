<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Main\Core\Controller;
use Main\Core\Request;

class ArticlesController extends Controller
{
    public function index(Request $request): string
    {
        var_dump($request->all());
        return "Articles Page With";
    }

    public function createPost(Request $request)
    {

        $validation = $this->validate($request->all(),[
            "title" => "required|min:6",
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return $errors->firstOfAll()['title'][0];
        } else {

            return $request->input("id");
        }

    }

    public function createGet()
    {
        var_dump((new Articles())->where('id', "7", ">")->where("id","12","<")->get());
        return $this->render('articles.create', [
            'title' => 'hello roocket',
            'auth' => true
        ]);
    }

    public function edit($slug, $id)
    {
        return "Slug Is $slug  And Id Is $id";
    }
}
