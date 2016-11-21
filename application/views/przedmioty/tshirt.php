<script type="text/javascript" src="<?=base_url()?>assetss/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assetss/js/jssor.slider.mini.js"></script>
<script type="text/javascript" src="<?=base_url()?>assetss/js/galeria.js"></script>
<style>
    .jssort01 {
        position: absolute;
        /* size of thumbnail navigator container */
        width: 800px;
        height: 100px;
    }
    .jssort01 .p {
        position: absolute;
        top: 0;
        left: 0;
        width: 72px;
        height: 72px;
    }
    .jssort01 .t {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
    .jssort01 .w {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
    }
    .jssort01 .c {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 68px;
        height: 68px;
        border: #000 2px solid;
        box-sizing: content-box;
        _background: none;
    }
    .jssort01 .pav .c {
        top: 2px;
        _top: 0px;
        left: 2px;
        _left: 0px;
        width: 68px;
        height: 68px;
        border: #000 0px solid;
        _border: #fff 2px solid;
        background-position: 50% 50%;
    }
    .jssort01 .p:hover .c {
        top: 0px;
        left: 0px;
        width: 70px;
        height: 70px;
        border: #fff 1px solid;
        background-position: 50% 50%;
    }
    .jssort01 .p.pdn .c {
        background-position: 50% 50%;
        width: 68px;
        height: 68px;
        border: #000 2px solid;
    }
</style>
<div class="container przedmiot_container">
    <div class="row">
        <div class="col-md-6">
            <!-- Jssor Slider Begin -->
            <!-- To move inline styles to css file/block, please specify a class name for each element. -->
            <div id="slider1_container" style="position: relative; top: 20px; left: 0px; width: 800px;
            height: 600px; background: #FFFFFF; overflow: hidden;">

                <!-- Slides Container -->
                <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 800px; height: 500px; overflow: hidden;">
                    <div>
                        <img u="image" src="<?=base_url()?>assetss/img/alila/01.jpg" />
                        <img u="thumb" src="<?=base_url()?>assetss/img/alila/thumb-01.jpg" />
                    </div>
                    <div>
                        <img u="image" src="<?=base_url()?>assetss/img/alila/02.jpg" />
                        <img u="thumb" src="<?=base_url()?>assetss/img/alila/thumb-02.jpg" />
                    </div>
                    <div>
                        <img u="image" src="<?=base_url()?>assetss/img/alila/03.jpg" />
                        <img u="thumb" src="<?=base_url()?>assetss/img/alila/thumb-03.jpg" />
                    </div>
                    <div>
                        <img u="image" src="<?=base_url()?>assetss/img/alila/04.jpg" />
                        <img u="thumb" src="<?=base_url()?>assetss/img/alila/thumb-04.jpg" />
                    </div>
                    <div>
                        <img u="image" src="<?=base_url()?>assetss/img/alila/05.jpg" />
                        <img u="thumb" src="<?=base_url()?>assetss/img/alila/thumb-05.jpg" />
                    </div>
                    <div>
                        <img u="image" src="<?=base_url()?>assetss/img/alila/06.jpg" />
                        <img u="thumb" src="<?=base_url()?>assetss/img/alila/thumb-06.jpg" />
                    </div>

                </div>
                <!-- thumbnail navigator container -->
                <div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;">
                    <!-- Thumbnail Item Skin Begin -->
                    <div u="slides" style="cursor: pointer;">
                        <div u="prototype" class="p">
                            <div class=w><div u="thumbnailtemplate" class="t"></div></div>
                            <div class=c></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jssor Slider End -->
        </div>
        <div class="col-md-6" style="padding-left: 50px; margin-top: 20px;">
            <div class="row">
                <div class="col-md-12">
                    <p>Nazwa: Plecak szary</p>
                    <p>Cena: 55.00 zł</p>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <select class="form-control" name="size">
                        <option value="">Wybierz rozmiar</option>
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="xl">XL</option>
                    </select>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-md-1 col-xs-1">
                    <button id="minus" class="increment btn btn-primary" style="background-color: #555555; border: none">
                        -
                    </button>
                </div>
                <div class="col-md-1 col-xs-1" >
                    <input type="text" value="1" id="ilosc" class="ilosc" />
                </div>
                <div class="col-md-1 col-xs-1">
                    <button id="plus" class="increment btn btn-primary" style="background-color: #555555; border: none;">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</div><!-- END OF BESTSELLERS -->



<div class="container bestsellers">
    <div clss="row">
        <hr class="style-u-nas">
    </div>
    <div class="row" style="padding-top: 20px;">
        <div class="col-xs-6 col-md-4">
            <a href="#" class="thumbnail">
                <img src="<?php echo base_url(); ?>assetss/img/footer/footer1.jpg" alt="Zdjęcie">
            </a>
        </div>
        <div class="col-xs-6 col-md-4">
            <a href="#" class="thumbnail">
                <img src="<?php echo base_url(); ?>assetss/img/footer/footer2.jpg" alt="Zdjęcie">
            </a>
        </div>
        <div class="col-xs-6 col-md-4">
            <a href="#" class="thumbnail">
                <img src="<?php echo base_url(); ?>assetss/img/footer/footer3.jpg" alt="Zdjęcie">
            </a>
        </div>
    </div>
</div><!-- END OF U NAS ZAWSZE -->

<script>
    $("#minus").click(function () {
        var ilosc = $('#ilosc').val();
        if(ilosc>1)
        {
            ilosc--;
            $("#ilosc").val(ilosc);
        }
    });
    $("#plus").click(function () {
        var ilosc = $('#ilosc').val();
        ilosc++;
        $("#ilosc").val(ilosc);
    });
</script>