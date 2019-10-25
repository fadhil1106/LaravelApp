<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RahasiaController extends Controller
{
    public function halamanRahasia()
    {
        return 'Anda sedang melihat <strong>Halaman Rahasia</strong>';
    }

    public function showMeSecret()
    {
        // return redirect()->route('secret');
        $url = route('secret');
        $link = '<a href="'.$url.'"> Ke Halaman Rahasia';
        return $link;
    }
}
