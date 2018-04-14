<?php $__env->startSection('content'); ?>
<div class="container-fluid">
<form method="post" action="/posts">
<?php echo e(csrf_field()); ?>

Title :- <input class="form-control" type="text" name="title">
<br><br>
Description :- 
<textarea class="form-control" name="description"></textarea>
<br>
<br>
Post Creator
<select class="form-control" name="user_id">
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>
<br>
<input type="submit" value="Create" class="btn btn-success">
</form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>