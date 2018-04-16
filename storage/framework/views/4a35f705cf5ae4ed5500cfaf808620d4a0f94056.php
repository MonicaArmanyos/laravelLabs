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
      <th scope="col">Slug</th>
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
    <button type="button" class="btn btn-danger delete"  targ="<?php echo e($post->id); ?>" >Delete</button>
</td>
<td><?php echo e($post->slug); ?></td>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="<?php echo e(asset('js/warn.js')); ?>"></script>
<script>
  $(".delete").on('click',function(){
  var my = this;
    var con = confirm("are you sure");
    if(con){
        $.ajax(
          {
            url: "posts/"+$(my).attr("targ") , 
            type: 'DELETE',
            data : {'_token' : '<?php echo e(csrf_token()); ?>'},
            success : function (res) {
              console.log(res);
               location.reload(); 
            },
            error : function(err){
              console.log(err)
            }
          }
        );
    }
  });


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>