<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Plant;

class AdminPlantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants= Plant::all();
        return view('admin.crud_plants.allplants',compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud_plants.create_plant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>"required|string|max:150",
            'price'=>"required|numeric",
            "description"=>"required|string|max:500",
            "image"=>"required|image|mimes:png,jpg,gif,gpeg"
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('front/uploads'),$imageName);

        $plant = new Plant();
        $plant->name = $request->name;
        $plant->price = $request->price;
        $plant->description = $request->description;
        $plant->image = $imageName;
        $plant->save();

        return back()->with('success','data inserted  successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        return view('admin.crud_plants.edit_plant', compact('plant'));
  
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
        $name = $request->name;
        $price = $request->price;
        $description = $request->description;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('front/uploads'),$imageName);
        $this->validate($request, [
            'name'=>"required|string|max:150",
            'price'=>"required|numeric",
            "description"=>"required|string|max:500",
            "image"=>"required|image|mimes:png,jpg,gif,gpeg"
        ], [

            'name.required' => 'Please Enter The product Name',
            'name.unique' => 'product Name Pre-Registered',

        ]);
        $plant = Plant::find($id);
        $plant->update([
            'name' => $name,
            'description' => $description,
            'price'=>$price,
            'image'=>$imageName,


        ]);
        return redirect(route('allplants.index'))->with(session()->flash('success', 'Edit Successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plant = Plant::find($id);
        $plant->delete();
        return redirect()->back()->with(session()->flash('success', 'Delete Successfully'));;
   
    }
}
