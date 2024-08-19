<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ilovepdf\Ilovepdf;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function main(){
        return redirect ('user/home');
    }
    public function index(){
        return view ('user.landingPage');
    }
}