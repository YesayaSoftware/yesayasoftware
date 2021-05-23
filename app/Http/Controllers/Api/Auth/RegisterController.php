<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    use IssueTokenTrait;

    private $client;

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->client = Client::find(2);
    }

    /**
     * Register new user
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        return $this->issueToken($request, 'password');
    }
}
