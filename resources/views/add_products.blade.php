@extends('layouts.app')

@section('title', 'Ajouter un produit')



@section('content')
<p></p><br/>
          <div class="row mb-5">
            <div class="col-lg-12">
     <form action="/AP"  method="post" role="form" enctype="multipart/form-data" class="p-4 p-md-5 border rounded">
        {{ csrf_field() }}

                <div class="form-group">
                  <label for="nom"> nom du produit:</label>
                  <input  name="nom" type="text" class="form-control" id="nom" placeholder="nom du produit">
                </div>
  
               
  
  
                <div class="form-group">
                    <label for="cat">Categorie :</label>
                    <input name="categorie_id" type="text" class="form-control" id="categorie_id" placeholder="categorie">
                  </div>
     
                  <div class="form-group">
                    <label for="cat">prix :</label>
                    <input name="prix" type="text" class="form-control" id="prix" placeholder="3000 da">
                  </div>
              

                  <div class="form-group">
                    <label for="photo">Photo du produit :</label>
<div class="row">
  <div class="col-2">                    <img class="img-fluid " id="image" src="https://res.cloudinary.com/ds9qfm1ok/image/upload/v1595881085/gallery-131964752828011266_ko0lhf.png" alt="" width="100" height="100">
  </div>
  <div class="col-10">                      <input type="file" name="photo" class="form-control" id="photo" value="">
  </div>
</div>
                    
                             
                </div>
             

                <script language="javascript">$('document').ready(function () {
                  $("#photo").change(function () {
                      if (this.files && this.files[0]) {
                          var reader = new FileReader();
                          reader.onload = function (e) {
                              $('#image').attr('src', e.target.result);
                          }
                          reader.readAsDataURL(this.files[0]);
                      }
                  });
                  });
              </script>
     
                <div class="form-group">
                  <label for="cat">Tailles :</label>
 @php ($lesTailles = ['standard','S','M','L','XL','XXL'])

                 
                 
                
                 
                  <div class="row"> @foreach ($lesTailles as $item)
                    <div class="col-1"><input name="taille{{$item}}" type="text" value="{{$item}}" class="form-control"  placeholder="taille" disabled>
                     <p></p>
                    <input name="nombre{{$item}}" type="text" value="3" class="form-control" placeholder="nombre"> 
                    </div>     @endforeach
                  </div>
                 
             
                 
                 

                </div>
               <div class="row">
            <div class="col-12 ">
              <button type="submit" class="btn btn-block btn-primary btn-md">Ajouter</button>

              
          
            </div>
          </div>
           
          </div>

        
          <div>
       
     
    
  
               
  
               
              
  
            </div>
  
           
          </div>
          <div class="row align-items-center mb-12">
            <div class="col-lg-12 ml-auto">
             
            </div>
          </div></form>
        
   
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
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
     

@endsection
  