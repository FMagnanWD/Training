<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class StudentController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * @param CategoriesRepository $categoriesRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index( Request $request ){
        $request->user()->authorizeRoles(['Etudiant']);

        $user_id = Auth::user()->id;
        $test = 'On test';

        return view('account.students.home' , compact('user_id', 'test'));
    }
}