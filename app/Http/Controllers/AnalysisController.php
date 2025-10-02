<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\patients;

class AnalysisController extends Controller
{
    /**
     * Create the new analysis.
     */
    public function new(Request $request): View
    {
        return view('analysis');
    }

    /**
     * Display the project's analysis result.
     */
    public function project(Request $request, $id = null): View
    {
        $patient = patients::find($id);
        $data = array(
            array("id" => 12345678, "name" => "王小明", "subtype" => "mCRPC", "PSA" => 50, "gleason" => 5, "gleason2" => 4, "TNM" => "T3aN0M1b", "note" => "病人特殊事項"),
            array("id" => 87654321, "name" => "呂小華", "subtype" => "mCRPC", "PSA" => 30, "gleason" => 5, "gleason2" => 5, "TNM" => "T3aN0M1b", "note" => "病人特殊事項"),
            array("id" => 58746975, "name" => "黃小美", "subtype" => "mCRPC", "PSA" => 40, "gleason" => 4, "gleason2" => 4, "TNM" => "T3aN0M1b", "note" => "病人特殊事項"),
            array("id" => 78548547, "name" => "方大同", "subtype" => "mCRPC", "PSA" => 50, "gleason" => 4, "gleason2" => 5, "TNM" => "T3aN0M1b", "note" => "病人特殊事項"),
        );
        return view('analysis', [
            'data' => $data[$id]
        ]);
    }

}
