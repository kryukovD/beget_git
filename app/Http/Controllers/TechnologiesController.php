<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryTechnologies;
use App\Models\Technology;
use Illuminate\Http\Response;
class TechnologiesController extends Controller
{
    public function getCategories(){
        return response()->json(CategoryTechnologies::all());
    }
    public function getTechnologies(){
        return response()->json(Technology::all());
    }
}
