<!-- Optional JavaScript; choose one of the two! -->


<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
<script>
function myFunction() {
  var number, text,father_nid,mother_nid;

  number = document.getElementById("numb").value;
  fnid = document.getElementById("father_nid").value;
  mnid = document.getElementById("mo_nid").value;
   var phoneno = /^\d{10}$/;
  if (number.length>10 && number.length<14) {
    text = '<p style="color:green;font-weight: bold;">Correct </p>';
  } else {
      text = '<p style="color:red">You should enter 11, or 13 digit number </p>';
  }
  document.getElementById("number").innerHTML = text;

  if (fnid.length==10 || fnid.length==13|| fnid.length==17) {
    nid_info = '<p style="color:green;font-weight: bold;;">Correct </p>';
  } else {
      nid_info = '<p style="color:red">You should enter 10 ,13 or 17 digit number </p>';
  }
  document.getElementById("nid").innerHTML = nid_info;

  if (mnid.length==10 || mnid.length==13|| mnid.length==17) {
    m_nid_info = '<p style="color:green;font-weight: bold;;">Correct </p>';
  } else {
      m_nid_info = '<p style="color:red">You should enter 10 ,13 or 17 digit number </p>';
  }
  document.getElementById("mother_nid").innerHTML = m_nid_info;


  // bname = document.getElementById("bangla_name").value;
  // if (bname.length!=0) {
  //   b_name_info = '';
  // } else {
  //     b_name_info = '<p style="color:red">Please Enter Name. </p>';
  // }
  // document.getElementById("bname").innerHTML = b_name_info;

}
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
