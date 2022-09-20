<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PublicationLikes;

class PublicationLikeController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function likeOrDislike(Request $request): \Illuminate\Http\JsonResponse
    {
        $rules = [
            'publication_id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user_id = auth()->user()->id;
        $publication_id = $request->input('publication_id');
        $status = $request->input('status');

        try {
            $likeIdCheck = PublicationLikes::where([
                'user_id' => $user_id,
                'publication_id' => $publication_id
            ])->first();

            if ($likeIdCheck == null) {
                PublicationLikes::create([
                    'user_id' => $user_id,
                    'publication_id' => $publication_id,
                    'status' => $status
                ]);
            } elseif ($likeIdCheck->status == $status) {
                $newData = PublicationLikes::find($likeIdCheck->id);
                $newData->update([
                    'status' => null
                ]);
            } elseif ($likeIdCheck->status == !$status) {
                $newData = PublicationLikes::find($likeIdCheck->id);
                $newData->update([
                    'status' => $status
                ]);
            } elseif ($likeIdCheck->status == null) {
                $newData = PublicationLikes::find($likeIdCheck->id);
                $newData->update([
                    'status' => $status
                ]);
            }

            $statusUpdate['status'] = PublicationLikes::find($likeIdCheck->id)->status;
            $statusUpdate['likes'] = PublicationLikes::where('publication_id', $publication_id)->where('status', 1)->count();
            $statusUpdate['dislikes'] = PublicationLikes::where('publication_id', $publication_id)->where('status', 0)->count();

            return response()->json($statusUpdate, 200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }
}