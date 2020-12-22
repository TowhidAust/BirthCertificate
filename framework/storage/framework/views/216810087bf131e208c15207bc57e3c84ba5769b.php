<!-- Optional JavaScript; choose one of the two! -->

<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
<script type="text/javascript">
  $(document).ready(function() {
    $('#date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#date1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

  });
</script>
<script>
$(document).ready(function(){
     var i=1;
     $('#add').click(function(){
          i++;
          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="present[]"  class="form-control name_list" /></td><td><input type="text" name="correction[]"  class="form-control name_list" /></td><td><input type="text" name="reason[]"  class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
     });
     $(document).on('click', '.btn_remove', function(){
          var button_id = $(this).attr("id");
          $('#row'+button_id+'').remove();
     });
     $('#submit').click(function(){
          $.ajax({
               url:"name.php",
               method:"POST",
               data:$('#add_name').serialize(),
               success:function(data)
               {
                    alert(data);
                    $('#add_name')[0].reset();
               }
          });
     });
});
function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#blah').attr('src', e.target.result);
           }

           reader.readAsDataURL(input.files[0]);
       }
   }

   $("#imgInp").change(function(){
       readURL(this);
   });
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/frontend/footer.blade.php ENDPATH**/ ?>