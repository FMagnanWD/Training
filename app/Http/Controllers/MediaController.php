<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Repository\CategoriesRepository;
use App\Repository\MediaRepository;
use Illuminate\Support\Facades\Input;

use \App\Media;



class MediaController extends BaseController
{
    private $categoriesRepository;
    private $mediaRepository;

    public function __construct(
        CategoriesRepository $categoriesRepository,
        MediaRepository $mediaRepository
    )
    {
        $this->middleware('auth');
        $this->categoriesRepository = $categoriesRepository;
        $this->mediaRepository = $mediaRepository;
    }

    public function index()
    {
        // Clé api
        // AIzaSyClcMnn7DHzVSmHi0hm4ITwRc-7tGFFsN8
        // Id client
        // 258266781193-q9up97499tq5f9slgoqefldm44qt9ueh.apps.googleusercontent.com
        // Code secret client
        // G40GeT8iV-V5_C-WqGM3uve-
        $client = new \Google_Client(array(
            "application_name" => "YoutubeTest",
            "base_path" => "https://www.googleapis.com",
            "client_id" => "258266781193-q9up97499tq5f9slgoqefldm44qt9ueh.apps.googleusercontent.com",
            "client_secret" => "G40GeT8iV-V5_C-WqGM3uve-",
            "redirect_uri" => null,
            "state" => null,
            "developer_key" => "AIzaSyClcMnn7DHzVSmHi0hm4ITwRc-7tGFFsN8",
            "use_application_default_credentials" => false,
            "signing_key" => null,
            "signing_algorithm" => null,
            "subject" => null,
            "hd" => "",
            "prompt" => "",
            "openid.realm" => "",
            "include_granted_scopes" => null,
            "login_hint" => "",
            "request_visible_actions" => "",
            "access_type" => "online",
            "approval_prompt" => "auto",
            "retry" => [],
            "cache_config" => [],
            "token_callback" => null,
            "jwt" => null
        ));
        $youtube = new \Google_Service_YouTube($client);

        $response = $youtube->search->listSearch('snippet', array('maxResults' => 50, 'q' => '', 'type' => ''));
        foreach ($response['items'] as $v)
        {
          echo $v['snippet']['title'] .'<br>';
        }

        return view('account.teachers.video.show');
    }
    /**
     * @param CategoriesRepository $categoriesRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CategoriesRepository $categoriesRepository, Request $request){
        $request->user()->authorizeRoles(['Formateur']);

        $user_id = Auth::user()->id;
        $categories = $this->categoriesRepository->getCategoriesList();

        $request->validate([
            'url' => 'required|max:255',
        ]);

        if ($request->method() == 'POST')
        {
            /**
             * Récupère les valeurs du formulaire et instancie nouveau media pour insertion de valeurs
             */
            $field = Input::all();
            $media = new Media;

            $media->from_id = $user_id; // Id de l'utilisateur connecté
            $media->url = $field['url']; // Url de la video
            $media->categories_id = $field['categories_id']; // Url de la video

            $media->save(); // On save les values
            return  redirect()->route('account.teacher')->with('success', 'Lien ajouté avec succès !');
        }

        
        return view('account.teachers.home', ["categories" => $categories]);
    }


}