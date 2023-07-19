<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with("technologies", "type")->paginate(5);

        $response = [
            "success" => true,
            "projects" => $projects
        ];

        return response()->json($response);
    }

    public function show($id) {
        $project = Project::with("technologies", "type")->find($id);

        $response = [
            "success" => true,
            "projects" => $project
        ];

        return response()->json($response);
    }
}
