$(document).ready(function(){
  $(".menu").each(function(){
    $(this).click(function(){
      var link = $(this).attr("link");
      $.ajax({
        type:"POST",
        url:"pages/"+link+".php",
        beforeSend:function()
        {

        },
        success : function(response)
        {
          $(".right").html(response);
        }
      })
    })
  })
  $(".licon").click(function(){
    history.back();
  })
  $(".ricon").click(function(){
    history.forward();
  })
})
