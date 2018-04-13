<?php $__env->startSection('content'); ?>

<form method="post" action="/posts">
<?php echo e(csrf_field()); ?>

Title :- <input type="text" name="title">
<br><br>
Description :- 
<textarea name="description"></textarea>
<br>
<br>
Post Creator
<select class="form-control" name="user_id">
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>
<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>