<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Traits\ImageTrait;


class PortfoliosController extends Controller
{
    use ImageTrait;
    public function getAll()
    {
        return response()->json(Portfolio::orderByDesc("id")->get());
    }
    public function add(Request $request)
    {
        $name             = $request->name;
        $link             = $request->link;
        $description      = $request->description;
        $full_description = $request->full_description;

        if ($request->hasFile("file")) {

            $file                        = $request->file->store('uploads', 'public');
            $portfolio                   = new Portfolio();
            $portfolio->name             = $name;
            $portfolio->link             = $link;
            $portfolio->description      = $description;
            $portfolio->full_description = $full_description;
            $portfolio->srcImage         = '/storage/' . $file;
            $portfolio->previewImg       = $this->createThumbImage($request->file);
            if (!Portfolio::where('name', $name)->exists()) {
                if ($portfolio->save()) {
                    return response()->json(["message" => "Запись добавлена", "class" => 'success']);
                } else {
                    return response()->json(["message" => "Запись не добавлена", "class" => 'error']);
                }

            } else {
                return response()->json(["message" => "Дубликат названия", "class" => 'error']);
            }


        }


    }
    public function getById($id)
    {
        return response()->json(Portfolio::find($id));
    }

    public function delete($id)
    {
        if (Portfolio::where('id', $id)->exists()) {
            if (Portfolio::find($id)->delete()) {
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
        $name             = $request->name;
        $link             = $request->link;
        $description      = $request->description;
        $full_description = $request->full_description;
        $id               = $request->id;
        $portfolio        = Portfolio::find($id);
        if ($request->hasFile("file")) {
            $file                = $request->file->store("uploads", "public");
            $portfolio->srcImage = "/storage/" . $file;
        }
        $portfolio->name             = $name;
        $portfolio->link             = $link;
        $portfolio->full_description = $full_description;
        $portfolio->description      = $description;
        if ($request->hasFile("file")) {
            $portfolio->previewImg = $this->createThumbImage($request->file);
        }
        if ($portfolio->save()) {
            return response()->json(["message" => "Запись изменена", "class" => 'success']);
        } else {
            return response()->json(["message" => "Запись не изменена", "class" => 'error']);
        }

    }
}
