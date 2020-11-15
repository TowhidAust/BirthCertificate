     <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <!-- ===== MAIN PART ===== -->

     <main>
     <div class="row">

       <!-- ===== PAGE CONTENT ===== -->

       <div class="column small-12 large-8 large-order-2">

         <div class="row align-justify fleet-button-row">
           <div class="column">
             <!-- Sidebar toggle button (less 1024px)-->
             <button class="button hollow secondary small hide-for-large" type="button" data-toggle="js-fleet-form"><i class="zmdi zmdi-search"></i></button>
             <!-- <h4 class="h5 headline">Dhaka to Brahmanbaria ,Sadar</h4> -->
             <fieldset class="border selections-group">
             </fieldset>
           </div>
           <!-- toggle view buttons-->
           <div class="column shrink show-for-medium">
             <button class="button hollow secondary small" id="js-fleet-toggle-panels" type="button" disabled><i class="zmdi zmdi-view-agenda fa fa-th-list"></i></button>
             <button class="button hollow secondary small" id="js-fleet-toggle-cards" type="button"><i class="zmdi zmdi-view-dashboard fa fa-th-large"></i></button>
           </div>
         </div><!-- /end .fleet-button-row -->

         <!-- ===== PRODUCT CARD GRID ===== -->

         <div class="fleet-grid row small-up-1" id="js-fleet-grid">
           <?php if(!empty($fare)): ?>
           <?php $__currentLoopData = $fare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="column">
             <section class="card card-product extended block-shadow">
               <header class="card-divider">
                 <h3 class="headline"><?php echo e($row->vehicletype); ?></h3>
               </header>
               <div class="card-section media-object stack-for-small mb0">
                 <div class="media-object-section">
                   <img class="card-media" src="<?php echo e(asset('uploads/'.$row->icon)); ?>" alt="">



                 </div><!-- /end .media-object-section -->
                 <div class="media-object-section">
                   <div class="card-product-data flex-container align-justify">
                     <div class="price-wrap">
                       <div class="price"><sup></sup>
                         <span id="fare" class="price-val"><?php echo e($row->fare); ?></span><sup> TK Single Trip</sup>
                         <ul class="rating">
                           <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                           <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                           <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                           <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                           <li><i class="zmdi zmdi-star fa fa-star gray-shade-color"></i></li>
                         </ul>
                       </div>
                     </div>
                  <form class="" action="<?php echo e(route('book')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                     <ul class="card-product-features">
                     <li><?php echo e($row->displayname); ?><i class="rh rh-car rh-fw"></i></li>
                         <li>
                           <label>
         											<span class="input-group">
         												<span class="input-group-label zmdi zmdi-unfold-more fa fa-sort"></span>
         												<input class="input-group-field" name="car" id="car" type="number" value="1">
         												<input class="input-group-field" name="fare_id" type="text" value="<?php echo e($row->intercity_fare_id); ?>">
         											</span>
         										</label>
                         </li>
                         <li>
                           <div class="checkbox inline">
                             	<input class="input-group-field" name="base_fare" id="base_fare" type="hidden" value="<?php echo e($row->fare); ?>">
                               <label>Select Return
                                 <input type="checkbox" id="return_fare" name="return" value="<?php echo e($row->return_fare); ?>">
                                 <span class="custom-checkbox secondary"><i class="icon-check"></i>
          												<input class="input-group-field" name="trip_time" type="hidden" value="<?php echo e($time); ?>">
          												<input class="input-group-field" name="trip_date" type="hidden" value="<?php echo e($trip_date); ?>">
          												<input class="input-group-field" name="pickup_location" type="hidden" value="<?php echo e($pickup_location); ?>">
                                 </span>
                               </label>
                               </label>
                             </div>
                           </li>
                       </ul>
                   </div><!-- /end .card-product-data -->
                   <footer class="card-section card-footer button-group stacked-for-small">
                     <?php if(!empty($customer_id=Session::get('id'))): ?>
                       <button class="button rh-button right-vb flip-y expanded" type="submit"><i class="zmdi zmdi-assignment-check"></i>
                           <span>Book Now</span>
                       </button>
                       <?php endif; ?>
                     </form>
                     <?php if(empty($customer_id=Session::get('id'))): ?>
                     <button class="button rh-button right-vb flip-y expanded" data-open="js-modal-account" type="submit"><i class="zmdi zmdi-assignment-check"></i>
                         <span>Book Now</span>
                     </button>
                     <?php endif; ?>
                   </footer>

                 </div><!-- /end .media-object-section -->
               </div><!-- /end .media-object -->


             </section>
           </div><!-- /end .column -->
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php else: ?>
          <h3>No vehicle are aviable now!</h3>
           <?php endif; ?>
         </div><!-- /end .fleet-grid.row -->

         <!-- ===== PAGINATION ===== -->
       </div>

       <!-- ===== SIDEBAR ===== -->

       <div class="column small-12 large-4 large-order-1">

         <!-- Product filter form -->
         <aside class="sidebar off-canvas-wrapper product-filter-wrap">
           <div class="product-filter off-canvas position-left" id="js-fleet-form" data-off-canvas data-auto-focus="false">

             <section class="card bg-gray block-shadow">
               <header class="card-divider">
                 <button class="close-button small hide-for-large" data-close aria-label="Close product filter panel"><span></span></button>
                 <h2 class="h4">Rent a car in 60 seconds!</h2>
               </header>
               <div class="card bg-primary block-shadow card-booking-form mb0">
                 <!-- Booking form-->
                 <!-- <form class="card-section form-primary flex-container flex-dir-column align-justify" action="<?php echo e(route('search_car')); ?>" action="GET"> -->
                 <form class="card-section form-primary flex-container flex-dir-column align-justify"  action="<?php echo e(route('search_car')); ?>" method="POST">
               <fieldset>

                     <div class="block-header border" style="margin: 5px 0px 5px 0px;">
                       <h5 class="h5 headline" style="font-size:12px;">Pick Up</h5>
                       <hr style="border-bottom-color: #7b666699;" class="dotted">
                   </div>
                   <div class="row small-up-2 js-datepicker-group">
                     <div class="column">
                       <div class="input-group">
                         <span class="input-group">
                           <span  class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                           <select id="district" name="district" class="input-group-field vehicles dynamic_district" data-dependent="thana" required style="width: 100%">
                             <option value="">Select District</option>
                             <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($type->city_id); ?>"><?php echo e($type->city_name); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                         </span>
                       </div>
                     </div>
                     <div class="column">
                       <div class="input-group">
                         <span class="input-group">
                           <span  class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                           <select id="thana" name="from_thana" class="input-group-field vehicles dynamic" required style="width: 100%">
                             <option value="">Select Upzila</option>
                           </select>
                         </span>
                       </div>
                     </div>
                   </div>
                   <?php echo e(csrf_field()); ?>


                 <div class="row small-up-2 js-datepicker-group">
                   <div class="column">
                     <div class="input-group">
                       <span class="input-group-label zmdi zmdi-calendar-check"></span>
                       <input class="input-group-field js-datepicker-date" type="text" placeholder="Pick up date">
                     </div>
                   </div>
                   <div class="column">
                     <div class="input-group">
                       <span class="input-group-label zmdi zmdi-alarm-check"></span>
                       <input class="input-group-field js-datepicker-time" type="text" placeholder="Pick up time">
                     </div>
                   </div>
                 </div>
               </fieldset>
               <fieldset class="pt0">
                 <label>
                   <span class="input-group">
                     <span class="input-group-label zmdi zmdi-pin-off fa fa-map-marker"></span>
                     <select class="input-group-field placeholder" id="js-form-select-2" name="pickup-loc" required>
                       <option disabled selected hidden value="">Choose pickup point</option>
                       <option value="1">Location #1</option>
                       <option value="2">Location #2</option>
                       <option value="3">Location #3</option>
                     </select>
                   </span>
                 </label>
                 <div class="block-header border" style="margin: 0px 0px 14px 0px;">
                     <h5 class="h5 headline" style="font-size:12px;">Drop</h5>
                     <hr style="border-bottom-color: #7b666699;" class="dotted">
                 </div>
                 <div class="row small-up-2 js-datepicker-group">
                   <div class="column">
                     <div class="input-group">
                       <span class="input-group">
                         <span  class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                         <select id="districtto" name="districtto" class="input-group-field vehicles dynamicto_district" data-dependent="thanato" required style="width: 100%">
                           <option value="">Select District</option>
                           <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($type->city_id); ?>"><?php echo e($type->city_name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                       </span>
                     </div>
                   </div>
                   <div class="column">
                     <div class="input-group">
                       <span class="input-group">
                         <span  class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                         <select id="thanato" name="to_thana" class="input-group-field vehicles dynamic" required style="width: 100%">
                           <option value="">Select Upzila</option>
                         </select>
                       </span>
                     </div>
                   </div>
                 </div>
               </fieldset>
               <fieldset class="pt0" style="margin-bottom: -10px;">
                 <div class="checkbox inline">
                   <label>
                     <input type="checkbox">
                     <span class="custom-checkbox secondary"><i class="icon-check"></i>
                     </span>I have a promo code
                   </label>
                 </div>
               </fieldset>

             <button class="button rh-button secondary flip-y expanded" type="submit"><i class="zmdi zmdi-assignment-check"></i>
                 <span>Book Now</span>
             </button>

             </form><!-- /end booking form-->

               </div><!-- /end .card -->
             </section><!-- /end .card -->

           </div><!-- /end .product-filter -->
         </aside><!-- /end .off-canvas-wrapper.product-filter-wrap -->

         <!-- Advertisment widget -->


         <!-- Testimonials widget-->
         <aside class="sidebar card block-shadow">



         <!-- Contact phone widget -->
         <aside class="sidebar callout block-shadow bg-secondary fill-to-top flex-container flex-dir-column align-right" data-interchange="[img/sidebars/sb-06.jpg, small]" style="height: 300px;">
           <div class="block-header">
             <h3 class="headline">Call to free</h3>
             <a class="phone sidebar-phone-large primary-color block-link" href="tel:YourPhoneNumber">347-222-7564</a>
           </div>
           <p>Our expert staff is standing by to answer your questions</p>
         </aside><!-- /end .sidebar -->

         <!-- Advertisment widget -->
         <aside class="sidebar callout block-shadow bg-secondary" data-interchange="[img/sidebars/sb-07.jpg, small]">
           <div class="block-header">
             <h3 class="h2 headline primary-color">Want to move?</h3>
             <p class="lead">Get a load on the road with <span class="mark">Renthire</span></p>
           </div>
           <img src="<?php echo e(asset('fontend/img/fleet/1.jpg')); ?>" alt="">
           <a class="button rh-button flip-y expanded" href="#">
             <i class="zmdi zmdi-more-vert fa fa-arrow-circle-right"></i>
             <span>Read more</span>
           </a>
         </aside>

       </div><!-- /end .column (SIDEBAR) -->
     </div><!-- /end .row -->

   </main>
   <script type="text/javascript">
   $(document).ready(function() {
     $("input[name=car]").change(function(){
       var base_fare = $("#base_fare").val()*$("#car").val();
       var car = $("#car").val();
        var total_fare=base_fare;
        $('#fare').html(total_fare);
   });
   $('input[type="checkbox"]').click(function(){
         if($(this).prop("checked") == true){
           var base_fare = $("#base_fare").val()*$("#car").val();
           var car = $("#car").val();
           var return_fare = $("#return_fare").val()*$("#car").val();
            var total_fare=base_fare+return_fare;
            $('#fare').html(total_fare);
         }
         else if($(this).prop("checked") == false){
           var base_fare = $("#base_fare").val()*$("#car").val();
           var car = $("#car").val();
           var return_fare = $("#return_fare").val()*$("#car").val();
            var total_fare=base_fare;
            $('#fare').html(total_fare);
         }
     });
     $('.dynamic').change(function(){
          if($(this).val() != '')
          {
           var select = $(this).attr("id");
           var value = $(this).val();
           var dependent = $(this).data('dependent');
           var _token = $('input[name="_token"]').val();
           $.ajax({
            url:"<?php echo e(route('dynamicdependent.fetch')); ?>",
            method:"POST",
            data:{select:select, value:value, _token:_token, dependent:dependent},
            success:function(result)
            {
             $('#'+dependent).html(result);
            }

           })
          }
         });
     $('.dynamic_district').change(function(){
          if($(this).val() != '')
          {
           var select = $(this).attr("id");
           var value = $(this).val();
           var dependent = $(this).data('dependent');
           var _token = $('input[name="_token"]').val();
           $.ajax({
            url:"<?php echo e(route('user.dynamicdescrict.fetch')); ?>",
            method:"POST",
            data:{select:select, value:value, _token:_token, dependent:dependent},
            success:function(result)
            {
             $('#'+dependent).html(result);
            }

           })
          }
         });
     $('.dynamicto_district').change(function(){
          if($(this).val() != '')
          {
           var select = $(this).attr("id");
           var value = $(this).val();
           var dependent = $(this).data('dependent');
           var _token = $('input[name="_token"]').val();
           $.ajax({
            url:"<?php echo e(route('user.dynamicTodescrict.fetch')); ?>",
            method:"POST",
            data:{select:select, value:value, _token:_token, dependent:dependent},
            success:function(result)
            {
             $('#'+dependent).html(result);
            }

           })
          }
         });

         $('.dynamicto').change(function(){
              if($(this).val() != '')
              {
               var select = $(this).attr("id");
               var value = $(this).val();
               var dependentt = $(this).data('dependentt');
               var _token = $('input[name="_token"]').val();
               $.ajax({
                url:"<?php echo e(route('dynamictodependent.fetch')); ?>",
                method:"POST",
                data:{select:select, value:value, _token:_token, dependentt:dependentt},
                success:function(result)
                {
                 $('#'+dependentt).html(result);
                }

               })
              }
             });
     $('#thana').select2({placeholder: "Select Thana"});
     $('#district').select2({placeholder: "Select District"});
     $('#division').select2({placeholder: "Select Division"});
     $('#thanato').select2({placeholder: "Select Thana"});
     $('#districtto').select2({placeholder: "Select District"});
     $('#divisionto').select2({placeholder: "Select Division"});
     $('#vtype').select2({placeholder: "Select Vehicale Type"});

     $("#vehicle_id").on("change",function(){
       $("#mileage").val($(this).find(':selected').data("mileage"));
       $("#mileage").attr("min",$(this).find(':selected').data("mileage"));
     });

     $('#date').datepicker({
       autoclose: true,
       format: 'yyyy-mm-dd'
     });

     $('#date1').datepicker({
       autoclose: true,
       format: 'yyyy-mm-dd'
     });

     $('#date2').datepicker({
       autoclose: true,
       format: 'yyyy-mm-dd'
     });

     $("#del_btn").on("click",function(){
       var id=$(this).data("submit");
       $("#form_"+id).submit();
     });

     $('#myModal').on('show.bs.modal', function(e) {
       var id = e.relatedTarget.dataset.id;
       $("#del_btn").attr("data-submit",id);
     });

   $(document).on("click",".delete",function(e){
     var hvk=confirm("Are you sure?");
     if(hvk==true){
       var id=$(this).data("id");
       var action="<?php echo e(url('admin/income')); ?>"+"/" +id;

         $.ajax({
           type: "POST",
           url: action,
           data: "_method=DELETE&_token="+window.Laravel.csrfToken+"&id="+id,
           success: function(data){
             // alert(data);
             $("#income").empty();
             $("#income").html(data);

             new PNotify({
                 title: 'Deleted!',
                 text: '<?php echo app('translator')->getFromJson("fleet.deleted"); ?>',
                 type: 'wanring'
             })
           }
         ,
         dataType: "HTML"
       });
     }
   });

   });


     $('#chk_all').on('click',function(){
       if(this.checked){
         $('.checkbox').each(function(){
           $('.checkbox').prop("checked",true);
         });
       }else{
         $('.checkbox').each(function(){
           $('.checkbox').prop("checked",false);
         });
       }
     });

     // Checkbox checked
     function checkcheckbox(){
       // Total checkboxes
       var length = $('.checkbox').length;
       // Total checked checkboxes
       var totalchecked = 0;
       $('.checkbox').each(function(){
           if($(this).is(':checked')){
               totalchecked+=1;
           }
       });
       // console.log(length+" "+totalchecked);
       // Checked unchecked checkbox
       if(totalchecked == length){
           $("#chk_all").prop('checked', true);
       }else{
           $('#chk_all').prop('checked', false);
       }
     }
   </script>
       <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/frontend/search_car.blade.php ENDPATH**/ ?>