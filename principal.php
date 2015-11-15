    <?php include"includes/header_site.php";?>
<div id="main-wrapper">
    <div id="main">
        <div id="main-inner">

            <!-- MAP -->
<div class="block-content no-padding">
    <div class="block-content-inner">
        <div class="map-wrapper">
            <div id="mapa" data-style="1"></div><!-- /#map -->

        <script src="js/mapa/jquery.min.js"></script>
        <script  src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD0X4v7eqMFcWCR-VZAJwEMfb47id9IZao"></script>
        <script src="js/mapa/infobox.js"></script>
        <script src="js/mapa/markerclusterer.js"></script>
        <script src="js/mapa/mapa.js"></script>
       
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 map-navigation-positioning">
                        <div class="map-navigation-wrapper">
                            <div class="map-navigation">
                                <form method="post" action="?" class="clearfix">
                                    <div class="form-group col-sm-12">
                                        <label>Esado</label>

                                        <div class="select-wrapper">
                                            <select id="select-country" class="form-control">
                                                <option value="">Selecionar estado</option>
                                                <option value="czech-republic">Czech Republic</option>
                                                <option value="germany">Germany</option>
                                                <option value="france">France</option>
                                                <option value="poland">Poland</option>
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <label>Cidade</label>

                                        <div class="select-wrapper">
                                            <select id="select-location" class="form-control">
                                                <option value="">Selecionar cidade</option>
                                                <option value="location-czech-republic-1" class="czech-republic">Location 1</option>
                                                <option value="location-czech-republic-2" class="czech-republic">Location 2</option>
                                                <option value="location-czech-republic-3" class="czech-republic">Location 3</option>
                                                <option value="location-czech-republic-4" class="czech-republic">Location 4</option>
                                                <option value="location-germany-1" class="germany">Location 1</option>
                                                <option value="location-germany-2" class="germany">Location 2</option>
                                                <option value="location-germany-3" class="germany">Location 3</option>
                                                <option value="location-germany-4" class="germany">Location 4</option>
                                                <option value="location-france-1" class="france">Location 1</option>
                                                <option value="location-france-2" class="france">Location 2</option>
                                                <option value="location-france-3" class="france">Location 3</option>
                                                <option value="location-france-4" class="france">Location 4</option>
                                                <option value="location-poland-1" class="poland">Location 1</option>
                                                <option value="location-poland-2" class="poland">Location 2</option>
                                                <option value="location-poland-3" class="poland">Location 3</option>
                                                <option value="location-poland-4" class="poland">Location 4</option>
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <label>Tipo de garagem</label>

                                        <div class="select-wrapper">
                                            <select id="select-sublocation" class="form-control">
                                                <option value="">Selecionar tipo</option>
                                                <option value="location-czech-republic-1" class="location-czech-republic-1">Sublocation Czech 1</option>
                                                <option value="location-czech-republic-2" class="location-czech-republic-2">Sublocation Czech 2</option>
                                                <option value="location-czech-republic-3" class="location-czech-republic-3">Sublocation Czech 3</option>
                                                <option value="location-czech-republic-4" class="location-czech-republic-4">Sublocation Czech 4</option>
                                                <option value="location-germany-1" class="location-germany-1">Sublocation Germany 1</option>
                                                <option value="location-germany-2" class="location-germany-2">Sublocation Germany 2</option>
                                                <option value="location-germany-3" class="location-germany-3">Sublocation Germany 3</option>
                                                <option value="location-germany-4" class="location-germany-4">Sublocation Germany 4</option>
                                                <option value="location-france-1" class="location-france-1">Sublocation France 1</option>
                                                <option value="location-france-2" class="location-france-2">Sublocation France 2</option>
                                                <option value="location-france-3" class="location-france-3">Sublocation France 3</option>
                                                <option value="location-france-4" class="location-france-4">Sublocation France 4</option>
                                                <option value="location-poland-1" class="location-poland-1">Sublocation Poland 1</option>
                                                <option value="location-poland-2" class="location-poland-2">Sublocation Poland 2</option>
                                                <option value="location-poland-3" class="location-poland-3">Sublocation Poland 3</option>
                                                <option value="location-poland-4" class="location-poland-4">Sublocation Poland 4</option>
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <label>Tamanho Garagem</label>

                                        <div class="select-wrapper">
                                            <select class="form-control">
                                                <option value="apartment">Apartment</option>
                                                <option value="building-arae">Building Area</option>
                                                <option value="condo">Condo</option>
                                                <option value="house">House</option>
                                                <option value="villa">Villa</option>
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Price From</label>
                                        <input type="text"  class="form-control" placeholder="e.g. 1000">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Price To</label>
                                        <input type="text"  class="form-control" placeholder="e.g. 5000">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <input type="submit" class="btn btn-primary btn-inversed btn-block" value="Filter Properties">
                                    </div><!-- /.form-group -->
                                </form>
                            </div><!-- /.map-navigation -->
                        </div><!-- /.map-navigation-wrapper -->
                    </div><!-- /.col-sm-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->

        </div><!-- /.map-wrapper -->
    </div><!-- /.block-content-inner -->
