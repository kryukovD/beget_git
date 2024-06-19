<?php

namespace App\Http\Controllers;

use App\Models\Prices;

use Illuminate\Http\Request;

class PricesController extends Controller
{
    public function getAll()
    {
        return response()->json(Prices::all());
    }
    public function update(Request $request)
    {
        $allInputsRequest = $request->all();
        $results          = [];
        foreach ($allInputsRequest as $key => $value) {
          try{
                $price = Prices::find((int) $key + 1);
                if ($price) {
                    $price->value = $value;
                    if ($price->save()) {
                        array_push($results, true);
                    } else {
                        array_push($results, false);
                    }
                }
            }
            catch(Exception $e){
                return response()->json(["message" => "Не удалось обновить", 'class' => 'error']);
            }
           
                unset($price);
          
        }

        foreach ($results as $item) {
            if (!$item) {
                return response()->json(["message" => "Не удалось обновить", 'class' => 'error']);
            }
        }

        return response()->json(["message" => "Записи обновлены", 'class' => 'success']);
    }
}


