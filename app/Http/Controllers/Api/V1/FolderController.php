<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\User;

class FolderController extends Controller
{
    public function storeFolder(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required'
        ]);

        $user = User::find($request->user_id);

        if( !$user ){
            return response()->json([
                'status' => 0,
                'message' => 'This user id does not exists !'
            ]);
        }

        $folder = new Folder;
        $folder->user_id = $request->user_id;
        $folder->name = $request->name;
        $folder->save();

        return response()->json([
            'status' => 1,
            'message' => 'Folder Created Successfully ...'
        ]);
    }

    public function myFolders(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $user = User::find($request->user_id);

        if( !$user ){
            return response()->json([
                'status' => 0,
                'message' => 'This user id does not exists !'
            ]);
        }

        $folders = Folder::where('user_id' , $request->user_id)->paginate(10);

        return response()->json([
            'data' => $folders
        ]);
    }
}