</div><!-- /.block-content -->
            <div class="container">
                <!-- SLOGAN -->
<div class="block-content background-primary background-map block-content-small-padding fullwidth">
    <div class="block-content-inner">
        <h2 class="no-margin center caps">Only Real Estate Template You Will Ever Need</h2>
    </div><!-- /.block-content-iner -->
</div><!-- /.block-content-->                <!-- ISOTOPE GRID -->
<div class="block-content block-content-small-padding">
<div class="block-content-inner">
<h2 class="center">Best Rated Properties</h2>

<ul class="properties-filter">
    <li class="selected"><a href="#" data-filter="*"><span>All</span></a></li>
    <li><a href="#" data-filter=".property-featured"><span>Featured</span></a></li>
    <li><a href="#" data-filter=".property-rent"><span>Rent</span></a></li>
    <li><a href="#" data-filter=".property-sale"><span>Sale</span></a></li>
</ul>
<!-- /.property-filter -->

<div class="properties-items">
<div class="row">
    <div class="property-item property-featured col-sm-6 col-md-3">
        <div class="property-box">
            <div class="property-box-inner">
                <h3 class="property-box-title"><a href="property-detail.html">Jeopardy Ln</a></h3>
                <h4 class="property-box-subtitle"><a href="property-detail.html">Civic Betterment</a></h4>

                <div class="property-box-label property-box-label-primary">Rent</div>
                <!-- /.property-box-label -->

                <div class="property-box-picture">
                    <div class="property-box-price">$ 430 000</div>
                    <!-- /.property-box-price -->
                    <div class="property-box-picture-inner">
                        <a href="property-detail.html" class="property-box-picture-target">
                            <img src="assets/img/tmp/properties/medium/3.jpg" alt="">
                        </a><!-- /.property-box-picture-target -->
                    </div>
                    <!-- /.property-picture-inner -->
                </div>
                <!-- /.property-picture -->

                <div class="property-box-meta">
                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>2</strong>
                        <span>Baths</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>1</strong>
                        <span>Beds</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>140</strong>
                        <span>Area</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>2</strong>
                        <span>Garages</span>
                    </div>
                    <!-- /.col-sm-3 -->
                </div>
                <!-- /.property-box-meta -->
            </div>
            <!-- /.property-box-inner -->
        </div>
        <!-- /.property-box -->
    </div>
    <!-- /.property-item -->

    <div class="property-item property-rent col-sm-6 col-md-3">
        <div class="property-box">
            <div class="property-box-inner">
                <h3 class="property-box-title"><a href="property-detail.html">McLaugh Ave</a></h3>
                <h4 class="property-box-subtitle"><a href="property-detail.html">Palo Alto, SA</a></h4>

                <div class="property-box-picture">
                    <div class="property-box-price">$ 1500 / month</div>
                    <!-- /.property-box-price -->
                    <div class="property-box-picture-inner">
                        <a href="property-detail.html" class="property-box-picture-target">
                            <img src="assets/img/tmp/properties/medium/4.jpg" alt="">
                        </a><!-- /.property-box-picture-target -->
                    </div>
                    <!-- /.property-picture-inner -->
                </div>
                <!-- /.property-picture -->

                <div class="property-box-meta">
                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>1</strong>
                        <span>Baths</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>1</strong>
                        <span>Beds</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>309</strong>
                        <span>Area</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>2</strong>
                        <span>Garages</span>
                    </div>
                    <!-- /.col-sm-3 -->
                </div>
                <!-- /.property-box-meta -->
            </div>
            <!-- /.property-box-inner -->
        </div>
        <!-- /.property-box -->
    </div>
    <!-- /.property-item -->

    <div class="property-item property-sale col-sm-6 col-md-3">
        <div class="property-box">
            <div class="property-box-inner">
                <h3 class="property-box-title"><a href="property-detail.html">Everett Ave</a></h3>
                <h4 class="property-box-subtitle"><a href="property-detail.html">Silicon Valley, SA</a></h4>

                <div class="property-box-label">Sale</div>
                <!-- /.property-box-label -->

                <div class="property-box-picture">
                    <div class="property-box-price">$ 430 000</div>
                    <!-- /.property-box-price -->
                    <div class="property-box-picture-inner">
                        <a href="property-detail.html" class="property-box-picture-target">
                            <img src="assets/img/tmp/properties/medium/2.jpg" alt="">
                        </a><!-- /.property-box-picture-target -->
                    </div>
                    <!-- /.property-picture-inner -->
                </div>
                <!-- /.property-picture -->

                <div class="property-box-meta">
                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>2</strong>
                        <span>Baths</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>1</strong>
                        <span>Beds</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>233</strong>
                        <span>Area</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>2</strong>
                        <span>Garages</span>
                    </div>
                    <!-- /.col-sm-3 -->
                </div>
                <!-- /.property-box-meta -->
            </div>
            <!-- /.property-box-inner -->
        </div>
        <!-- /.property-box -->
    </div>
    <!-- /.property-item -->

    <div class="property-item property-rent col-sm-6 col-md-3">
        <div class="property-box">
            <div class="property-box-inner">
                <h3 class="property-box-title"><a href="property-detail.html">Culver Blvd</a></h3>
                <h4 class="property-box-subtitle"><a href="property-detail.html">Kingman Park</a></h4>

                <div class="property-box-picture">
                    <div class="property-box-price">$ 145 000</div>
                    <!-- /.property-box-price -->
                    <div class="property-box-picture-inner">
                        <a href="property-detail.html" class="property-box-picture-target">
                            <img src="assets/img/tmp/properties/medium/6.jpg" alt="">
                        </a><!-- /.property-box-picture-target -->
                    </div>
                    <!-- /.property-picture-inner -->
                </div>
                <!-- /.property-picture -->

                <div class="property-box-meta">
                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>1</strong>
                        <span>Baths</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>1</strong>
                        <span>Beds</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>334</strong>
                        <span>Area</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>2</strong>
                        <span>Garages</span>
                    </div>
                    <!-- /.col-sm-3 -->
                </div>
                <!-- /.property-box-meta -->
            </div>
            <!-- /.property-box-inner -->
        </div>
        <!-- /.property-box -->
    </div>
    <!-- /.property-item -->
