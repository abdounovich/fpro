@extends('layouts.app')

@section('title', 'les commandes ')


@section('content')
<br>
<div class="h4">Commande en attente de confirmation </div>
<br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-hover" style="color: blanchedalmond">
 
  <tbody>
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Taille</th>
        <th>Nom</th>
        <th>Telephone</th>
        <th>Facebook</th>
        <th>Date</th>
        <th></th>
        <th></th>

      </tr>
    </thead>
   
 

    @foreach ( $comType1 as $cm )
    <tr>
      <td>{{$cm->id}}</td>

      <td>          <img class="img-fluid" width="50" height="50" src="{{$cm->product->photo}}" alt="">

      </td>
      <td>{{$cm->taille}}</td>
      <td>{{$cm->product->nom}}</td>
      <td>{{$cm->telephone}}</td>
      <td>{{$cm->facebook}}</td>
      <td>{{date('d-m-Y H:i', strtotime($cm->created_at))}}</td>
      <td>
      
      
        <form action="{{ route('commandes.update',$cm->id) }}" method="POST">
          @csrf
          @method('PUT')
     
          <input type="hidden" name="taille" value="{{ $cm->taille }}" class="form-control" placeholder="Name">
          <input type="hidden" name="product_id" value="{{ $cm->product->nom}}" class="form-control" placeholder="Name">
          <input type="hidden" name="telephone" value="{{ $cm->telephone }}" class="form-control" placeholder="Name">
          <input type="hidden" name="facebook" value="{{ $cm->facebook }}" class="form-control" placeholder="Name">
          <input type="hidden" name="type" value="2" class="form-control" placeholder="Name">
          <button type="submit" class="btn btn-success">confirmer</button>

        </form>
      </td><td>
              
                <form action="{{ route('commandes.destroy',$cm->id) }}" method="POST">
 
                 
 
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger">effacer</button>
              
       
      </form>
      
      </td>


    </tr> @endforeach
  </tbody>
</table>
</div>


<p></p>
<div class="container">
<br>
<div class="h4">Commande en attente de livraison</div>
<br>
<table class="table table-hover" style="color: blanchedalmond">
  <thead>
  <tr>
    <th>ID</th>
    <th>Photo</th>
    <th>Taille</th>
    <th>Nom</th>
    <th>Telephone</th>
    <th>Facebook</th>
    <th>Date</th>
    <th></th>
    <th></th>

  </tr>
</thead>
<tbody>
   
 


  @foreach ( $comType2 as $cm )
  <tr>
    <td>{{$cm->id}}</td>

    <td>          <img class="img-fluid" width="50" height="50" src="{{$cm->product->photo}}" alt="">

    </td>
    <td>{{$cm->taille}}</td>
    <td>{{$cm->product->nom}}</td>
    <td>{{$cm->telephone}}</td>
    <td>{{$cm->facebook}}</td>
    <td>{{$cm->created_at}}</td>
    <td>
    
    
      <form action="{{ route('commandes.update',$cm->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <input type="hidden" name="taille" value="{{ $cm->taille }}">
        <input type="hidden" name="product_id" value="{{ $cm->product->nom}}">
        <input type="hidden" name="telephone" value="{{ $cm->telephone }}" >
        <input type="hidden" name="facebook" value="{{ $cm->facebook }}" >
        <input type="hidden" name="type" value="3" >

           

              <button type="submit" class="btn btn-warning">Délivrer</button>
           
     
    </form>
    
    </td>
    <td></td>


  </tr> @endforeach
</tbody>
</table>
</div>





<p></p>
<div class="container">
<br>
<div class="h4">Commandes livrée</div>
<br>
<table class="table table-hover" style="color: blanchedalmond">
  <thead>
  <tr>
    <th>ID</th>
    <th>Photo</th>
    <th>Taille</th>
    <th>Nom</th>
    <th>Telephone</th>
    <th>Facebook</th>
    <th>Date</th>
    <th></th>
    <th></th>

  </tr>
</thead>
<tbody>
   
 


  @foreach ( $comType3 as $cm )
  <tr>
    <td>{{$cm->id}}</td>

    <td><img class="img-fluid" width="50" height="50" src="{{$cm->product->photo}}" alt="">

    </td>
    <td>{{$cm->taille}}</td>
    <td>{{$cm->product->nom}}</td>
    <td>{{$cm->telephone}}</td>
    <td>{{$cm->facebook}}</td>
    <td>{{$cm->created_at}}</td>
    <td>
    
      <form action="{{ route('commandes.update',$cm->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <input type="hidden" name="taille" value="{{ $cm->taille }}">
        <input type="hidden" name="product_id" value="{{ $cm->product->nom}}">
        <input type="hidden" name="telephone" value="{{ $cm->telephone }}" >
        <input type="hidden" name="facebook" value="{{ $cm->facebook }}" >
        <input type="hidden" name="type" value="1" >

           

           
              <button type="submit" class="btn btn-warning">retour au stock</button>
           
     
    </form>
    </td>
<td></td>

  </tr> @endforeach
</tbody>
</table>
@endsection
 

