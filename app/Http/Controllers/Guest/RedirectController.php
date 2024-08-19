<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        if (auth()->user()->roleId === 1) {
            return redirect('/admin/index');
        } 
        else {
            return redirect('/user/landingpage');
        }
    }
}