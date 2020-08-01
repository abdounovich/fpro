


@extends('layouts.app')

@section('title', 'Liste des produits')


@section('content')
<h2>Contextual Classes</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Taille</th>
        <th>Nom</th>
    
      </tr>
    </thead>
    <tbody>
       
     
   
  
      @foreach ( $pro as $p )
      <tr>
        <td>{{$p->id}}</td>

        <td><img class="img-fluid" width="200" height="200" src="{{$p->photo}}" alt="">
         <div class="h2">{{$p->nom}}</div>

        </td>


      
      
   
        <td> <ul>  @foreach ($p->taille as $t)<li>{{  $t->taille }} @endforeach</ul></td> 
       
          <td> <ul>  @foreach ($p->taille as $t)<li>{{  $t->nombre }} @endforeach</ul></td> 
    
 

      </tr> @endforeach
    </tbody>
  </table>

@endsection


 