<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class SearchPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = $request->keyword;

        $result = Publication::where('status', 1)
            ->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('category', 'LIKE', '%' . $query . '%')
            ->select('id', 'description', 'date_publication','category', 'views', 'avatar')
            ->orderBy('views', 'DESC')
            ->paginate(20);

        return response()->json($result, 200);
    }
}
