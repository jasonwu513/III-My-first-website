$(function(){

  var aIndex = 0;
  var sliderWidth = $('.slider').width();
  var sliderMove = 0;

  $('.dot a').click(function(){
    aIndex = $(this).index();
    sliderMove = aIndex * sliderWidth * -1;
    $('.main').css({'left': sliderMove });
    console.log(sliderMove);

  })
})
