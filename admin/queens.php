<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vote (Fresher Welcome, 2018) | UTYCC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/custom-style.css">
  </head>
  <body>
    <div class="loader">
      <span class="circle1 bg-primary"></span>
      <span class="circle2 bg-primary"></span>
      <span class="circle3 bg-primary"></span>
      <span class="circle4 bg-primary"></span>
    </div>
    <div class="wrapper">
      <div class="custom-container">
        <span onclick="window.history.go(-1);" class="ion-chevron-left text-light back-link"></span>
        <div class="cover-div text-light">
          <div class="cover-title">
            <h3>Fresher Welcome</h3>
            <label>Enjoy University Life</label>
          </div>
        </div>
        <div class="main-body-div">
          <div class="profile-icon mb-3">
            <img src="img/girl.svg" width="100%" alt="">
          </div>
          <h4>Queens</h4>
          <div class="container-fluid mt-3">
            <div class="kqlist-container">
              <div class="list-div">
                <div class="thumb">
                  <img src="img/ictq.png" width="100%" alt="">
                </div>
                <div class="name">
                  <h6 class="font-unicode">မနှင်းသန္တာစိုး <span class="badge badge-pill badge-primary ictk-vote-count">254</span><span class="rank">2</span></h6>
                  <button class="btn btn-sm btn-outline-primary ictq" type="button" name="button" data-toggle="modal" data-target="#qmodal"><span class="ion-ios-person"></span> View Profile</button>
                  <button class="btn btn-sm btn-outline-primary ictq" type="button" name="button" data-toggle="modal" data-target="#qvote"><span class="ion-ios-star"></span> Vote</button>
                </div>
              </div>
              <div class="list-div">
                <div class="thumb">
                  <img src="img/eceq.png" width="100%" alt="">
                </div>
                <div class="name">
                  <h6 class="font-unicode">မစွမ်းရည်လရောင် <span class="badge badge-pill badge-primary ecek-vote-count">104</span><span class="rank">3</span></h6>
                  <button class="btn btn-sm btn-outline-primary eceq" type="button" name="button" data-toggle="modal" data-target="#qmodal"><span class="ion-ios-person"></span> View Profile</button>
                  <button class="btn btn-sm btn-outline-primary eceq" type="button" name="button" data-toggle="modal" data-target="#qvote"><span class="ion-ios-star"></span> Vote</button>
                </div>
              </div>
              <div class="list-div">
                <div class="thumb">
                  <img src="img/preq.png" width="100%" alt="">
                </div>
                <div class="name">
                  <h6 class="font-unicode">မစန္ဒီဇော်ဝင်း <span class="badge badge-pill badge-primary prek-vote-count">743</span><span class="rank">1</span></h6>
                  <button class="btn btn-sm btn-outline-primary preq" type="button" name="button" data-toggle="modal" data-target="#qmodal"><span class="ion-ios-person"></span> View Profile</button>
                  <button class="btn btn-sm btn-outline-primary preq" type="button" name="button" data-toggle="modal" data-target="#qvote"><span class="ion-ios-star"></span> Vote</button>
                </div>
              </div>
              <div class="list-div">
                <div class="thumb">
                  <img src="img/ameq.png" width="100%" alt="">
                </div>
                <div class="name">
                  <h6 class="font-unicode">မခိုင်ဆုခင်<span class="badge badge-pill badge-primary amek-vote-count">73</span><span class="rank">4</span></h6>
                  <button class="btn btn-sm btn-outline-primary ameq" type="button" name="button" data-toggle="modal" data-target="#qmodal"><span class="ion-ios-person"></span> View Profile</button>
                  <button class="btn btn-sm btn-outline-primary ameq" type="button" name="button" data-toggle="modal" data-target="#qvote"><span class="ion-ios-star"></span> Vote</button>
                </div>
              </div>
            </div>
            <p class="mt-5"><small class="text-muted">Proudly developed by Campus Idiots<br>Powered by UTYCC</small></p>
          </div>
        </div>
      </div>

<!--Modal-->
      <div class="modal fade" id="qmodal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalTitle">Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="bio text-left font-unicode">
                <p class="ictq-bio">အမည် - မနှင်းသန္တာစိုး<br>အထူးပြုဘာသာရပ် - ICT<br>နေရပ် -မိတ္ထီလာ</p>
                <p class="eceq-bio">အမည် - မစွမ်းရည်လရောင်<br>အထူးပြုဘာသာရပ် - EcE<br>နေရပ် - ပြင်ဦးလွင်</p>
                <p class="preq-bio">အမည် - မစန္ဒီဇော်ဝင်း<br>အထူးပြုဘာသာရပ် - PrE<br>နေရပ် - ပြင်ဦးလွင်</p>
                <p class="ameq-bio">အမည် - မခိုင်ဆုခင်<br>အထူးပြုဘာသာရပ် - AME<br>နေရပ် - ပြင်ဦးလွင်</p>
              </div>
              <img class="imgOne mb-2" src="" width="100%" alt="">
              <img class="imgTwo mb-2" src="" width="100%" alt="">
              <img class="imgThree mb-2" src="" width="100%" alt="">
              <img class="imgFour mb-2" src="" width="100%" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="qvote" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalTitle">Vote</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="" action="index.html" method="post">
              <div class="modal-body">
                <div class="bio text-left font-unicode">
                  <p class="ictq-bio">အမည် - မနှင်းသန္တာစိုး<br>အထူးပြုဘာသာရပ် - ICT<br>နေရပ် - မိတ္ထီလာ</p>
                  <p class="eceq-bio">အမည် - မစွမ်းရည်လရောင်<br>အထူးပြုဘာသာရပ် - EcE<br>နေရပ် - ပြင်ဦးလွင်</p>
                  <p class="preq-bio">အမည် - မစန္ဒီဇော်ဝင်း<br>အထူးပြုဘာသာရပ် - PrE<br>နေရပ် - ပြင်ဦးလွင်</p>
                  <p class="ameq-bio">အမည် - မခိုင်ဆုခင်<br>အထူးပြုဘာသာရပ် - AME<br>နေရပ် - ပြင်ဦးလွင်</p>
                </div>
                <input class="form-control" type="text" name="" value="" placeholder="Hex Code">
                <input class="hidden-value" type="text" name="" value="" hidden>
              </div>
              <div class="modal-footer">
                <input class="btn btn-primary" type="submit" name="" value="Send code">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="js/custom.js" charset="utf-8"></script>
</html>
