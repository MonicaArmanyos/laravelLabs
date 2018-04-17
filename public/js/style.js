$("#github").on("click", function(){
    $("#loginForm").submit(function(e){
        e.preventDefault();
      });
      $("#email").removeAttr("required");
      $("#password").removeAttr("required");
});