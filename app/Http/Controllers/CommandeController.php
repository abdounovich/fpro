<?php

namespace App\Http\Controllers;

use App\Taille;
use App\Product;
use App\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function single($fb)
    {
        $com=Commande::where('facebook',$fb)->get();
      
        return view('commande')->with('com',$com);
            
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
    public function store()
    {
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $comType1=Commande::where('type','1')->get();
        $comType2=Commande::where('type','2')->get();
        $comType3=Commande::where('type','3')->get();
        

        return view('commands')->with('comType1',$comType1)->with('comType2',$comType2)->with('comType3',$comType3);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Commande $commande)
    {
  
        $bl=Commande::where('id',$commande)->first();
        $tr=Taille::where('product_id',$bl->product_id)->where('taille',$bl->taille)
        ->update(array('nombre' => $tr->nombre+1));  

        return redirect('/commandes');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        $commande->update($request->all());
        return redirect('/commandes');

    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
     
        Commande::find($commande)->delete();

        return redirect('commandes');
        //
    }
}
