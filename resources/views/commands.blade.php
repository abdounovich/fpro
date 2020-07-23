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
        <th>Telephone</th>
        <th>Facebook</th>
        <th>Date</th>

      </tr>
    </thead>
    <tbody>
       
     
   
  
      @foreach ( $com as $cm )
      <tr>
        <td>{{$cm->id}}</td>

        <td>          <img class="img-fluid" width="200" height="200" src="'https://www.dropbox.com/home/Applications/ajmoda/'.{{$cm->photo}}" alt="">

        </td>
        <td>{{$cm->taille}}</td>
        <td>{{$cm->nom}}</td>
        <td>{{$cm->telephone}}</td>
        <td>{{$cm->facebook}}</td>
        <td>{{$cm->created_at}}</td>

      </tr> @endforeach
    </tbody>
  </table>
</div>

</body>
</html>

