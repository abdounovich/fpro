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
</div>

</body>
</html>

