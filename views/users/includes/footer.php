<footer class="section novi-background section-relative section-top-66 section-bottom-34 page-footer bg-black context-dark">
  <div class="container">
    <div class="row justify-content-sm-center text-xl-left grid-group-md">
      <div class="col-sm-12 col-xl-3">
        <!-- Footer brand-->
        <div class="footer-brand"><a href="index"><div class="" style="width:50px; height:50px; border-radius:10%; background:url('hcf.png'); background-size:cover;background-position: center; background-repeat: no-repeat;"></div></a></div>
        <p class="text-darker offset-top-4" style="color:white;">Empowered Girls Today...Noble Women Tommorrow</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a class="icon novi-icon fa fa-facebook icon-xxs icon-circle icon-darkest-filled" href="https://www.facebook.com/groups/242943766202165"></a></li>
          <li class="list-inline-item"><a class="icon novi-icon fa fa-twitter icon-xxs icon-circle icon-darkest-filled" href="https://twitter.com/kimteyg"></a></li>
          <li class="list-inline-item"><a class="icon novi-icon fa fa-instagram icon-xxs icon-circle icon-darkest-filled" href="https://instagram.com/kimteyg"></a></li>
          <!-- <li class="list-inline-item"><a class="icon novi-icon fa fa-linkedin icon-xxs icon-circle icon-darkest-filled" href="#"></a></li> -->
        </ul>
      </div>
      <!-- <div class="col-sm-12 col-md-8 col-lg-5 col-xl-4 text-lg-left">
        <h6 class="text-uppercase text-spacing-60">Newsletter</h6>
        <p>Keep up with our always upcoming  product features  and technologies. Enter your e-mail and subscribe to  our newsletter.</p>
        <div class="offset-top-30">
                <form class="rd-mailform" data-form-output="form-subscribe-footer" data-form-type="subscribe" method="post" action="https://livedemo00.template-help.com/wt_58888_v14/bat/rd-mailform.php">
                  <div class="form-group">
                    <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-icon"><span class="novi-icon mdi mdi-email"></span></span></span>
                      <input class="form-control" placeholder="Type your E-Mail" type="email" name="email" data-constraints="@Required @Email"><span class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="submit">Subscribe</button></span>
                    </div>
                  </div>
                  <div class="form-output" id="form-subscribe-footer"></div>
                </form>
        </div>
      </div> -->
      <div class="col-sm-5 col-lg-3 col-xl-2 text-sm-left">
        <h6 class="text-uppercase text-spacing-60">Useful Links</h6>
        <div class="d-block">
          <div class="d-inline-block">
            <ul class="list list-marked">
              <li class="active"><a href="home">Home</a>

              </li>
              <!-- <li>
                  <a href="services">Our Services</a>

              </li> -->
              <li><a href="project">Projects</a></li>
              <li><a href="blog">Blog</a>

              </li>
              <li><a href="about">About us</a></li>
              <li>
                  <a href="contact">Contact</a>

              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-7 text-sm-left col-lg-4 col-xl-3">
        <h6 class="text-uppercase text-spacing-60">Latest Blog</h6>
        <?php  $blogaa = selectContentAsc($conn,'panel_blog',[],'id',3); ?>
        <?php foreach ($blogaa as $key => $value): ?>


              <!-- Post Widget-->
              <article class="post widget-post text-left text-picton-blue"><a class="d-block" href="viewBlog?id=<?php echo $value['hash_id'] ?>">
                  <div class="unit flex-row unit-spacing-xs align-items-center">
                    <div class="unit-body">
                      <div class="post-meta"><span class="novi-icon icon-xxs mdi mdi-arrow-right"></span>
                        <time class="text-dark" datetime="2019-01-01"><?php echo $value['date_created'] ?></time>
                      </div>
                      <div class="post-title">
                        <h6 class="text-regular"><?php echo $value['input_title'] ?></h6>
                      </div>
                    </div>
                  </div></a></article>
                  <?php endforeach; ?>
              <!-- Post Widget-->

              <!-- Post Widget-->

      </div>
    </div>
  </div>
  <div class="container offset-top-50">
    <p class="small text-darker">Hathany Cosmos Foundations &copy; <span class="copyright-year"></span> Designed by <a href="https://mckodev.com.ng"><span>Mckodev</span></a> . <a href="#">Privacy Policy</a></p>
  </div>
</footer>
