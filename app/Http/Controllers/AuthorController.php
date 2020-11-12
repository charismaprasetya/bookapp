<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Author;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
    public function index()
    {
        return Author::all();
    }

    public function time()
    {
        $date = Carbon::now();
        return response()->json(['Time' => [
            'date' => $date->toDateTimeString(),
            'timezone_type' => $date->getTimezone()
        ]]);
    }

    
    public function getAuthorbyId($id){
        $author = DB::table('author')->where('id', $id)->first();
        if($author){
            return response()->json(['message'=>'Success', 'data'=>$author], 200);
        }else{
            return response()->json(['message'=>'author not found'], 404);
        }

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'biography' => 'required'
        ]);

        $author = Author::create(
            $request->only(['name', 'gender', 'biography'])
        );

        return response()->json([
            'created' => true,
            'data' => $author
        ], 201);
    }

    public function update(Request $request, $id){
        try {
        $author = Author::findOrFail($id);
        } catch (ModelNotFoundException $e) {
        return response()->json([
            'message' => 'author not found'
        ], 404);
        }

        $author->fill(
        $request->only(['name', 'gender', 'biography'])
        );
        $author->save();

        return response()->json([
        'updated' => true,
        'data' => $author
        ], 200);
    }

    public function destroy($id){
        try {
        $author = Author::findOrFail($id);
        } catch (ModelNotFoundException $e) {
        return response()->json([
            'error' => [
            'message' => 'author not found'
            ]
        ], 404);
        }

        $author->delete();

        return response()->json([
        'deleted' => true
        ], 200);
    }
    



   
}