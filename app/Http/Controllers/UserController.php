<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Whoops\Run;

class UserController extends Controller
{
     public function store(Request $request)
     {
          $formFields = $request->validate([
               'name' => ['required', 'min:3'],
               'email' => ['required', 'email', Rule::unique('users', 'email')],
               'password' => 'required|confirmed|min:6',
               'role' => ['required', Rule::in(['A', 'S'])]
          ],[
               'name.required' => 'Le champ nom est obligatoire.',
               'name.min' => 'Le nom doit contenir au moins 3 caractères.',
               'email.required' => 'Le champ email est obligatoire.',
               'email.email' => 'Vous devez entrer une adresse email valide.',
               'email.unique' => 'Cette adresse email est déjà utilisée.',
               'password.required' => 'Le champ mot de passe est obligatoire.',
               'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
               'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
               'role.required' => 'Le champ rôle est obligatoire.',
               'role.in' => 'Le rôle sélectionné n\'est pas valide.'
           ]);
          //hash password
          $formFields['password'] = bcrypt(($formFields['password']));

          $user = User::create($formFields);
          return redirect('/')->with('message', "Your account has been created");
     }
     function register()
     {
          if (auth()->user()->role == 'S') {
               return View('register');
          }
          return abort(403, 'you are not a super admin');
     }
     function modif()
     {
          if (auth()->user()->role == 'S') {
               $admin=User::where('role','=','A');
               return View('admin',['admins'=>$admin]);
          }
          return abort(403, 'you are not a super admin');
     }
     function profile()
     {
          if (auth()->user()){
               return View('profile');
          }
          return abort(403, 'you are not a super admin');
     }
     public function update(Request $request, User $user)
    {
        // dd(request()->all());
        $user = auth()->user();

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            // 'email' => ['required', 'email', Rule::unique('users', 'email')],
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'password' => 'nullable|confirmed|min:6'
        ],[
          'name.required' => 'Le nom est obligatoire.',
          'name.min' => 'Le nom doit contenir au moins 3 caractères.',
          'email.required' => 'L\'email est obligatoire.',
          'email.email' => 'L\'email doit être une adresse email valide.',
          'email.unique' => 'Cet email est déjà utilisé par un autre utilisateur.',
          'password.confirmed' => 'Les mots de passe ne correspondent pas.',
          'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.'
      ]);

        if ($formFields['password'] != NUll) {
            $formFields['password'] = bcrypt(($formFields['password']));
        } else {
            // Remove password from formFields if it's empty
            unset($formFields['password']);
        }
        if ($request->hasFile('fileToUpload')) {
            $formFields['profile_url'] = $request->file('fileToUpload')->store('profile', 'public');
        }

        $oldEmail = $user->email;

        $user->update($formFields);
        return redirect('/')->with('message', 'Your profile has been updated!');
    }


     function delete(User $user)
     {
          $user->delete();
          return redirect('/')->with('success', 'User deleted successfully');
     }
}