</div>
<!-- /.row -->

<div class="row">
    <div class="property-item property-featured col-sm-6 col-md-3">
        <div class="property-box">
            <div class="property-box-inner">
                <h3 class="property-box-title"><a href="property-detail.html">Fife Ave</a></h3>
                <h4 class="property-box-subtitle"><a href="property-detail.html">Manhattan</a></h4>

                <div class="property-box-picture">
                    <div class="property-box-price">$ 350 000</div>
                    <!-- /.property-box-price -->
                    <div class="property-box-picture-inner">
                        <a href="property-detail.html" class="property-box-picture-target">
                            <img src="assets/img/tmp/properties/medium/8.jpg" alt="">
                        </a><!-- /.property-box-picture-target -->
                    </div>
                    <!-- /.property-picture-inner -->
                </div>
                <!-- /.property-picture -->

                <div class="property-box-meta">
                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>3</strong>
                        <span>Baths</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>3</strong>
                        <span>Beds</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>283</strong>
                        <span>Area</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>3</strong>
                        <span>Garages</span>
                    </div>
                    <!-- /.col-sm-3 -->
                </div>
                <!-- /.property-box-meta -->
            </div>
            <!-- /.property-box-inner -->
        </div>
        <!-- /.property-box -->
    </div>
    <!-- /.property-item -->

    <div class="property-item property-sale col-sm-6 col-md-3">
        <div class="property-box">
            <div class="property-box-inner">
                <h3 class="property-box-title"><a href="property-detail.html">Hansbury Ave</a></h3>
                <h4 class="property-box-subtitle"><a href="property-detail.html">Brooklyn</a></h4>

                <div class="property-box-label property-box-label-primary">Rent</div>
                <!-- /.property-box-label -->

                <div class="property-box-picture">
                    <div class="property-box-price">$ 145 000</div>
                    <!-- /.property-box-price -->
                    <div class="property-box-picture-inner">
                        <a href="property-detail.html" class="property-box-picture-target">
                            <img src="assets/img/tmp/properties/medium/7.jpg" alt="">
                        </a><!-- /.property-box-picture-target -->
                    </div>
                    <!-- /.property-picture-inner -->
                </div>
                <!-- /.property-picture -->

                <div class="property-box-meta">
                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>1</strong>
                        <span>Baths</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>3</strong>
                        <span>Beds</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>161</strong>
                        <span>Area</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-sm-3">
                        <strong>1</strong>
                        <span>Garages</span>
                    </div>
                    <!-- /.col-sm-3 -->
                </div>
                <!-- /.property-box-meta -->
            </div>
            <!-- /.property-box-inner -->
        </div>
        <!-- /.property-box -->
    </div>
    <!-- /.property-item -->

    <div class="property-item property-rent col-sm-6 col-md-3">
        <div class="property-box">
            <div class="property-box-inner">
                <h3 class="property-box-title"><a href="property-detail.html">Bedford Ave</a></h3>
                <h4 class="property-box-subtitle"><a href="property-detail.html">Silicon Valley, SA</a></h4>

                <div class="property-box-label property-box-label-primary">Rent</div>
                <!-- /.property-box-label -->

                <div class="property-box-picture">
                    <div class="property-box-price">$ 545 000</div>
                    <!-- /.property-box-price -->
                    <div class="property-box-picture-inner">
                        <a href="property-detail.html" class="property-box-picture-target">
                            <img src="assets/img/tmp/properties/medium/1.jpg" alt="">
                        </a><!-- /.property-box-picture-target -->
                    </div>
                    <!-- /.property-picture-inner -->
                </div>
                <!-- /.property-picture -->

                <div class="property-box-meta">
                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>1</strong>
                        <span>Baths</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>3</strong>
                        <span>Beds</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>222</strong>
                        <span>Area</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>2</strong>
                        <span>Garages</span>
                    </div>
                    <!-- /.col-sm-3 -->
                </div>
                <!-- /.property-box-meta -->
            </div>
            <!-- /.property-box-inner -->
        </div>
        <!-- /.property-box -->
    </div>
    <!-- /.property-item -->

    <div class="property-item property-sale col-sm-6 col-md-3">
        <div class="property-box">
            <div class="property-box-inner">
                <h3 class="property-box-title"><a href="property-detail.html">Emerson Street</a></h3>
                <h4 class="property-box-subtitle"><a href="property-detail.html">Kingman Park</a></h4>

                <div class="property-box-label">Sale</div>
                <!-- /.property-box-label -->

                <div class="property-box-picture">
                    <div class="property-box-price">$ 430 000</div>
                    <!-- /.property-box-price -->
                    <div class="property-box-picture-inner">
                        <a href="property-detail.html" class="property-box-picture-target">
                            <img src="assets/img/tmp/properties/medium/10.jpg" alt="">
                        </a><!-- /.property-box-picture-target -->
                    </div>
                    <!-- /.property-picture-inner -->
                </div>
                <!-- /.property-picture -->

                <div class="property-box-meta">
                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>3</strong>
                        <span>Baths</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>1</strong>
                        <span>Beds</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>192</strong>
                        <span>Area</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong>2</strong>
                        <span>Garages</span>
                    </div>
                    <!-- /.col-sm-3 -->
                </div>
                <!-- /.property-box-meta -->
            </div>
            <!-- /.property-box-inner -->
        </div>
        <!-- /.property-box -->
    </div>
    <!-- /.property-item -->
