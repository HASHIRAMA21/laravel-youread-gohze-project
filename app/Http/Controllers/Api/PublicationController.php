<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bd;
use App\Models\Publication;
use App\Models\PublicationLikes;
use Illuminate\Http\Request;
use App\Http\Resources\PublicationResource;
use Illuminate\Support\Facades\Validator;

class PublicationController extends Controller
{

    public function index()
    {
        $publication = Publication::all();
        return response([ 'publications' =>
            PublicationResource::collection($publication),
            'message' => 'Successful'], 200);
    }

    public function getPublicationPaginate() {
        $publication = Publication::paginate(20);
        return $publication;
    }

    public function addPublication(Request $request)
    {
        $valiator = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_publication' => 'required',
            'category' =>'required',
            'image'=>'image',
            'file'=>'file'
        ]);
        $publication = Publication::create($request->all());

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $publication->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return $publication;

    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),
        [
        'title' =>'required',
        //'authors' =>'required',
        'description' =>'required',
        'category' =>'required',
        'status'=>'required',
        'publish_date' => 'required',
        //'user_id' => 'required',
        'file' => 'required|mimes:doc,docx,pdf,txt|max:204800',
       ]);

if ($validator->fails()) {
      return response()->json(['error'=>$validator->errors()], 401);
   }


   if ($files = $request->file('file')) {

      //store file into document folder
      $file = $request->file->store('public/documents/oeuvrelitteraire');

      //store your file into database
      $document = new Publication();
      $document->title = $request->title;
      //$document->authors = $request->authors;
      $document->description = $request->description;
      $document->category = $request->category;
      $document->status = $request->status;
      $document->publish_date = $request->publish_date;
      $document->file = $file;
     // $document->user_id = auth()->user()->id;

      if($request->hasFile('image') && $request->file('image')->isValid()){
        $document->addMediaFromRequest('image')->toMediaCollection('images');
      }

      $document->save();

      return response()->json([
          "success" => true,
          "message" => "File successfully uploaded",
          "file" => $file,
          "bds" => $document
      ],200);

  }
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        return response()->json(['message'=>'He this is the Publication','publication'=>$publication]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        $publication->update($request->all());
        return response(["publication"=> new PublicationResource($publication),'message'=>"Success 200"]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
     $publication->delete();
     return  response(['message'=>"Successfull delete publication"]);
    }

    public function getSimilarPublication($id) {
        $publication = Publication::findOrFail($id);

        $user_id = auth()->user()->id; //User::class->id;

        $publication['likes'] = PublicationLikes::where('publication_id',$id)->where('status',1)->count();
        $publication['dislikes'] = PublicationLikes::where('publication_id',$id)->where('user_id',$user_id)-count();
        $likesStatus = PublicationLikes::where('publication_id',$id)->where('user_id',$user_id)->get('status');

        $publication['likeStatus'] = count($likesStatus) == 1 ? $likesStatus[0]['status'] : null;

        if(isset($publication)) {
            $publication->increment('views');
        }
        //simillar content
        $similarPublication = collect();

        $publication = Publication::select('id','titre','description','category','views')->take(20)->get();
        $cat = json_decode($publication['category']);
        foreach($publication as $pub) {
            $pubCat = json_decode($pub['category']);
        }

        $isPushed = false;
        foreach ($cat as $i) {
            foreach ($pubCat as $j) {
                if (strcmp(trim(strtolower($i)), trim(strtolower($j))) == 0 && $pub['id'] != $publication['id']) {
                    $similarPublication->push($pub);
                    $isPushed = true;
                    break;
                }
                if ($isPushed) {
                    break;
                }
            }
            if ($isPushed) {
                break;
            }
        }
        $publication['similarPublication'] = $similarPublication;

        return response()->json($publication,200);
    }


    public function uniquePublication($id)
    {
        $publication = Publication::findOrFail($id);

        if(!empty($publication))
        {
            return response()->json($publication);
        }
        else
        {
            return response()->json([
                "message" => "Publication not found"
            ], 404);
        }
    }
}
