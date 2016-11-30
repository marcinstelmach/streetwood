<script type="text/javascript" src="<?=base_url()?>assetss/js/jquery-1.9.1.min.js"></script>
<div class="col-md-5">
    <h1 class="nazwa-przedmiotu visible-xs">Case iPhone</h1>
    <p class="cena-przedmiotu visible-xs"><span id="cena">55.00</span> </p>
    <div style="position: relative">
        <!-- Brans -->
        <img src="<?=base_url()?>assetss/img/products/bransoletki/sznureczek/6.png"  id="brans"/>
        <!-- Lewa zawieszka -->
        <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7" class="img-responsive" id="lewa-zawieszka"/>
        <!-- prawa zawieszka -->
        <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7" class="img-responsive" id="prawa-zawieszka" />
        <!-- Środkowa zawieszka -->
        <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/01.png?v=7" class="img-responsive" id="srodkowa-zawieszka" />
    </div>

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
            <p>Kolor sznureczka</p>
            <select name="size">
                <option value="5">Czarny</option>
                <option value="6">Czerwony</option>
                <option value="7">Różowy</option>
            </select>
        </div>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-7">
            <button class="wybierz-zawieszke" data-toggle="modal" data-target="#wybierz-zawieszke">Wybierz zawieszke</button>
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

<!-- Modal -->
<div class="modal fade" id="wybierz-zawieszke" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Wybierz Zawieszkę</h4>
            </div>
            <div class="modal-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Kategoria 1
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Kategoria 2
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Kategoria 3
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=7"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url().'assetss/js/ilosc.js'?>"></script>