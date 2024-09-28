<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display the project view.
     */
    public function view(): View
    {
        return view('project');
    }
}
