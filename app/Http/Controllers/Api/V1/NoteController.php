<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Folder;
use App\Models\Note;

class NoteController extends Controller
{
    public function storeNote(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'folder_id' => 'required',
            'note_type' => 'required|in:text,pdf',
            'name' => 'nullable',
            'pdf_file' => 'nullable|file|mimes:pdf'
        ]);

        $user = User::find($request->user_id);
        $folder = Folder::find($request->folder_id);

        if( !$user ){
            return response()->json([
                'status' => 0,
                'message' => 'This user id does not exists !'
            ]);
        }

        if( !$folder ){
            return response()->json([
                'status' => 0,
                'message' => 'This folder id does not exists !'
            ]);
        }

        $note = new Note;
        if( $request->pdf_file && $request->note_type == 'pdf' ){
            $pdf_file = $request->pdf_file;
            $pdf_file_new = time() . '_' . $pdf_file->getClientOriginalName();
            $pdf_file->move('uploads/notes/', $pdf_file_new);
            $note->pdf_file = 'uploads/notes/'. $pdf_file_new;
        }
        $note->user_id = $request->user_id;
        $note->folder_id = $request->folder_id;
        $note->name = $request->name;
        $note->note_type = $request->note_type;
        $note->save();

        return response()->json([
            'status' => 1,
            'message' => 'Note Created Successfully ...'
        ]);
    }

    public function myNotes(Request $request)
    {
        $user = User::find($request->user_id);
        $folder = Folder::find($request->folder_id);

        if( !$user ){
            return response()->json([
                'status' => 0,
                'message' => 'This user id does not exists !'
            ]);
        }

        if( !$folder ){
            return response()->json([
                'status' => 0,
                'message' => 'This folder id does not exists !'
            ]);
        }

        $notes = Note::where('user_id' , $request->user_id)->where('folder_id' , $request->folder_id)->paginate(10);

        return response()->json([
            'data' => $notes
        ]);
    }

    public function notesForAll()
    {
        $notes = Note::with(['user'])->paginate(10);

        return response()->json([
            'data' => $notes
        ]);
    }
}
