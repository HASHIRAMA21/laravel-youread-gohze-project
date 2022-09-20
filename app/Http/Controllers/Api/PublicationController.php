<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Models\PublicationLikes;
use Illuminate\Http\Request;
use App\Http\Resources\PublicationResource;

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
     public function store(Request $request) {
        $publication = new Publication();
        $publication->files = $request->file('file')->store('public');
        $result = $publication->save();
        if($result) {
            return response()->json(['message'=>'Successfully added the file in the database','publication'=>$publication],200);
        }else {
            return response()->json([' message'=>'error try to add the file']);
        }
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

    public function addPublications1(Request $request)
    {
        $request->validate(['file' => 'required|mimes:doc,docx,xlx,csv,pdf|max:1024']);

    $file_name = time().'.'.$request->file->extension();

    $request->file->move(public_path('file uploads'), $file_name);

    return back()
        ->with('success','Successfully uploaded a file!')
        ->with('file',$file_name);
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
}
