<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        if (auth()->user()->roleId === 1) {
            return redirect('/admin');
        } 
        else {
            return redirect('/user');
        }
    }
}