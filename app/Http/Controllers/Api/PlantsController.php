<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants=Plant::get();

        // $msg =["ok"];
        // return response($plants,200,$msg);
        $array=[
            'data'=>$plants,
            'message'=>'ok',
            'status'=>200,
        ];
        return response($array,200);

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
      $plant = Plant::create($request->all());
      if($plant){
        $array=[
            'data'=>$plant,
            'message'=>'the plant saved',
            'status'=>200,
        ];
        return response($array,200);
    }else{
        $array=[
            'data'=>null,
            'message'=>'the plant saved',
            'status'=>400,
        ];
        return response($array,200);
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
        $plant = Plant::find($id);
        if($plant){
            $array=[
                'data'=>$plant,
                'message'=>'ok',
                'status'=>200,
            ];
            return response($array,200);
        }else{
            $array=[
                'data'=>null,
                'message'=>'empty',
                'status'=>200,
            ];
            return response($array,200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $plant= Plant::find($id);
        $plant->update($request->all());
        if($plant){
            $array=[
                'data'=>$plant,
                'message'=>'updated',
                'status'=>200,
            ];
            return response($array,200);
        }else{
            $array=[
                'data'=>null,
                'message'=>'not updated',
                'status'=>400,
            ];
            return response($array,200);
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
        $plant= Plant::find($id);
        if($plant){
            $plant->delete($id);
            $array=[
                'data'=>null,
                'message'=>'deleted',
                'status'=>200,
            ];
            return response($array,200);
        }else{
            $array=[
                'data'=>null,
                'message'=>'not found',
                'status'=>404,
            ];
            return response($array,404);
        }

    }
    public function search($name){
       $plants=Plant::where('name','LIKE','%'.$name.'%')->get();
       
       if($plants){
        $array=[
            'data'=>$plants,
            'message'=>'plants',
            'status'=>200,
        ];
        return response($array,200);
    }else{
        $array=[
            'data'=>null,
            'message'=>'not found',
            'status'=>200,
        ];
        return response($array,200);
    }
    }
}
