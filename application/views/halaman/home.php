<!DOCTYPE html>
<html>

<head>
<?php $this->load->view("template/header"); ?>
</head>

<body style="font-family:Lato, sans-serif;padding:0px">
    <?php $this->load->view("template/navbar"); ?>
    <section id="main-latest">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 style="font-family:Lato, sans-serif;margin:0;margin-top:7px;">Hot Deals</h1>
                </div>
            </div>
            <hr>
            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"><img class="w-100 d-block" src="http://placeholdit.imgix.net/~text?txtsize=42&amp;txt=Carousel+Image&amp;w=1400&amp;h=600" alt="Slide Image">
                        <div class="carousel-caption">
                            <h3>Coba</h3>
                            <p>Coba caption</p>
                        </div>
                    </div>
                    <div class="carousel-item"><img class="w-100 d-block" src="http://placeholdit.imgix.net/~text?txtsize=42&amp;txt=Carousel+Image&amp;w=1400&amp;h=600" alt="Slide Image"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="http://placeholdit.imgix.net/~text?txtsize=42&amp;txt=Carousel+Image&amp;w=1400&amp;h=600" alt="Slide Image"></div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button"
                        data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                </ol>
            </div>
            <hr>
        </div>
    </section>
    <section id="main-whats_new">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 style="font-family:Lato, sans-serif;margin-top:7px;">What's New?</h1>
                </div>
                <div class="col d-flex justify-content-end align-items-end"><a href="#">View All News</a></div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="card-deck" style="/*background-color:#f8f9fa;*/">
                        <div class="card bg-light main-news" style="border:1px solid #f8f9fa;"><img class="img-fluid card-img-top w-100 d-block" src="assets/img/news_1.jpg" data-bs-hover-animate="pulse" style="padding:5px;">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><a class="card-link float-right" href="#">More&nbsp;<i class="fa fa-angle-double-right"></i></a></div>
                        </div>
                        <div class="card bg-light main-news" style="border:1px solid #f8f9fa;"><img class="img-fluid card-img-top w-100 d-block" src="assets/img/news_1.jpg" data-bs-hover-animate="pulse" style="padding:5px;">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><a class="card-link float-right" href="#">More&nbsp;<i class="fa fa-angle-double-right"></i></a></div>
                        </div>
                        <div class="card bg-light main-news" style="border:1px solid #f8f9fa;"><img class="img-fluid card-img-top w-100 d-block" src="assets/img/news_1.jpg" data-bs-hover-animate="pulse" style="padding:5px;">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><a class="card-link float-right" href="#">More&nbsp;<i class="fa fa-angle-double-right"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <section id="main-story">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 style="font-family:Lato, sans-serif;margin-top:7px;">Behind the story</h1>
                </div>
                <div class="col d-flex justify-content-end align-items-end"><a href="#">View All Story</a></div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="card-deck" style="/*background-color:#f8f9fa;*/">
                        <div class="card bg-light main-news" style="border:1px solid #f8f9fa;"><img class="img-fluid card-img-top w-100 d-block" src="assets/img/news_1.jpg" data-bs-hover-animate="pulse" style="padding:5px;">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><a class="card-link float-right" href="#">More&nbsp;<i class="fa fa-angle-double-right"></i></a></div>
                        </div>
                        <div class="card bg-light main-news" style="border:1px solid #f8f9fa;"><img class="img-fluid card-img-top w-100 d-block" src="assets/img/news_1.jpg" data-bs-hover-animate="pulse" style="padding:5px;">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><a class="card-link float-right" href="#">More&nbsp;<i class="fa fa-angle-double-right"></i></a></div>
                        </div>
                        <div class="card bg-light main-news" style="border:1px solid #f8f9fa;"><img class="img-fluid card-img-top w-100 d-block" src="assets/img/news_1.jpg" data-bs-hover-animate="pulse" style="padding:5px;">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><a class="card-link float-right" href="#">More&nbsp;<i class="fa fa-angle-double-right"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <section>
        <hr>
        <div id="productlist" style="margin:0px;margin-top:0px;padding:10px;margin-right:0px;margin-left:0px;padding-top:20px;padding-bottom:0px;background-color:#f8f9fa;">
            <h1 class="text-uppercase text-center" style="margin-bottom:1px;color:rgb(50,122,188);">Our Products</h1>
            <div class="container-fluid" style="padding:10px;padding-bottom:0px;">
                <div class="row" style="margin:10px;margin-right:0px;margin-left:0px;margin-top:10px;margin-bottom:10px;padding:10px;">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card-container-imagia">
                            <div class="card-imagia">
                                <div class="front-imagia">
                                    <div class="cover-imagia" style="height:300px;"><img src="https://unsplash.it/720/500?image=1067" alt="" style="height:300px;"></div>
                                    <div class="content-imagia">
                                        <h3 class="name-imagia">John Doe</h3>
                                        <p class="subtitle-imagia">Subtitle </p>
                                    </div>
                                    <div class="footer-imagia"><span> Rating :&nbsp;<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>&nbsp;</span></div>
                                </div>
                                <div class="back-imagia">
                                    <div class="content-imagia content-back-imagia">
                                        <div>
                                            <h3 class="text-center">Lorem Ipsum</h3>
                                            <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix
                                                interneciva aegre vestigia claritudinis pristinae monstrat admodum pauca. </p>
                                        </div>
                                    </div>
                                    <div class="footer-imagia">
                                        <div class="social-imagia text-center"><a href="#"><i class="icon ion-more"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card-container-imagia">
                            <div class="card-imagia">
                                <div class="front-imagia">
                                    <div class="cover-imagia" style="height:300px;"><img src="https://unsplash.it/720/500?image=1067" alt="" style="height:300px;"></div>
                                    <div class="content-imagia">
                                        <h3 class="name-imagia">John Doe</h3>
                                        <p class="subtitle-imagia">Subtitle </p>
                                    </div>
                                    <div class="footer-imagia"><span><i class="fa fa-plus"></i> More info</span></div>
                                </div>
                                <div class="back-imagia">
                                    <div class="content-imagia content-back-imagia">
                                        <div>
                                            <h3 class="text-center">Lorem Ipsum</h3>
                                            <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix
                                                interneciva aegre vestigia claritudinis pristinae monstrat admodum pauca. </p>
                                        </div>
                                    </div>
                                    <div class="footer-imagia">
                                        <div class="social-imagia text-center"><a href="#"><i class="icon ion-more"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card-container-imagia">
                            <div class="card-imagia">
                                <div class="front-imagia">
                                    <div class="cover-imagia" style="height:300px;"><img src="https://unsplash.it/720/500?image=1067" alt="" style="height:300px;"></div>
                                    <div class="content-imagia">
                                        <h3 class="name-imagia">John Doe</h3>
                                        <p class="subtitle-imagia">Subtitle </p>
                                    </div>
                                    <div class="footer-imagia"><span><i class="fa fa-plus"></i> More info</span></div>
                                </div>
                                <div class="back-imagia">
                                    <div class="content-imagia content-back-imagia">
                                        <div>
                                            <h3 class="text-center">Lorem Ipsum</h3>
                                            <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix
                                                interneciva aegre vestigia claritudinis pristinae monstrat admodum pauca. </p>
                                        </div>
                                    </div>
                                    <div class="footer-imagia">
                                        <div class="social-imagia text-center"><a href="#"><i class="icon ion-more"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card-container-imagia">
                            <div class="card-imagia">
                                <div class="front-imagia">
                                    <div class="cover-imagia" style="height:300px;"><img src="https://unsplash.it/720/500?image=1067" alt="" style="height:300px;"></div>
                                    <div class="content-imagia">
                                        <h3 class="name-imagia">John Doe</h3>
                                        <p class="subtitle-imagia">Subtitle </p>
                                    </div>
                                    <div class="footer-imagia"><span><i class="fa fa-plus"></i> More info</span></div>
                                </div>
                                <div class="back-imagia">
                                    <div class="content-imagia content-back-imagia">
                                        <div>
                                            <h3 class="text-center">Lorem Ipsum</h3>
                                            <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix
                                                interneciva aegre vestigia claritudinis pristinae monstrat admodum pauca. </p>
                                        </div>
                                    </div>
                                    <div class="footer-imagia">
                                        <div class="social-imagia text-center"><a href="#"><i class="icon ion-more"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card-container-imagia">
                            <div class="card-imagia">
                                <div class="front-imagia">
                                    <div class="cover-imagia" style="height:300px;"><img src="https://unsplash.it/720/500?image=1067" alt="" style="height:300px;"></div>
                                    <div class="content-imagia">
                                        <h3 class="name-imagia">John Doe</h3>
                                        <p class="subtitle-imagia">Subtitle </p>
                                    </div>
                                    <div class="footer-imagia"><span><i class="fa fa-plus"></i> More info</span></div>
                                </div>
                                <div class="back-imagia">
                                    <div class="content-imagia content-back-imagia">
                                        <div>
                                            <h3 class="text-center">Lorem Ipsum</h3>
                                            <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix
                                                interneciva aegre vestigia claritudinis pristinae monstrat admodum pauca. </p>
                                        </div>
                                    </div>
                                    <div class="footer-imagia">
                                        <div class="social-imagia text-center"><a href="#"><i class="icon ion-more"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card-container-imagia">
                            <div class="card-imagia">
                                <div class="front-imagia">
                                    <div class="cover-imagia" style="height:300px;"><img src="https://unsplash.it/720/500?image=1067" alt="" style="height:300px;"></div>
                                    <div class="content-imagia">
                                        <h3 class="name-imagia">John Doe</h3>
                                        <p class="subtitle-imagia">Subtitle </p>
                                    </div>
                                    <div class="footer-imagia"><span><i class="fa fa-plus"></i> More info</span></div>
                                </div>
                                <div class="back-imagia">
                                    <div class="content-imagia content-back-imagia">
                                        <div>
                                            <h3 class="text-center">Lorem Ipsum</h3>
                                            <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix
                                                interneciva aegre vestigia claritudinis pristinae monstrat admodum pauca. </p>
                                        </div>
                                    </div>
                                    <div class="footer-imagia">
                                        <div class="social-imagia text-center"><a href="#"><i class="icon ion-more"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card-container-imagia">
                            <div class="card-imagia">
                                <div class="front-imagia">
                                    <div class="cover-imagia" style="height:300px;"><img src="https://unsplash.it/720/500?image=1067" alt="" style="height:300px;"></div>
                                    <div class="content-imagia">
                                        <h3 class="name-imagia">John Doe</h3>
                                        <p class="subtitle-imagia">Subtitle </p>
                                    </div>
                                    <div class="footer-imagia"><span><i class="fa fa-plus"></i> More info</span></div>
                                </div>
                                <div class="back-imagia">
                                    <div class="content-imagia content-back-imagia">
                                        <div>
                                            <h3 class="text-center">Lorem Ipsum</h3>
                                            <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix
                                                interneciva aegre vestigia claritudinis pristinae monstrat admodum pauca. </p>
                                        </div>
                                    </div>
                                    <div class="footer-imagia">
                                        <div class="social-imagia text-center"><a href="#"><i class="icon ion-more"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card-container-imagia">
                            <div class="card-imagia">
                                <div class="front-imagia">
                                    <div class="cover-imagia" style="height:300px;"><img src="https://unsplash.it/720/500?image=1067" alt="" style="height:300px;"></div>
                                    <div class="content-imagia">
                                        <h3 class="name-imagia">John Doe</h3>
                                        <p class="subtitle-imagia">Subtitle </p>
                                    </div>
                                    <div class="footer-imagia"><span><i class="fa fa-plus"></i> More info</span></div>
                                </div>
                                <div class="back-imagia">
                                    <div class="content-imagia content-back-imagia">
                                        <div>
                                            <h3 class="text-center">Lorem Ipsum</h3>
                                            <p class="text-center">Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix
                                                interneciva aegre vestigia claritudinis pristinae monstrat admodum pauca. </p>
                                        </div>
                                    </div>
                                    <div class="footer-imagia">
                                        <div class="social-imagia text-center"><a href="#"><i class="icon ion-more"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 offset-3"><a class="btn btn-primary btn-block" role="button" href="produk.html" style="background-color:#64bea8;">Shop Now!</a></div>
                </div>
                <hr>
            </div>
        </div>
    </section>
    <div class="footer-clean" style="background-color:#cccccc;">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Kura-kuraku</h3>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Legacy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item" style="padding:auto;padding-right:0px;padding-left:0px;"><a class="d-flex justify-content-center" href="http://www.limabenua.com" target="_parent"><img class="img-fluid" src="assets/img/12_20170727_08512234.gif"></a></div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">Kurakuraku© 2017</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<?php $this->load->view("template/footer"); ?>
</body>

</html>
