$(window).on('load', function () {
  $('.loader').fadeOut(function () {
    $('.wrapper').fadeIn();
  });
});

$(document).ready(function () {

  $(document).on("click", 'button.ictk', function () {
    $('.bio').children('p').css('display','none');
    $('.ictk-bio').css('display','block');
    $('.imgOne').attr('src','img/ictk1.jpg');
    $('.imgTwo').attr('src','img/ictk2.jpg');
    $('.imgThree').attr('src','img/ictk3.jpg');
    $('.imgFour').attr('src','img/ictk4.jpg');
    $('.hidden-value').attr('value','1');
  });
  $(document).on("click", 'button.ecek', function () {
    $('.bio').children('p').css('display','none');
    $('.ecek-bio').css('display','block');
    $('.imgOne').attr('src','img/ecek1.jpg');
    $('.imgTwo').attr('src','img/ecek2.jpg');
    $('.imgThree').attr('src','img/ecek3.jpg');
    $('.imgFour').attr('src','img/ecek4.jpg');
    $('.hidden-value').attr('value','2');
  });
  $(document).on("click", 'button.prek', function () {
    $('.bio').children('p').css('display','none');
    $('.prek-bio').css('display','block');
    $('.imgOne').attr('src','img/prek1.jpg');
    $('.imgTwo').attr('src','img/prek2.jpg');
    $('.imgThree').attr('src','img/prek3.jpg');
    $('.imgFour').attr('src','img/prek4.jpg');
    $('.hidden-value').attr('value','3');
  });
  $(document).on("click", 'button.amek', function () {
    $('.bio').children('p').css('display','none');
    $('.amek-bio').css('display','block');
    $('.imgOne').attr('src','img/amek1.jpg');
    $('.imgTwo').attr('src','img/amek2.jpg');
    $('.imgThree').attr('src','img/amek3.jpg');
    $('.imgFour').attr('src','img/amek4.jpg');
    $('.hidden-value').attr('value','4');
  });

  $(document).on("click", 'button.ictq', function () {
    $('.bio').children('p').css('display','none');
    $('.ictq-bio').css('display','block');
    $('.imgOne').attr('src','img/ictq1.jpg');
    $('.imgTwo').attr('src','img/ictq2.jpg');
    $('.imgThree').attr('src','img/ictq3.jpg');
    $('.imgFour').attr('src','img/ictq4.jpg');
    $('.hidden-value').attr('value','5');
  });
  $(document).on("click", 'button.eceq', function () {
    $('.bio').children('p').css('display','none');
    $('.eceq-bio').css('display','block');
    $('.imgOne').attr('src','img/eceq1.jpg');
    $('.imgTwo').attr('src','img/eceq2.jpg');
    $('.imgThree').attr('src','img/eceq3.jpg');
    $('.imgFour').attr('src','img/eceq4.jpg');
    $('.hidden-value').attr('value','6');
  });
  $(document).on("click", 'button.preq', function () {
    $('.bio').children('p').css('display','none');
    $('.preq-bio').css('display','block');
    $('.imgOne').attr('src','img/preq1.jpg');
    $('.imgTwo').attr('src','img/preq2.jpg');
    $('.imgThree').attr('src','img/preq3.jpg');
    $('.imgFour').attr('src','img/preq4.jpg');
    $('.hidden-value').attr('value','7');
  });
  $(document).on("click", 'button.ameq', function () {
    $('.bio').children('p').css('display','none');
    $('.ameq-bio').css('display','block');
    $('.imgOne').attr('src','img/ameq1.jpg');
    $('.imgTwo').attr('src','img/ameq2.jpg');
    $('.imgThree').attr('src','img/ameq3.jpg');
    $('.imgFour').attr('src','img/ameq4.jpg');
    $('.hidden-value').attr('value','8');
  });

  var alphabeticallyOrderedDivs = $('.list-div').sort(function (a, b) {
      return $(a).find(".rank").text() > $(b).find(".rank").text();
  });
  $(".kqlist-container").html(alphabeticallyOrderedDivs);

  if($('.msg-status').text() == 1) {
    $('.success-msg').css('display','block');
    $('.error-msg').css('display','none');
  }
  else {
    $('.success-msg').css('display','none');
    $('.error-msg').css('display','block');
  }

  var winnerKing = $('.whosking').text();
  var winnerQueen = $('.whosqueen').text();

  if (winnerKing == 'ict') {
    $('.kw-icon').children('img').attr('src','img/ictk.png');
    $('.wictk-bio').css('display','block');
  }
  else if (winnerKing == 'ece') {
    $('.kw-icon').children('img').attr('src','img/ecek.png');
    $('.wecek-bio').css('display','block');
  }
  else if (winnerKing == 'pre') {
    $('.kw-icon').children('img').attr('src','img/prek.png');
    $('.wprek-bio').css('display','block');
  }
  else {
    $('.kw-icon').children('img').attr('src','img/amek.png');
    $('.wamek-bio').css('display','block');
  }

  if (winnerQueen == 'ict') {
    $('.qw-icon').children('img').attr('src','img/ictq.png');
    $('.wictq-bio').css('display','block');
  }
  else if (winnerQueen == 'ece') {
    $('.qw-icon').children('img').attr('src','img/eceq.png');
    $('.weceq-bio').css('display','block');
  }
  else if (winnerQueen == 'pre') {
    $('.qw-icon').children('img').attr('src','img/preq.png');
    $('.wpreq-bio').css('display','block');
  }
  else {
    $('.qw-icon').children('img').attr('src','img/ameq.png');
    $('.wameq-bio').css('display','block');
  }

});
