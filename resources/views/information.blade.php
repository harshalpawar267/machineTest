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
                <option value={{$p->id}}>{{$p->size}}</option>
            @endforeach
        </select>
    </div>
</div>

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