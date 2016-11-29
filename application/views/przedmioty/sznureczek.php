<script type="text/javascript" src="<?=base_url()?>assetss/js/jquery-1.9.1.min.js"></script>
<div class="col-md-5">
        <img src="<?=base_url()?>assetss/img/products/bransoletki/sznureczek/6.png" width="500"/>
        <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/01.png" style="position: absolute; top: 400px; left: 110px;"/>

</div>


<div class="col-md-5" style="padding-left: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="nazwa-przedmiotu">Case iPhone</h1>
            <p class="cena-przedmiotu"><span id="cena">55.00</span> </p>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">

        <div class="col-md-5">
            <p>Model</p>
            <select name="size">
                <option value="5">iPhone 5/5s</option>
                <option value="6">iPhone 6/6s</option>
                <option value="7">iPhone 7</option>
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
        <p>Wyjdź z przekazem! Najlepiej do siebie przed lustro :)

            No chyba, że chciałabyś komuś jeszcze powiedzieć „I just want to say you look great today”.

            Na pewno nikt się nie obrazi zobaczyć Cię w tej koszulce!

            Nowy krój w naszym sklepie, czyli RINGER z czarnym wykończeniem lubi, kiedy o niego dbasz.

            - modelka ma na sobie rozmiar S

            - prać w 30 stopniach lub ręcznie

            - prasować na lewej stronie

            - 100% bawełna z certyfikatem Oeko-Tex 100 klasa I</p>
    </div>
</div>
</div>
</div>




<div class="container bestsellers ">
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
        <div class="col-xs-6 col-md-4 hidden-xs">
            <a href="#" class="thumbnail">
                <img src="<?php echo base_url(); ?>assetss/img/footer/footer3.jpg" alt="Zdjęcie">
            </a>
        </div>
    </div>
</div><!-- END OF U NAS ZAWSZE -->

<script type="text/javascript" src="<?= base_url().'assetss/js/ilosc.js'?>"></script>