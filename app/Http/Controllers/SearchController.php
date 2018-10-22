<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class SearchController extends Controller
{
    public function search(Request $request){ //TODO после создания ORM-моделей переписать под них
        //TODO: присоединить все необходимые таблицы
        //TODO: использовать with для N+1
        //TODO: поиск по дате
        //TODO: пагинация по 50, OFFSET и LIMIT
        /*$query = App\User::query();
        if ($request->has('name')){
            $query->where('name', 'LIKE', $request->input('name'));
        }
        if ($request->has('$category_id')){
            $query->where('category_id', '=', $request->input('category_id'));
        }
        if ($request->has('$city')){
            $query->where('city', 'LIKE', $request->input('city'));
        }
        */
    }

}
