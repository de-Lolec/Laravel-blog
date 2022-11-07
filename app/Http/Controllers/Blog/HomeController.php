<?php

namespace App\Http\Controllers\blog;

use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;
use App\Repositories\BlogPostRepository;

class HomeController extends BaseController
{

    private $blogPostRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');

        parent::__construct();
        //Частные свойства проинициализируем
        //Создание объекта blogPostRepository
        //Ларавель сам его создает
        //Не все обьекты надо так создавать
        $this->blogPostRepository = app(blogPostRepository::class);
        $this->blogCategoryRepository = app(blogCategoryRepository::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $paginator = $this->blogPostRepository->getAllWithPaginate();

        return view("blog.main.index_main", compact('paginator'));
    }

    public function post($id){
        $item = $this->blogPostRepository->getEdit($id);
        if(empty($item)){
            abort(404);
        }

        return view('blog.main.index_view',
            compact('item'));

    }

}