</div>
<!-- /.row -->
</div>
<!-- /.properties-items -->

</div>
<!-- /.block-content-inner -->
</div><!-- /.block-content -->                
<!-- CAROUSEL -->
<div class="block-content background-secondary background-map fullwidth">
<div class="block-content-inner">
<ul class="bxslider clearfix">
<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">West Side</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Palo Alto, SA</a></h4>
            <div class="property-box-label property-box-label-primary">Sale</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/9.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">3117 Cozy River</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Needy, Jersey</a></h4>

            <div class="property-box-picture">
                <div class="property-box-price">$ 1,200 <span class="property-box-price-suffix">/ month</span></div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/11.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">South St</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Civic Betterment</a></h4>
            <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 89,200</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/12.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">St Johns Pl</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Brooklyn</a></h4>
            <div class="property-box-label property-box-label-primary">Sale</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/5.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">3117 Cozy River</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Needy, Jersey</a></h4>

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/10.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">Jefferson Blvd</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Manhattan</a></h4>
            <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 89,200</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/3.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">Evergreen Tr</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Manhattan</a></h4>
            <div class="property-box-label property-box-label-primary">Sale</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/4.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">3117 Cozy River</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Needy, Jersey</a></h4>

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/1.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">Everett Ave</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Silicon Valley, SA</a></h4>
            <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 89,200</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/2.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">Evergreen Tr</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Brooklyn</a></h4>
            <div class="property-box-label property-box-label-primary">Sale</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/9.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">3117 Cozy River</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Needy, Jersey</a></h4>

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/5.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">Jefferson Blvd</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Civic Betterment</a></h4>
            <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 89,200</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/8.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">Fife Ave</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Kingman Park</a></h4>
            <div class="property-box-label property-box-label-primary">Sale</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/6.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">3117 Cozy River</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Needy, Jersey</a></h4>

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/7.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">Jeopardy Ln</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Palo Alto, SA</a></h4>
            <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 89,200</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/12.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">Culver Blvd</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Silicon Valley, SA</a></h4>
            <div class="property-box-label property-box-label-primary">Sale</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/11.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">3117 Cozy River</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Needy, Jersey</a></h4>

            <div class="property-box-picture">
                <div class="property-box-price">$ 13,000</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/5.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>

