<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function index() {

        $notifications = auth()->user()->notifications()->paginate(20);

        return response()->json(['message' => 'Success','notifications'=>$notifications],200);
    }
}
