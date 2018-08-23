<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Products;
use App\Models\Brands;  
use App\Models\Category;
use Input;  
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use PDF;
use Alert;

class ProductsController extends Controller
{   


    public function __construct()
    {
        $this->middleware('admin');
    }
    /**  
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request, Builder $htmlBuilder)
    {   
        $product = Products::all();
        if ($request->ajax()) {
            $ajax = DataTables::of(Products::query()->with('Category'))->escapeColumns([])->make(true);
            return $ajax;
    }
    
       $dataTable = $htmlBuilder
            ->addColumn(['data' => 'products_id', 'name' => 'products_id', 'title' => 'ID' ,'width'=>'5%'])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Product Name', 'render' => function () {
                $editUrl = route('backend.products.edit', '');
                return "function(data,type,full,meta){ return '<a href=" . $editUrl . "/'+full.products_id+'>'+data+'</a>'; }";
            }])
            ->addColumn(['data' => 'category.name', 'name' => 'category.name', 'title' => 'Category' ])
            ->addAction(['title' => 'Delete','name' => 'del_but', 'id' => 'del_but' ,'render' => function () {
                $editUrl = route('backend.products.delete', '');
                return "function(data,type,full,meta){ return '<a><button class=\'btn btn-danger\' data-toggle=\'modal\' data-target=\'#delete\' onclick=\'conPro('+full.products_id+')\'> Delete</button></a>'; }";
            }])   
          
            ->parameters([
                'ordering'    => true,
                'processing'  => 'true',
                'autoWidth'   => true,
                'width'       => "10%", "targets" => '0',
                'pageLength'  => '15',
                'searchDelay' => '1000',
            ]);

    return view('backend.products.index', compact('dataTable', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'category_id'   => 'required',
            'price'         => 'required',
            'details'       => 'required',
            'weight'        => 'nullable|int',

            ]);

        $images_a=[];
        if ($request->hasFile('image_1')) {
         $image_1 = $request->file('image_1');
         $realname = pathinfo($request->file('image_1')->getClientOriginalName(), PATHINFO_FILENAME);
         $extension = $image_1->getClientOriginalExtension();
         $new_name_1 = $realname."-".time().".".$extension;
         $request->file('image_1')->storeAs('public/products', $new_name_1);
         $path = Storage::url($new_name_1);
         $images_a =array('image_1' => $new_name_1);
         
        }
        else{
            $new_name_1 = "";
        }

        $images_b=[];
         if ($request->hasFile('image_2')) {
         $image_2 = $request->file('image_2');
         $realname = pathinfo($request->file('image_2')->getClientOriginalName(), PATHINFO_FILENAME);
         $extension = $image_2->getClientOriginalExtension();
         $new_name_2 = $realname."-".time().".".$extension;
         $request->file('image_2')->storeAs('public/products', $new_name_2);
         $path = Storage::url($new_name_2);
         $images_b =array('image_2' => $new_name_2);
         

        }
        
        else{
            $new_name_2 = "";
        }

        
         $images_c=[];
         if ($request->hasFile('image_3')) {
         $image_3 = $request->file('image_3');
         $realname = pathinfo($request->file('image_3')->getClientOriginalName(), PATHINFO_FILENAME);
         $extension = $image_3->getClientOriginalExtension();
         $new_name_3 = $realname."-".time().".".$extension;
         $request->file('image_3')->storeAs('public/products', $new_name_3);
         $path = Storage::url($new_name_3);
         $images_c =array('image_3' => $new_name_3);
         
        } 

        else{
            $new_name_3="";
        }

        $products_id    = array('products_id' => ucfirst($request->products_id));
        $name           = array('name' =>ucfirst($request->name)); 
        $category_id    = array('category_id' =>ucfirst($request->category_id)); 
        $brand_id       = array('brand_id'=> '6');
        $weight         = array('weight' => ucfirst($request->weight));  
        $price          = array('price' =>ucfirst($request->price));
        $details        = array('details' =>ucfirst($request->details));
        $image_1        = array('image_1' =>$new_name_1); 
        $image_2        = array('image_2' =>$new_name_2);
        $image_3        = array('image_3' =>$new_name_3);
        $status         = array('status' => $request->has('status') ? 1 : 0);
        $input          = array_merge($name, $status, $products_id, $category_id, $brand_id, $weight, $price, $details, $image_1, $image_2, $image_3);


        
        
        Products::create($input);


       
        return redirect()->route('backend.products.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products   = Products::findOrFail($id);
        return view('backend.products.edit', compact('products'));////
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
       $this->validate($request, [
            'name'          => 'required',
            'category_id'   => 'required',
            'price'         => 'required',
            'details'       => 'required',
            'weight'        => 'nullable|integer',
            ]);


         $images_a=[];
        if ($request->hasFile('image_1')) { 
         $image_1 = $request->file('image_1');
         $realname = pathinfo($request->file('image_1')->getClientOriginalName(), PATHINFO_FILENAME);
         $extension = $image_1->getClientOriginalExtension();
         $new_name_1 = $realname."-".time().".".$extension;
         $request->file('image_1')->storeAs('public/products', $new_name_1);
         $path = Storage::url($new_name_1);
         $images_a =array('image_1' => $new_name_1);
         
        }else{
            $new_name_1 = "";
        }

        $images_b=[];
         if ($request->hasFile('image_2')) {
         $image_2 = $request->file('image_2');
         $realname = pathinfo($request->file('image_2')->getClientOriginalName(), PATHINFO_FILENAME);
         $extension = $image_2->getClientOriginalExtension();
         $new_name_2 = $realname."-".time().".".$extension;
         $request->file('image_2')->storeAs('public/products', $new_name_2);
         $path = Storage::url($new_name_2);
         $images_b =array('image_2' => $new_name_2);
         
        }
        else{
            $new_name_2 = "";
        }

        
         $images_c=[];
         if ($request->hasFile('image_3')) {
         $image_3 = $request->file('image_3');
         $realname = pathinfo($request->file('image_3')->getClientOriginalName(), PATHINFO_FILENAME);
         $extension = $image_3->getClientOriginalExtension();
         $new_name_3 = $realname."-".time().".".$extension;
         $request->file('image_3')->storeAs('public/products', $new_name_3);
         $path = Storage::url($new_name_3);
         $images_c =array('image_3' => $new_name_3);
         
        } 
        else{
            $new_name_3 = "";
        }

        $products_id    = array('products_id' => ucfirst($request->products_id));
        $name           = array('name' =>ucfirst($request->name)); 
        $category_id    = array('category_id' =>ucfirst($request->category_id)); 
        $brand_id       = array('brand_id'=> '6');
        $weight         = array('weight' => ucfirst($request->weight)); 
        $price          = array('price' =>ucfirst($request->price));
        $details        = array('details' =>ucfirst($request->details));
        $image_1        = array('image_1' =>$new_name_1); 
        $image_2        = array('image_2' =>$new_name_2);
        $image_3        = array('image_3' =>$new_name_3);
        $status         = array('status' => $request->has('status') ? 1 : 0);
        $data           = array_except(Input::all(),['_method', '_token', 'status'] ) ;
        $input          = array_merge($name, $products_id, $category_id, $brand_id, $weight, $price, $details, $image_1, $image_2, $image_3);
         
        $products = Products::findOrFail($id);
        $products->update($input);


        return redirect()->route('backend.products.list');
    }

    public function delete($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        
        //flash()->success('Success', ['name' => $products->name]);
        Alert::success('Delete category success', 'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
