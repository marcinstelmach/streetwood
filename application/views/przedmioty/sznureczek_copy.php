<script type="text/javascript" src="<?=base_url()?>assetss/js/jquery-1.9.1.min.js"></script>
<div class="col-md-5">
    <h1 class="nazwa-przedmiotu visible-xs">Case iPhone</h1>
    <p class="cena-przedmiotu visible-xs"><span id="cena">55.00</span> </p>
    <div style="position: relative; height: 520px">
        <!-- Brans -->
        <img src="<?=base_url()?>assetss/img/products/bransoletki/sznureczek/brzoskwinia.png"  id="brans"/>
        <!-- Lewa zawieszka -->
        <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2" class="img-responsive" id="lewa-zawieszka"/>
        <!-- prawa zawieszka -->
        <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2" class="img-responsive" id="prawa-zawieszka" />
        <!-- Środkowa zawieszka -->
        <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/01.png?v=2" class="img-responsive" id="srodkowa-zawieszka" />
    </div>
    <div class="row" >
        <div class="center-block container-fluid">
            <h4>Wybierz kolor sznureczka</h4>
            <?php
            foreach($sznureczki as $key)
            {
                $zdjecie=$key->nazwa_zdjecia;
                $thumb= substr($zdjecie, 0, -4);
                $thumb=$thumb.'_thumb.png';
                ?>
                <img src="<?=base_url()?>assetss/img/products/bransoletki/sznureczek/thumbs/<?=$thumb?>" onclick="zmien('<?=$key->nazwa_zdjecia?>','<?=$key->nazwa_przedmiotu?>')" style="cursor: pointer"/>
                <?php
            }
            ?>
        </div>
    </div>
</div>




<div class="col-md-5" style="padding-left: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="nazwa-przedmiotu">Sznureczek</h1>
            <p class="cena-przedmiotu"><span id="cena">55.00</span> </p>
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
    <input type="hidden" name="kolor_sznurka" id="kolor_sznurka" />
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


<!-- Modal -->
<div class="modal fade" id="wybierz-zawieszke" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel" style="text-transform: uppercase;">Wybierz Zawieszki</h3>
            </div>
            <div class="modal-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="panel-title" style="display: block;">
                                    Kategoria 1
                                </h4>
                            </a>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="panel-title">
                                    Kategoria 2
                                </h4>
                            </a>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2" style="width: 70px"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2" style="width: 70px"/>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h4 class="panel-title">
                                    Kategoria 3
                                </h4>
                            </a>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h4 class="panel-title">
                                    Kategoria 3
                                </h4>
                            </a>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFIve">
                                <h4 class="panel-title">
                                    Kategoria 5
                                </h4>
                            </a>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/02.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                                <img src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/03.png?v=2"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url().'assetss/js/ilosc.js'?>"></script>
<script type="text/javascript">
    function zmien($nazwa_zdjecia, $nazwa_produktu) {
        $('#brans').attr('src','<?= base_url()?>assetss/img/products/bransoletki/sznureczek/'+$nazwa_zdjecia+'?v=4');
        $('#kolor_sznurka').val($nazwa_produktu);
    }
</script>