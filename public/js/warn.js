 function warn(){
    $.confirm({
    title: 'Warning!',
    content: "Post will be deleted and you won't be able to view it again!",
    buttons: {
        confirm: function () {  
      return true;
        },
        cancel: function () {
           return false;
        }
    }
});  
}
function control(a,id)
{
    if(a)
    {
            location.href="{{route('posts.destroy',['post']=>id)}}";
    }
    else
    {
        location.href="posts/"+id
    }
}