<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>


@extends('layouts.app')

@section('content')
@if (\Session::has('msg-success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg-success') !!}</li>
        </ul>
    </div>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View Product Details</div>
                    <div id="infor"> 
                        <div class="row">
                            <div class="col-md-6">  
                                <img src="{{URL('images').'/'.$product_details->images }}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> 
                            </div>
                            <div class="col-md-6">  
                                <ul class="list-group">
                                    <li class="list-group-item">Color: {{$product_details->color }}</li>
                                    <li class="list-group-item">Price: {{$product_details->price }}</li>
                                    <li class="list-group-item">Quantity: {{$product_details->quantity }}</li>
                                </ul>
                                <div>Available Size</div>
                                <select id="product_size" type="text" class="form-control" name="product_size">
                                    @foreach($product as $p)
                                        <option value={{$p->id}} selected>{{$p->size}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>        
  
</div>

</body>
</html>

@endsection

<script>
jQuery(document).ready(function(){
  $("#product_size").change(function() {
    var id = this.value;
    $.ajax({
     url: "<?php echo url('details_product'); ?>",
     data: {'id':this.value},
     method: 'post',
     success: function(msg){

       $("#infor").html(msg);
        
     }
   });
  });
});
</script>