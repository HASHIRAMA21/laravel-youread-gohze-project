<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OeuvreLitteraire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\OeuvreLitteraireResource;

class OeuvreLitteraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oeuvreLitteraire = OeuvreLitteraire::all();
        return $oeuvreLitteraire->paginate(20);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),
        [
        'title' =>'required',
        'author' =>'required',
        'description' =>'required',
        'category' =>'required',
        'publishing_house'=>'required',
        'parution_date' => 'required',
        'user_id' => 'required',
        'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
       ]);

if ($validator->fails()) {
      return response()->json(['error'=>$validator->errors()], 401);
   }


   if ($files = $request->file('file')) {

      //store file into document folder
      $file = $request->file->store('public/documents');

      //store your file into database
      $document = new OeuvreLitteraire();
      $document->title = $file;
      $document->author = $request->author;
      $document->description = $request->description;
      $document->category = $request->category;
      $document->publishing_house = $request->publishing_house;
      $document->parution_date = $request->parution_date;
      $document->user_id = $request->user_id;
      
      if($request->hasFile('image') && $request->file('image')->isValid()){
        $document->addMediaFromRequest('image')->toMediaCollection('images');
      }

      $document->save();

      return response()->json([
          "success" => true,
          "message" => "File successfully uploaded",
          "file" => $file,
          "oeuvre_litteraire" => $document
      ],200);

  }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OeuvreLitteraire  $oeuvreLitteraire
     * @return \Illuminate\Http\Response
     */
    public function show(OeuvreLitteraire $oeuvreLitteraire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OeuvreLitteraire  $oeuvreLitteraire
     * @return \Illuminate\Http\Response
     */
    public function edit(OeuvreLitteraire $oeuvreLitteraire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OeuvreLitteraire  $oeuvreLitteraire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OeuvreLitteraire $oeuvreLitteraire)
    {
        $oeuvreLitteraire->update($request->all());
        return response(["oeuvreLitteraire"=> new OeuvreLitteraireResource($oeuvreLitteraire),'message'=>"Success 200"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OeuvreLitteraire  $oeuvreLitteraire
     * @return \Illuminate\Http\Response
     */
    public function destroy(OeuvreLitteraire $oeuvreLitteraire)
    {
        $oeuvreLitteraire->delete();
        return response()->json(['message'=>'Succefuly delete !!'],200);
    }

}
