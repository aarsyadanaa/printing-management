<?php
 
namespace App\Http\Controllers\Guest;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


 
class RegisterController extends Controller
{
    public function index()
    {
        return view('guest.register');
    }
 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
            'roleId' => 'required',
        ]);
 
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/guest/login');
    }
}