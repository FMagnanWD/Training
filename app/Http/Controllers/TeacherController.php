<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Repository\CategoriesRepository;
use App\Media;

class TeacherController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * @param CategoriesRepository $categoriesRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(CategoriesRepository $categoriesRepository, Request $request){
        $request->user()->authorizeRoles(['Formateur']);

        $user_id = Auth::user()->id;
        $categories = $categoriesRepository->getCategoriesList();

        $medias = \App\Media::with('categories')->get();
        echo "<pre>";
        foreach ($medias as $m) {
            var_dump($m->categories->name);
            var_dump($m->url);

        }

        echo "</pre>";

        return view('account.teachers.home', ["categories" => $categories]);
    }

    
}