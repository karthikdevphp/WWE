<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Validator;

class VideoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "Hi hello";
        $videos = Video::all();
        return response()->json($videos);
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
        //return "123";
        
        $validator = Validator::make($request->all(),['title'=>'required']);
        
        if($validator->fails()){
            $response = array('response'=>$validator->messages(),"success"=>false);
            return $response;
        }else{
           $video = new Video;
           $video->title = $request->input('title');
           $video->filename = $request->input('filename');
           $video->save();
           
           return response()->json($video);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return response()->json($video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),['title'=>'required']);
        
        if($validator->fails()){
            $response = array('response'=>$validator->messages(),"success"=>false);
            return $response;
        }else{
           $video = Video::find($id);
           $video->title = $request->input('title');
           $video->filename = $request->input('filename');
           $video->save();
           
           return response()->json($video);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
            
    {
        $video = Video::find($id);
        $video->delete();
        $response = array('response'=>'item deleted',"success"=>true);
        return $response;
    }
}
