<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginName' => 'required', //required means "don't accept empty values"
            'loginPassword' => 'required'
        ]);

        // Now if the validation fails, Laravel automatically stops executing and redirects back
        // If it passes, $incomingFields becomes an array like:[
        //     'loginName' => 'whatever the user typed',
        //     'loginPassword' => 'whatever the user typed'
        // ]

        if (auth()->attempt(['name' => $incomingFields['loginName'], 'password' => $incomingFields['loginPassword']])) { 
            $request->session()->regenerate(); // this runs only if the login succeeded. It generates a brand new session ID for the user. This is a security measure — without it, an attacker could potentially perform what's called a session fixation attack, where they get hold of a victim's session ID before login and then reuse it after. Regenerating the ID after login closes that hole; should always be done on login.
        }

        // auth()->attempt() does three things at once:

        // 1. Goes to the 'users' table in the DB and looks for a user where 'name' matches
        // 2. If it finds one, it takes the stored hashed password and checks if it matches what the user typed (it handles the bcrypt comparison automatically — never done manually)
        // 3. If both match, it logs the user in and returns true
        //  If not, returns false

       return redirect('/');

    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:25']
        ]);
    
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);


        return redirect('/');
    }

    public function logout() {
        auth()->logout();
       return redirect('/');
    }
  
}
