jQuery(document).ready(function($){

  $("a").bind("focus",function(){if(this.blur)this.blur();});
  $("a.target_blank").attr("target","_blank");
  $('.rollover').rollover();

  $(window).load(function(){
   var delaySpeed = 200;
   var fadeSpeed = 450;
   $('.post_list .post_item').not('#single_post_list .post_item').each(function(i){
    $(this).delay(i*(delaySpeed)).css({display:'block',opacity:'0'}).animate({opacity:'1'},fadeSpeed);
   });
  });

  $("#comment_area ol > li:even").addClass("even_comment");
  $("#comment_area ol > li:odd").addClass("odd_comment");
  $(".even_comment > .children > li").addClass("even_comment_children");
  $(".odd_comment > .children > li").addClass("odd_comment_children");
  $(".even_comment_children > .children > li").addClass("odd_comment_children");
  $(".odd_comment_children > .children > li").addClass("even_comment_children");
  $(".even_comment_children > .children > li").addClass("odd_comment_children");
  $(".odd_comment_children > .children > li").addClass("even_comment_children");

  $("#trackback_switch").click(function(){
    $("#comment_switch").removeClass("comment_switch_active");
    $(this).addClass("comment_switch_active");
    $("#comment_area").animate({opacity: 'hide'}, 0);
    $("#trackback_area").animate({opacity: 'show'}, 1000);
    return false;
  });

  $("#comment_switch").click(function(){
    $("#trackback_switch").removeClass("comment_switch_active");
    $(this).addClass("comment_switch_active");
    $("#trackback_area").animate({opacity: 'hide'}, 0);
    $("#comment_area").animate({opacity: 'show'}, 1000);
    return false;
  });

  $("#show_search_box").hide();
  $(".search_button").hover(
   function () {
    $("#show_search_box").show();
  },
  function () {
    $("#show_search_box").hide();
  }
 );

 $("#search_area").hide();
 $(".search_button").toggle(
  function(){
   $(this).addClass("active");
   $("#search_area").animate({opacity: 'show'}, 700);
   return false;
  },
  function(){
   $(this).removeClass("active");
   $("#search_area").animate({opacity: 'hide'}, 400);
   return false;
  }
 );

});