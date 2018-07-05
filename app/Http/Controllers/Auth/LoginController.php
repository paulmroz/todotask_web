<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->checkIfUserisDeleted($request);

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
        /*  $credentials = $request->only('email', 'password');

          if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'admin' => 1])) {
              // Authentication passed...
              return redirect()->intended('/');
          } else {
              return back();
          }*/
    }

    /**
    * Redirect the user to the GitHub authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = $this->findOrCreateGitHubUser(
            Socialite::driver('github')->stateless()->user()
        );

        auth()->login($user);

        return redirect('/');
    }

    protected function findOrCreateGitHubUser($githubUser)
    {
        //dd($githubUser->user['avatar_url']);
        $user = User::firstOrNew(['github_id' => $githubUser->id]);

        if ($user->exists) {
            return $user;
        }

        $user->fill([
            'name' => $githubUser->nickname,
            'email'=> $githubUser->email,
            'avatar' => $githubUser->user['avatar_url']
        ])->save();

        return $user;
    }

    public function checkIfUserisDeleted($request)
    {
        //dd($request->email);
        $user = User::where('email', $request->email)->first();
        //dd($user->name);
        if (!$user) {
            return redirect()->to('/login')->send();
        }

        if ($user->is_deleted) {
            //dd($user->name);
            return redirect()->to('/login')->send()->withErrors(['The Message']);
        }
    }
}
