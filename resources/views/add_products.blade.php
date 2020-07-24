<!DOCTYPE html>
<html lang="en">
<head>
  <title>JobBoard &mdash; Website Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <link rel="stylesheet" href="css/custom-bs.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/bootstrap-select.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/line-icons/style.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/quill.snow.css">
  

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/style.css">    
</head>
<body>
    <section class="site-section">
        <div class="container">
  
          <div class="row mb-5">
            <div class="col-lg-12">
     <form action="/AP" method="post" role="form" enctype="multipart/form-data" class="p-4 p-md-5 border rounded">
        {{ csrf_field() }}
        <h3 class="text-black mb-5 border-bottom pb-2">ajouter un Produit</h3>
                
              
  
                <div class="form-group">
                  <label for="nom">Le nom :</label>
                  <input  name="nom" type="text" class="form-control" id="nom" placeholder="Jony">
                </div>
  
  
               
  
  
                <div class="form-group">
                    <label for="cat">Categorie :</label>
                    <input name="categorie_id" type="text" class="form-control" id="categorie_id" placeholder="categorie">
                  </div>
     
           
              

                  <div class="form-group">
                    <img class="img-fluid img-thumbnail" id="image" src="images/avatar/avatar.png" alt="" width="200" height="200">
                
                  <input type="text"  id="avatar" class=" btn btn-md" name="photo" placeholder="photo">
                
                </div>
             
     
  
                  <div class="form-group">
                                        <fieldset>
<label>taille :</label>

                    
                    <input  name="taille[]" type="checkbox" value="S" class="form-control">S 
                    <input  name="taille[]" type="checkbox" value="M" class="form-control">M
                    <input  name="taille[]" type="checkbox" value="L" class="form-control">L
                    <input  name="taille[]" type="checkbox" value="XL" class="form-control">XL
                    <input  name="taille[]" type="checkbox" value="XXL" class="form-control">XXL
</fieldset>

                  </div>
     
    
  
               
  
               
              
  
            </div>
  
           
          </div>
          <div class="row align-items-center mb-12">
            <div class="col-lg-12 ml-auto">
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-block btn-primary btn-md">Submit</button>
  
                  
              
                </div>
              </div>
            </div>
          </div></form>
        </div>
      </section>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <script>
  
      $(document).ready(function(){
  
      $('select[name="wilayas"]').on('change',function(){
      var wilaya_id=$(this).val();
      if(wilaya_id){
        $.ajax({
          
          url:'getCommune/'+wilaya_id,
                type:"GET",
                datatype:'json',
                success:function(data){               
                      $('select[name="communes"]').empty();
                      $.each(data,function(key,value){
                          $('select[name="communes"]').append('<option value="'+key+'">'+value+'</option>');
                      });
                  }
                })
      }
                else{
                      $('select[name="communes"]').empty();
                  }
              });
      })
  
      </script>
  
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/stickyfill.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/custom.js"></script>
     
</body>
</html>