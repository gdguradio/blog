<!-- Page Header -->
<header class="masthead" style="background-image: url(<?=$bannerimage?>)">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?=$bannerHeader?></h1>
            <h2 class="subheading"><?=$bannerSubHeader?></h2>
            <span class="meta">Posted by
              <a href="#"><?=$strFullName?></a>
              on <?=$dteCreatedDate?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?=$bodyFrstPara?>

          <h2 class="section-heading"><?=$bodyFrstHeading?></h2>

         
          <blockquote class="blockquote"><?=$bodyFrstBlockQuote?></blockquote>


          <h2 class="section-heading"><?=$bodyScndHeading?></h2>
            <?=$bodyScndPara?>

          <a href="#">
            <img class="img-fluid" src="<?=$bodyimage?>" alt="">
          </a>
          <span class="caption text-muted"><?=$bodyImgCaption?></span>

          
        </div>
      </div>
    </div>
  </article>

  <hr>

