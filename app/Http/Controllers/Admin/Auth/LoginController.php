<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Response\BaseHttpResponse;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $response;

    /**
     * column name query user
     *
     * @var string
     */
    protected $defaultQuery;

    /**
     * Reponse status and result
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BaseHttpResponse $response)
    {
        $this->middleware('user')->except('logout');
        $this->redirectTo   = env('ADMIN_DIR');
        $this->response     = $response;
        $this->defaultQuery = 'email';
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        page_title()->setTitle(trans('theme_general.login'));

        return view('Admin::pages.auth.login');
    }

    /**
     * @return string
     *
     */
    public function username()
    {
        return 'login';
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return BaseHttpResponse|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            $this->sendLockoutResponse($request);
        }

        $loginAccount = $request->input($this->username());

        $user = User::where('username', $loginAccount)->orWhere('phone', $loginAccount)->orWhere('email', $loginAccount)->first();

        if (!empty($user)) {
//           if (!$user->completed($user)) {
//               return $this->response
//                       ->setError()
//                       ->setMessage(trans('admin_general.not_active'));
//           }

            if ($user->username == $loginAccount) {
                $this->defaultQuery = 'username';
            } elseif ($user->phone == $loginAccount) {
                $this->defaultQuery = 'phone';
            } else {
                $this->defaultQuery = 'email';
            }
        }

        if ($this->attemptLogin($request)) {
            User::where('id',$user->id)->update(['last_login' => now(config('app.timezone'))]);
            if (!session()->has('url.intended')) {
                session()->flash('url.intended', url()->current());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return BaseHttpResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->response
            ->setNextUrl(route('admin.login'))
            ->setMessage(trans('admin_general.logout_success'));
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            $this->defaultQuery => $request->input($this->username()),
            'password' => $request->input('password')
            ];
    }
}
