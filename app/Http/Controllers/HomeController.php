<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Helper\CoinApi\CoinAPI;
use App\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController
{
    public function Index(User $user) {
        $total ="";
        $id = Auth::id(); // L'id utilisateur une fois connecté

        if ($id != null) { // Requete de check du role de l'utilisateur
            $me = $user->where('users.id' , $id)
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->get();
        } else // Si l'utilisateur ne se connecte pas (evite les erreurs)
        {
            $me = "";
        }

        return view('home', compact('total', 'me'));
    }

    public function Api($volume) {
//        $capi = new Helper\CoinApi\CoinApi('E0A1E7FF-6CBD-4DB1-A7C5-6153D75DF135');
//        $asset_id_base = 'BTC';
//        $asset_id_quote = 'USD';
//
//        $rate = $capi->GetExchangeRate($asset_id_base, $asset_id_quote);
//
//        $total  = $volume * $rate->rate;
        $total = array("price" => 15000);
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        return response()->json($total, 200, $header, JSON_UNESCAPED_UNICODE);
    }
}