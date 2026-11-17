<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function viewSignupForm()
    {
        return view('pages.register');
    }

    public function viewLoginForm()
    {
        return view('pages.login');
    }

    public function signup(Request $request)
    {
        $data["name"] = $request->name;
        $data["email"] = $request->email;
        $data["phone_number"] = $request->phone_number;
        $data["password"] = $request->password;

        User::create($data);

        return redirect()->route("viewLoginForm");
    }

    public function login(Request $data)
    {
        if (Auth::attempt([
            "email" => $data->email,
            "password" => $data->password
        ])) {
            
            if (Auth::user()->isAdmin == 1) {
                return redirect()->route("admin-panel");
            } else {
                return redirect()->route("dashboard");
            }

        } else {
            Alert::error('Error', 'Invalid Credentials!');
            return redirect()->back();
        }
    }

    public function allCustomers()
    {

    $customers = User::where("isAdmin", 0)->get();

    return view("pages.admin-panel.customer.list", ["customers" => $customers]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route("viewLoginForm");
    }

    public function viewProfile()
{
    $user = Auth::user();

    return view("pages.profile", ["user" => $user]);
}

public function updateProfile(Request $request)
{
    $data["name"] = $request->name;
    $data["phone_number"] = $request->phone_number;

    if ($request->password) {
        $data["password"] = $request->password;
    }

    User::where("id", Auth::user()->id)->update($data);

    return redirect()->route("viewProfile");
}
}
