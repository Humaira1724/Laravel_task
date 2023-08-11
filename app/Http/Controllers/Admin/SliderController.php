<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\SliderFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
   public function index()
   {
    $sliders = Slider::all();
    return view('admin.slider.index', compact('sliders'));
   }

   public function create(){
    return view('admin.slider.create');
   }
   public function store(SliderFormRequest $request){
    $validatedData = $request->validated();
    if($request->hasFile('image')){
        $file= $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/slider/',$filename);
        $validatedData['image'] = 'uploads/slider/'.$filename;
    }
    
    Slider::create([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'image' => $validatedData['image'],
    ]);
    
    return redirect('admin/sliders')->with('message', 'Slider Added Successfully');
    
   }
   public function edit(Slider $slider)
   {
    return view('admin.slider.edit',compact('slider'));
   }

   public function update(SliderFormRequest $request,Slider $slider)
   {
   
    $validatedData = $request->validated();
    if($request->hasFile('image')){

        $destination = $slider->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $file= $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/slider/',$filename);
        $validatedData['image'] = 'uploads/slider/'.$filename;
    }
    Slider::where('id',$slider->id)->update([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'image' => $validatedData['image']?? $slider->image,
    ]);
    
    return redirect('admin/sliders')->with('message', 'Slider Updated Successfully');
   }

   public function destroy(Slider $slider)
   {
    if($slider->count()>0){
        $destination = $slider->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $slider->delete();
        return redirect('admin/sliders')->with('message','Slider Deleted Successfully');
    }
    return redirect('admin/sliders')->with('message','Something Went Wrong');
   }
}
