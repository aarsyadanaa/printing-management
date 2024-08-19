<?php
namespace App\Http\Controllers\Admin;
Use App\Http\Controllers\Controller;
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
        return redirect('admin/index');
    }
    public function index(){
        //for documents chart
        $users = Document::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("MONTHNAME(created_at) as month_name"),
            DB::raw("MONTH(created_at) as month_number")
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name', 'month_number')
        ->orderBy('month_number') // untuk mengurutkan hasil berdasarkan bulan
        ->pluck('count', 'month_name');
        $labels = $users->keys();
        $data = $users->values();
            //for user chart
        $user = User::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("MONTHNAME(created_at) as month_name"),
            DB::raw("MONTH(created_at) as month_number")
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name', 'month_number')
        ->orderBy('month_number') // untuk mengurutkan hasil berdasarkan bulan
        ->pluck('count', 'month_name');
        $userLabels = $user->keys();
        $userData = $user->values();
        //dd($userLabels, $userData);
        return view('admin.index', compact('data', 'labels', 'userLabels', 'userData'));
    }
}