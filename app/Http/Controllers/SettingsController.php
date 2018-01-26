<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Media as Videos;
use \App\User as Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class SettingsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Videos $videos)
    {

        return view('account.teachers.settings.home');
    }

    public function update(Request $request)
    {
        $username = Input::get('username');
        $old_pass = Input::get('old_pass');
        $new_pass = Input::get('new_pass');
        $new_pass_confirm = Input::get('new_pass_confirm');

        $request->validate([
            'username' => 'required|max:255',
            'old_pass' => 'required|max:255',
            'new_pass' => 'required|max:255',
            'new_pass_confirm' => 'required|max:255'
        ]);

        if ($new_pass === $new_pass_confirm )
        {
            if ( Hash::check($old_pass, \Auth::User()->getAuthPassword()) )
            {
                $me = Users::find(\Auth::User()->id);
                $me->name = $username;
                $me->password = Hash::make($new_pass);
                $me->save();
                return redirect()->route('settings')->withSuccess('Modification prise en compte');
            }

            return redirect()->route('settings')->withErrors(array('message1'=>'Veillez à bien entrer votre bon mot de passe actuel'));

        }
        else // If new passwords doesn't match
        {
            return redirect()->route('settings')->withErrors(array('message2'=>'Le nouveau mot de passe ne correspond pas'));
        }

        return redirect()->route('settings')->withErrors(array('message3'=>'Une erreur est survenue'));
    }
}
