<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * Display the edit view.
     */
    public function view(): View
    {
        return view('edit');
    }
}
