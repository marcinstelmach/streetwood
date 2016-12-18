<script type="text/javascript" src="<?=base_url()?>assetss/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assetss/js/jssor.slider.mini.js"></script>
<script type="text/javascript" src="<?=base_url()?>assetss/js/galeria.js"></script>
<script>
    //responsive code begin
    //you can remove responsive code if you don't want the slider scales while window resizes
    function ScaleSlider() {
        var windowWidth = $(window).width();

        if (windowWidth) {
            var windowHeight = $(window).height();
            var originalWidth = jssor_slider1.$OriginalWidth();
            var originalHeight = jssor_slider1.$OriginalHeight();

            var scaleWidth = windowWidth;
            if (originalWidth / windowWidth < originalHeight / windowHeight) {
                scaleWidth = Math.ceil(windowHeight / originalHeight * originalWidth);
            }

            jssor_slider1.$ScaleWidth(scaleWidth);
        }
        else
            window.setTimeout(ScaleSlider, 30);
    }

    ScaleSlider();

    $(window).bind("load", ScaleSlider);
    $(window).bind("resize", ScaleSlider);
    $(window).bind("orientationchange", ScaleSlider);
    //responsive code end

    });
</script>
<div class="col-md-5">
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. -->
    <div id="slider1_container" style="position: relative; top: 20px; left: 0px; width: 700px;
            height: 800px; background: #FFFFFF; overflow: hidden;">

        <!-- Slides Container -->
        <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 700px; height: 700px; overflow: hidden;">
            <?php
            foreach ($zdjecia as $zdj)
            {
                echo '<div>
                            <img u="image" src="'.base_url().'assetss/img/products/odziez/t-shirt/'.$zdj->nazwa_zdjecia.'" />
                            <img u="thumb" src="'.base_url().'assetss/img/products/odziez/t-shirt/thumbs/'.$zdj->nazwa_zdjecia.'" />
                        </div>';
            }
            ?>

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

<?php
foreach ($produkt as $pro) {
?>
<div class="col-md-5" style="padding-left: 50px; padding-bottom: 50px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="nazwa-przedmiotu"><?=$pro->nazwa?></h1>
            <p class="cena-przedmiotu"><span id="cena"><?=$pro->cena?>.00</span></p>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">

        <div class="col-md-5">
            <p>Rozmiar</p>
            <select name="size">
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>
            </select>
            <p>Kolor</p>
            <select name="color">
                <option value="black">Czarna</option>
                <option value="white">Biała</option>
                <option value="gray">Szara</option>
            </select>
        </div>
    </div>
    <div class="row" style="padding-top: 20px">
        <div class="col-xs-5">
            <button id="minus" class="increment" style="background-color: #555555; border: none">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
            </button>
            <input type="text" value="1" id="ilosc" class="ilosc" />
            <button id="plus" class="increment" style="background-color: #555555; border: none;">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p>Suma: <span id="suma"></span>.00</p>
        </div>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="center-block">
            <input class="dodaj-do-koszyka" type="submit" value="Dodaj do koszyka">
        </div>
    </div>
    <div class="row">
        <hr style="border-width: 2px; border-color:#0f1f0f />
                <div class="col-md-7">

        <h2>Szczegóły</h2>
        <p><?=$pro->opis?></p>
    </div>
    <?php
    }
    ?>
</div>
</div>
</div>


<script type="text/javascript" src="<?= base_url().'assetss/js/ilosc.js'?>"></script>