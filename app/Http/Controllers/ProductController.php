<?php

namespace App\Http\Controllers;

use App\Taille;
use App\Product;
use App\Commande;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Intervention\Image\Facades\Image as Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       

            
        
           
            if ($request->isMethod('post')) 
                 
               {
         
                $image_name = $request->file('photo')->getRealPath();;
         
                Cloudder::upload($image_name, null);
         
                list($width, $height) = getimagesize($image_name);
         
                $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
              $p=new Product();
              $p->nom=$request->nom;
              $p->prix=$request->prix;
              $p->photo= $image_url;
              $p->categorie_id=$request->categorie_id;

              $p->save();

$Titem=['S','M','L','XL','XXL'];
foreach ($Titem as $key ) {

              $t=new Taille();
              $t->taille=$request->taille.$key;
              $t->nombre=$request->get('nombre'.$key);
           
              $t->product_id= $p->id;

              $t->save();
            }
            }

              return view('add_products');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pro=Product::all();
      
        return view('show_products')->with('pro',$pro);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }



   
}