<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#">West Side</a></h3>
            <h4 class="property-box-subtitle"><a href="#">Palo Alto, SA</a></h4>
            <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ 89,200</div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="assets/img/tmp/properties/medium/10.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>
</ul>
</div><!-- /.block-content-inner -->
</div><!-- /.block-content -->                <!-- STATISTICS -->
<div class="block-content block-content-small-padding">
    <div class="block-content-inner">
        <div class="center">
            <h2 class="color-primary">Over 10 000 Properties In Our Directory</h2>
        </div><!-- /.center -->

        <div class="row">
            <div class="col-sm-2 col-sm-offset-2">
                <div class="block-stats background-dots background-primary color-white">
                    <strong>3500+</strong>
                    <span>Apartments</span>
                </div><!-- /.block-stats -->
            </div>
            <div class="col-sm-2">
                <div class="block-stats background-dots background-primary color-white">
                    <strong>3000+</strong>
                    <span>Houses</span>
                </div><!-- /.block-stats -->
            </div>
            <div class="col-sm-2">
                <div class="block-stats background-dots background-primary color-white">
                    <strong>5000+</strong>
                    <span>Condos</span>
                </div><!-- /.block-stats -->
            </div>
            <div class="col-sm-2">
                <div class="block-stats background-dots background-primary color-white">
                    <strong>2500+</strong>
                    <span>Areas</span>
                </div><!-- /.block-stats -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.block-content-inner -->
