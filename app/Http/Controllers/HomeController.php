<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
       switch (Auth::user()->role) {
            case 1:
                return redirect(route('user.dashboard'));
                break;
            case 2:
                return redirect(route('admin.dashboard'));
                break;
            case 3:
                return redirect(route('admin-kab.dashboard'));
                break;
            default:
                return redirect('/login');
                break;
        }
    }
}
