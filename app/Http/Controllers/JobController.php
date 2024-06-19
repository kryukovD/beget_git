<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function getAll()
    {
        return response()->json(Job::orderByDesc("id")->get());
    }
    public function add(Request $request)
    {

        $job                = new Job();
        $job->name          = $request->name;
        $job->position      = $request->position;
        $job->period_text   = $request->period_text;
        $job->period_mounth = $request->period_mounth;
        if (!job::where('name', $request->name)->exists()) {
            if ($job->save()) {
                return response()->json(["message" => "Запись добавлена", "class" => 'success']);
            } else {
                return response()->json(["message" => "Запись не добавлена", "class" => 'error']);
            }

        } else {
            return response()->json(["message" => "Дубликат названия", "class" => 'error']);
        }



    }
    public function getById($id)
    {
        return response()->json(Job::find($id));
    }

    public function delete($id)
    {
        if (Job::where('id', $id)->exists()) {
            if (Job::find($id)->delete()) {
                return response()->json(["message" => "Запись удалена", "class" => 'success']);
            } else {
                return response()->json(["message" => "Запись  не удалена", "class" => 'error']);
            }
        } else {
            return response()->json(["message" => "Записи не существует", "class" => 'error']);
        }

    }

    public function update(Request $request)
    {

        $job                = Job::find($request->id);
        if($job){
        $job->name          = $request->name;
        $job->position      = $request->position;
        $job->period_text   = $request->period_text;
        $job->period_mounth = $request->period_mounth;
        if ($job->save()) {
            return response()->json(["message" => "Запись изменена", "class" => 'success']);
        } else {
            return response()->json(["message" => "Запись не изменена", "class" => 'error']);
        }

    }else{
        return response()->json(["message" => "Запись не изменена", "class" => 'error']);
    }
}
}