</div><!-- /.block-content -->                <!-- HEXS -->
<div class="block-content fullwidth background-primary background-map clearfix">
    <div class="block-content-inner row">
        <div class="hex-wrapper col-sm-4 center">
            <div class="clearfix">
                <div class="hex col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="hex-inner">
                        <img src="assets/img/hex.png" alt="" class="hex-image">

                        <div class="hex-content">
                            <i class="fa fa-group"></i>
                        </div><!-- /.hex-content -->
                    </div><!-- /.hex-inner -->
                </div><!-- /.hex -->
            </div><!-- /.clearfix -->

            <h3>15 000+ Satisfied Users</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur diping elit. Curabitur non gravida nisi. Nam vel magna
            </p>

            <a class="btn btn-white" href="#">More</a>
        </div>

        <div class="hex-wrapper col-sm-4 center">
            <div class="clearfix">
                <div class="hex col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="hex-inner">
                        <img src="assets/img/hex.png" alt="" class="hex-image">

                        <div class="hex-content">
                            <i class="fa fa-search"></i>
                        </div><!-- /.hex-content -->
                    </div><!-- /.hex-inner -->
                </div><!-- /.hex -->
            </div><!-- /.clearfix -->

            <h3>Smart Property Search</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur diping elit. Curabitur non gravida nisi. Nam vel magna
            </p>

            <a class="btn btn-white" href="#">More</a>
        </div>

        <div class="hex-wrapper col-sm-4 center">
            <div class="clearfix">
                <div class="hex col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="hex-inner">
                        <img src="assets/img/hex.png" alt="" class="hex-image">

                        <div class="hex-content">
                            <i class="fa fa-compass"></i>
                        </div><!-- /.hex-content -->
                    </div><!-- /.hex-inner -->
                </div><!-- /.hex -->
            </div><!-- /.clearfix -->

            <h3>We Are Here To Help You</h3>

            <p>
                Lorem ipsum dolor sit amet, consectetur diping elit. Curabitur non gravida nisi. Nam vel magna
            </p>

            <a class="btn btn-white" href="#">More</a>
        </div>
    </div><!-- /.block-content-inner -->
</div><!-- /.block-content -->            </div><!-- /.container -->
        </div><!-- /#main-inner -->
    </div><!-- /#main -->
</div><!-- /#main-wrapper -->

    <div id="footer-wrapper">
        <div id="footer">
            <div id="footer-inner">
                <div class="footer-top">
    <div class="container">
        <div class="row">
    <div class="widget col-sm-8">
        <h2>Template Features</h2>

        <div class="row">
            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-rocket"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Portal Ready Solution</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->


            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-map-marker"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Directory Features</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->

            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-code"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Superb Source Code</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->

            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-flask"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Most Recent Bootstrap</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->

            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-mobile"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Full Responsive Design</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->

            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-search"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Retina Ready</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->
        </div><!-- /.row -->
    </div><!-- /.widget -->

    <div class="widget col-sm-4">
        <h2>Why Choose Us</h2>

        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading active">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Property Management
                        </a>
                    </h4>
                </div><!-- /.panel-heading -->

                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                    </div><!-- /.panel-body -->
                </div><!-- /.panel-heading -->
            </div><!-- /.panel -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Lifetime Updates
                        </a>
                    </h4>
                </div><!-- /.panel-heading -->

                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                    </div><!-- /.panel-body -->
                </div><!-- /.panel-collapse -->
            </div><!-- /.panel -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Free Theme Support
                        </a>
                    </h4>
                </div><!-- /.panel-heading -->

                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                    </div><!-- /.panel-body -->
                </div><!-- /.panel-collapse -->
            </div><!-- /.panel -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Rich Documentation
                        </a>
                    </h4>
                </div><!-- /.panel-heading -->

                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                    </div><!-- /.panel-body -->
                </div><!-- /.panel-collapse -->
            </div><!-- /.panel -->
        </div><!-- /.panel-group -->
    </div><!-- /.widget-->
</div><!-- /.row -->

        <hr>

        <div class="row">
    <div class="col-sm-9">
        <ul class="footer-nav nav nav-pills">
            <li><a href="#">Home</a></li>
            <li><a href="#">Properties</a></li>
            <li><a href="#">Agents</a></li>
            <li><a href="#">Agencies</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
        </ul><!-- /.footer-nav -->
    </div>

    <div class="col-sm-3">
        <form method="post" action="?" class="form-horizontal form-search">
            <div class="form-group has-feedback no-margin">
                <input type="text" class="form-control" placeholder="Search">

                                        <span class="form-control-feedback">
                                            <i class="fa fa-search"></i>
                                        </span><!-- /.form-control-feedback -->
            </div><!-- /.form-group -->
        </form>
    </div>
</div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.footer-top -->
                <div class="footer-bottom">
                    <div class="container">
                        <p class="center no-margin">
                            &copy; 2014 Your Company, All Right reserved
                        </p>

                        <div class="center">
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul><!-- /.social -->
                        </div><!-- /.center -->
                    </div><!-- /.container -->
                </div><!-- /.footer-bottom -->
            </div><!-- /#footer-inner -->
        </div><!-- /#footer -->
    </div><!-- /#footer-wrapper -->
</div><!-- /#wrapper -->
</body>
</html>
