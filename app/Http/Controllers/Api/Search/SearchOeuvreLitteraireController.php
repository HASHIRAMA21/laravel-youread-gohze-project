<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Models\Bd;
use App\Models\OeuvreLitteraire;
use Illuminate\Http\Request;

class SearchOeuvreLitteraireController extends Controller
{

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = $request->keyword;

        $result = OeuvreLitteraire::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('authors', 'LIKE', '%' . $query . '%')
            ->orWhere('publishing_house', 'LIKE', '%', $query . '%')
            ->orWhere('category', 'LIKE', '%', $query . '%')
            ->orWhere('parution_date','LIKE','%',$query.'%')
            ->select('id', 'title', 'authors', 'publishing_house', 'category', 'parution_date', 'publication_id')
            ->orderBy('parution_date', 'DESC')
            ->paginate(20);

        return response()->json($result, 200);
    }
}
