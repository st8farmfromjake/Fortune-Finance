<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //get register page
    public function register()
    {
        if ($_GET) {
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                // dd($search);
                $protocol = isset($_SERVER['HTTPS']) &&
                    $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
                $base_url = $protocol . $_SERVER['HTTP_HOST'];

                header('Location: ' . $base_url . '/investments/stocks/' . $search);
                exit;
            }
        }
        return view('register');
    }

    //register
    public function store()
    {
        //create the user
        // var_dump(request()->all());

        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:5', 'unique:users'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:4', 'max:255'],
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);



        return redirect('/')->with('success', 'Congrats on your new account ' . $attributes['name'] . ' :)');
    }

    //logout
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'You have been logged out :)');
    }

    public function login()
    {
        if ($_GET) {
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                // dd($search);
                $protocol = isset($_SERVER['HTTPS']) &&
                    $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
                $base_url = $protocol . $_SERVER['HTTP_HOST'];

                header('Location: ' . $base_url . '/investments/stocks/' . $search);
                exit;
            }
        }
        return view('Log-In-Sign-Up');
    }

    public function create()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back :)');
        }

        return back()->withInput()->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }
}
