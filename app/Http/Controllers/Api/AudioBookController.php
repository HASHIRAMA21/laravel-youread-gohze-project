<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AudioBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Resources\AudioBookResource;

class AudioBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'title' => 'required',
            'description' => 'nullable',
            'file' => 'required|file|mimes:jpeg,jpg,png,gif|max:2048',
            'audio' =>'nullable|file|mimes:audio/mpeg,mpga,mp3,wav,aac'
        ]);

        // code for upload 'file'
        $file = new AudioBook();

        if($request->hasFile('file')){
            $uniqueid=uniqid();
            $original_name=$request->file('file')->getClientOriginalName();
            $size=$request->file('file')->getSize();
            $extension=$request->file('file')->getClientOriginalExtension();
            $name=Carbon::now()->format('Ymd').'_'.$uniqueid.'.'.$extension;
            $imagepath=url('/storage/uploads/files/'.$name);
            $path=$request->file('file')->storeAs('public/uploads/files/',$name);
           }
             // code for upload 'audio'
        // handle multiple files
        if(is_array($request->file('audio')))
        {
         $audios=array();
         foreach($request->file('audio') as $file) {
            $uniqueid=uniqid();
            $original_name=$file->getClientOriginalName();
            $size=$file->getSize();
            $extension=$file->getClientOriginalExtension();
            $filename=Carbon::now()->format('Ymd').'_'.$uniqueid.'.'.$extension;
            $audiopath=url('/storage/upload/files/audio/'.$filename);
            $path=$file->storeAs('/upload/files/audio',$filename);
            array_push($audios,$audiopath);
         }
         $all_audios=implode(",",$audios);
     }else{
         // handle single file
         if($request->hasFile('audio')){
         $uniqueid=uniqid();
         $original_name=$request->file('audio')->getClientOriginalName();
         $size=$request->file('audio')->getSize();
         $extension=$request->file('audio')->getClientOriginalExtension();
         $filename=Carbon::now()->format('Ymd').'_'.$uniqueid.'.'.$extension;
         $audiopath=url('/storage/upload/files/audio/'.$filename);
         $path=$file->storeAs('public/upload/files/audio/',$filename);
         $all_audios=$audiopath;
         }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AudioBook  $audioBook
     * @return \Illuminate\Http\Response
     */
    public function show(AudioBook $audioBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AudioBook  $audioBook
     * @return \Illuminate\Http\Response
     */
    public function edit(AudioBook $audioBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AudioBook  $audioBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AudioBook $audioBook)
    {
        $audioBook->update($request->all());
        return response(["publication"=> new AudioBookResource($audioBook),'message'=>"Success 200"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AudioBook  $audioBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(AudioBook $audioBook)
    {
        $audioBook->delete();
     return  response(['message'=>"Successfull delete AudioBook"]);
    }

}
