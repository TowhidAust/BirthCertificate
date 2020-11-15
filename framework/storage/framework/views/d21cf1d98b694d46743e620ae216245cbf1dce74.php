<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("incomecategories.index")); ?>"><?php echo app('translator')->getFromJson('fleet.incomeCategories'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.editIncomeType'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.editIncomeType'); ?></h3>
            </div>

            <div class="card-body">
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php echo Form::open(['route' => ['incomecategories.update',$incomecategory->id],'method'=>'PATCH']); ?>

                <?php echo Form::hidden('id',$incomecategory->id); ?>

                <div class="row">
                    <div class="form-group col-md-4">
                        <?php echo Form::label('name', __('fleet.incomeType'), ['class' => 'form-label']); ?>

                        <?php echo Form::text('name', $incomecategory->name,['class' => 'form-control','required']); ?>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo Form::submit(__('fleet.update'), ['class' => 'btn btn-warning']); ?>

                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\car\framework\resources\views/income/catedit.blade.php ENDPATH**/ ?>