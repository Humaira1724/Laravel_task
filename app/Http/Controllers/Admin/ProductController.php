<?php
namespace App\Http\Controllers\Admin;

use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductFormRequest;   
use Illuminate\Support\Str; 
use App\Models\Color;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
    return view('admin.products.index', compact('products'));
    }

    public function create()
    { 
        $colors = Color::all();
        $categories = Category::all();
        return view('admin.products.create',compact('categories', 'colors'));
    }
    public function store(Request $request)
    {
       $category_id = $request -> category_id;
       $name = $request -> name;    
       $description = $request -> descriptio;
       $original_price = $request -> original_price;
       $selling_price = $request -> selling_price;
       $quantity = $request -> quantity;
       $meta_title = $request -> meta_title;
       $meta_keyword = $request -> meta_keyword;
       $meta_description = $request -> meta_description;

        $Product = new Product;
       $product = $Product->create([
    'category_id' => $category_id,
    'name' => $name,     
    'description' => $description,
    'original_price' => $original_price,
    'selling_price' => $selling_price,
    'quantity' => $quantity,            
    'meta_title' => $meta_title,
    'meta_keyword' => $meta_keyword,
    'meta_description' => $meta_description
]);


         
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $i=0;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() .$i++. '.' . $extension;
                $imageFile->move($uploadPath, $filename); // Changed $file to $imageFile
                $finalImagePathName = $uploadPath . $filename; // Removed the hyphen
        
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        if($request->colors){
            foreach($request->colors as $key => $color){
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color, // Use the correct integer value for the color_id
                    'quantity' => $request->colorquantity[$key] ?? 0
                ]);
            }
        }
       return redirect('/admin/products')->with('message','Product Added Successfully');
    }

   
public function edit(int $product_id) 
  {
    $categories = Category::all();
    $product = Product::findOrFail($product_id);
    return view('admin.products.edit',compact('categories','product'));
  }
  public function update(Request $request)
  {
    // print_r($_POST);
    // exit();
    $product_id = $request->product_id;
    $category_id = $request->category_id;
    $name = $request->name;
    $original_price = $request->original_price;
    $selling_price = $request->selling_price;
    $quantity = $request->quantity;
    
   
    
    $product = Product::findOrFail($product_id);
    
    if($product)
    {
        $product->update([
        'category_id' => $category_id,
        'name' => $name,
        'original_price' => $original_price,
        'selling_price' => $selling_price,
        'quantity' => $quantity
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $i=0;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() .$i++. '.' . $extension;
                $imageFile->move($uploadPath, $filename); // Changed $file to $imageFile
                $finalImagePathName = $uploadPath . $filename; // Removed the hyphen
        
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
       return redirect('/admin/products')->with('message','Product Updated Successfully');
    }
    else
    {
        return redirect('admin/products')->with('message','No such product id found  ');
    }

  }
  
  public function destroyImage(int $product_image_id)
  {
      $productImage = ProductImage::findOrFail($product_image_id);
  
      if (File::exists($productImage->image)) {
          File::delete($productImage->image);
      }
  
      $productImage->delete();
      return redirect()->back()->with('message', 'Product Image deleted');
  }
  public function destroy(int $product_id)
  {
    $product = Product::findOrFail($product_id);
    if($product->productImages){
        foreach($product->productImages as $image){
            if(File::exists($image->image)){
                File::delete($image->image);
            }
        }
    }
    $product->delete();
    return redirect()->back()->with('message', 'Product deleted with its Image');
  }
}