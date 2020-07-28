<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <br>
  <div class="h3">Commande en attente de confirmation </div>
  <br>
  <table class="table">
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

      </tr>
    </thead>
    <tbody>
       
     
   
  
      @foreach ( $comType1 as $cm )
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
       
            <input type="hidden" name="taille" value="{{ $cm->taille }}" class="form-control" placeholder="Name">
            <input type="hidden" name="product_id" value="{{ $cm->product->nom}}" class="form-control" placeholder="Name">
            <input type="hidden" name="telephone" value="{{ $cm->telephone }}" class="form-control" placeholder="Name">
            <input type="hidden" name="facebook" value="{{ $cm->facebook }}" class="form-control" placeholder="Name">
            <input type="hidden" name="type" value="2" class="form-control" placeholder="Name">

               
    
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-success">Confirmer </button>
                
                  <form action="{{ route('commandes.destroy',$cm->id) }}" method="POST">
   
    
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </div>
         
        </form>
        
        </td>


      </tr> @endforeach
    </tbody>
  </table>
</div>


<p></p>
<div class="container">
  <br>
  <div class="h3">Commande en attente de livraison</div>
  <br>
<table class="table">
 
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

             
  
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-warning">Délivrer</button>
              </div>
       
      </form>
      
      </td>


    </tr> @endforeach
  </tbody>
</table>
</div>





<p></p>
<div class="container">
  <br>
  <div class="h3">Commandes livrée</div>
  <br>
<table class="table">
 
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
      
        <form action="" method="POST">
          @csrf
         
  
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-danger">retour</button>
              </div>
       
      </form>
      
      </td>


    </tr> @endforeach
  </tbody>
</table>
</div>
</body>
</html>

