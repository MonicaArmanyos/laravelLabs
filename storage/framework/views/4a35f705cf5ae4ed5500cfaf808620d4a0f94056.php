<?php $__env->startSection('content'); ?>

<!---$posts dy hia esm el key b3tbro variable---
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<li><?php echo e($post->title); ?>  And The Creator is (<?php echo e($post->user->name); ?>)</li>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
--->
<div class="col-md-12 text-center">
    <button type="button" class="btn btn-primary" onclick="location.href='<?php echo e(route('posts.create')); ?>'">Create Post</button>
</div>
<br/>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#Pagination Bonus</th>
      <th scope="col">Title</th>
      <th scope="col">Posted by</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<tr>
<th scope="row"><?php echo e($post->id); ?></th>
<td><?php echo e($post->title); ?></td>
<td><?php echo e($post->user->name); ?></td>
<td><?php echo e($post->created_at); ?></td>
<td> <button type="button" class="btn btn-success" onclick="location.href='<?php echo e(route('posts.show',['post' =>$post->id])); ?>'">View</button>
    <button type="button" class="btn btn-primary" onclick="location.href='<?php echo e(route('posts.edit',['post' =>$post->id])); ?>'">Edit</button>
    <button type="button" class="btn btn-danger">Delete</button>
</td>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>