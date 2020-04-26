<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url('assets/img/home-bg.jpg'); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
        </div>
        </div>
    </div>
</header>
<!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">


        
        <?php if (isset($post) && count($post) > 0) { ?>
            <?php foreach($post AS $key => $value){?>
            <div class="post-preview">
            <a href="<?=site_url('/Post/viewpost/'.$value["id"].'')?>">
                <h2 class="post-title">
                    <?=$value['bannerHeader']?>
                </h2>
                <h3 class="post-subtitle">
                    <?=$value['bannerSubHeader']?>
                </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#"><?=$value['strFullName']?></a>
              on <?=$value['dteCreatedDate']?></p>
            </div>
        <?php } } else {?>
            <h5>No post in database!</h5>
        <?php }?>
        <!-- <hr>
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
            </h2>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 18, 2019</p>
        </div>
        <hr>
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              Science has not yet mastered prophecy
            </h2>
            <h3 class="post-subtitle">
              We predict too much for the next year and yet far too little for the next ten.
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on August 24, 2019</p>
        </div>
        <hr>
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              Failure is not an option
            </h2>
            <h3 class="post-subtitle">
              Many say exploration is part of our destiny, but it’s actually our duty to future generations.
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on July 8, 2019</p>
        </div> -->
        <hr>
        <!-- Pager -->
          <!-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
          <?php if (isset($post) && count($post) > 0) { ?>
            <?= $pager->simpleLinks('post','simplestyled') ?>
          <?php }?>
      </div>
    </div>
  </div>

  <hr>
  <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  