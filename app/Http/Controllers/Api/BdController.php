<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BdResource;
use App\Http\Resources\PublicationResource;
use App\Models\Bd;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $bd = Bd::all();
            return response([ 'bd' =>
                BdResource::collection($bd),
                'message' => 'Successful'], 200);
        }
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
      $document = new Bd();
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
     * @param  \App\Models\Bd  $bd
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        $bd = Bd::find($id);
        if(!empty($book))
        {
            return response()->json($bd);
        }
        else
        {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bd  $bd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bd $bd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bd  $bd
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Bd::where('id', $id)->exists())
        {
            $bd = Bd::find($id);
            $bd->delete();

            return response()->json([
              "message" => "records deleted."
            ], 202);
        } else {
            return response()->json([
              "message" => "bd not found."
            ], 404);
        }
    }

    public function paginateBd() {
        $bd = Bd::paginate(40);
        return $bd;
    }


    public function  store1(Request $request,$id) {
        $bd = Bd::find($id);
        $bd->update($request->all());
        return $bd;
    }
    public function uploadBd(Request $request){
        $request->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:204800'
        ]);

        $bd = new Bd();

        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $bd->title = $request->title;
            $bd->authors = $request->authors;
            $bd->category = $request->category;
            $bd->publishing_house = $request->publishing_date;
            $bd->parution_date = $request->parution_date;
            $bd->files_name = time().'_'.$request->file->getClientOriginalName();
            $bd->files = '/storage/' . $filePath;
            $bd->images = addMedia($pathToFile)->toMediaCollection('images');

            $bd->save();

            return response()->json(['message'=>'Succefully add Bd','bd'=>$bd]);
            /*
            back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
            */
        }
   }
        public function createForm(){
          return view('file-upload');
            }

}







