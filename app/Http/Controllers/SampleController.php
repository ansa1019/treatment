<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SampleController extends Controller
{
    /**
     * Display the sample view.
     */
    public function view(): View
    {
        return view('sample');
    }
}
