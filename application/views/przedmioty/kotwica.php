<script type="text/javascript" src="<?=base_url()?>assetss/js/jquery-1.9.1.min.js"></script>
<div class="col-md-5">
    <?php
    foreach ($produkt as $item) {
    ?>
    <h1 class="nazwa-przedmiotu visible-xs"><?=$item->nazwa?></h1>
    <div style="position: relative; height: 520px">
        <!-- Brans -->
        <?php
        foreach ($zdjecia as $key) {
                echo '<img src="'.base_url().'assetss/img/products/bransoletki/kotwica/'.$key->nazwa_zdjecia.'"  id="guzik" draggable="false" style="z-index: -10; width: 500px;" class="img-responsive"/>';
        }
        ?>

        <!-- Lewy divek -->
        <button onclick="wyczysc('div1')" id="div1del" class="buttondel" style="display: none"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <div id="div1" class="column gb1" draggable="true" ondragenter="event.stopPropagation(); event.preventDefault();" ondragover="event.stopPropagation(); event.preventDefault();" ondrop="event.stopPropagation(); event.preventDefault();"></div>
        <!-- Prawy divek -->
        <button onclick="wyczysc('div2')" id="div2del" class="buttondel" style="display: none"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <div id="div2" class="column gb2" draggable="true" ondragenter="event.stopPropagation(); event.preventDefault();" ondragover="event.stopPropagation(); event.preventDefault();" ondrop="event.stopPropagation(); event.preventDefault();" ></div>
        <button onclick="wyczysc('div3')" id="div3del" class="buttondel" style="display: none"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <div id="div3" class="column gb3" draggable="true" ondragenter="event.stopPropagation(); event.preventDefault();" ondragover="event.stopPropagation(); event.preventDefault();" ondrop="event.stopPropagation(); event.preventDefault();" ></div>
        <button onclick="wyczysc('div4')" id="div4del" class="buttondel" style="display: none"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <div id="div4" class="column gb4" draggable="true" ondragenter="event.stopPropagation(); event.preventDefault();" ondragover="event.stopPropagation(); event.preventDefault();" ondrop="event.stopPropagation(); event.preventDefault();" ></div>
        <button onclick="wyczysc('div5')" id="div5del" class="buttondel" style="display: none"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <div id="div5" class="column gb5" draggable="true" ondragenter="event.stopPropagation(); event.preventDefault();" ondragover="event.stopPropagation(); event.preventDefault();" ondrop="event.stopPropagation(); event.preventDefault();" ></div>
    </div>
    <!-- Środkowy divek -->

</div>




<div class="col-md-5" style="padding-left: 80px;">
    <div class="row">
        <div class="col-md-12">

            <h1 class="nazwa-przedmiotu"><?=$item->nazwa?></h1>
            <?php
            foreach ($stale_info as $key) {
            ?>
            <p class="cena-przedmiotu cena1" style="display: inline;"><span
                    id="cena"><?= number_format($key->zawieszka1, 2) ?> zł</span></p>
            <p class="cena-przedmiotu cena2" style="display: none;"><span
                    id="cena"><?= number_format($key->zawieszka2, 2) ?> zł</span></p>
            <p class="cena-przedmiotu cena3" style="display: none;"><span
                    id="cena"><?= number_format($key->zawieszka3, 2) ?> zł</span></p>
            <p class="cena-przedmiotu cena4" style="display: none;"><span
                    id="cena"><?= number_format($key->zawieszka4, 2) ?> zł</span></p>
            <p class="cena-przedmiotu cena5" style="display: none;"><span
                    id="cena"><?= number_format($key->zawieszka5, 2) ?> zł</span></p>
        </div>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-7">
            <button class="wybierz-zawieszke" data-toggle="modal" data-target="#wybierz-zawieszke">Wybierz zawieszke</button>
        </div>
    </div>
    <?=form_open('koszyk/dodaj')?>

        <div class="row" style="padding-top: 20px">
            <div class="col-xs-12">
                <button id="minus" class="increment" style="background-color: #555555; border: none" type="button">
                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                </button>
                <input type="text" value="1" id="ilosc" class="ilosc" name="ilosc"/>
                <button id="plus" class="increment" style="background-color: #555555; border: none;" type="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p>Suma: <span id="suma"></span>.00</p>
            </div>
        </div>
        <input type="hidden" name="zawieszka1" id="zawieszka1" value=""/>
        <input type="hidden" name="zawieszka2" id="zawieszka2" value=""/>
        <input type="hidden" name="zawieszka3" id="zawieszka3" value=""/>
        <input type="hidden" name="zawieszka4" id="zawieszka4" value=""/>
        <input type="hidden" name="zawieszka5" id="zawieszka5" value=""/>
        <input type="hidden" name="cena" id="cena_glowna" value="<?=$key->zawieszka1?>"/>
        <input type="hidden" name="nazwa" value="<?=$item->nazwa?>">
        <input type="hidden" name="id_produktu" value="<?=$item->id_produktu?>">
        <input type="hidden" name="actual_adress" value="<?=base_url(uri_string())?>">
        <div class="row" style="margin-top: 20px">
            <div class="center-block">
                <input class="dodaj-do-koszyka" type="submit" value="Dodaj do koszyka">
            </div>
        </div>
        </form>
        <?php
    }
    ?>
    <div class="row">
        <hr />
        <h2>Szczegóły</h2>
        <?php echo '<p>'.$key->opis.'</p>';
        }
        ?>

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
                    <?php
                    $name_kat='';
                    $i=1;
                    foreach ($zawieszki as $key)
                    {
                        if($key->nazwa_kategorii_zawieszek!=$name_kat)
                        {
                            echo '<div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading'.$i.'">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">
                            <h4 class="panel-title">'.$key->nazwa_kategorii_zawieszek.'</h4>
                            </a>
                        </div></div>
                        <div id="collapse'.$i.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$i.'">
                            <div class="panel-body">';

                            foreach ($zawieszki as $keyy)
                            {
                                if ($keyy->nazwa_kategorii_zawieszek == $key->nazwa_kategorii_zawieszek)
                                {
                                    echo '<img id="zdj'.$i.'" src="'.base_url().'assetss/img/products/bransoletki/zawieszki/'.$keyy->nazwa_zdjecia.'" style="width: 70px"/>';
                                    $i++;
                                }
                            }
                            echo '</div></div>';
                        }
                        $name_kat=$key->nazwa_kategorii_zawieszek;
                    }
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>
<!-- Dialog -->
<div id="dialog-message" title="Bład" style="display:none" >
    <p>
        <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
        Maksymalna ilość zawieszek to 3. Jesli chcesz zmienić zawieszkę, usuń dodaną i dodaj nowa.
    </p>
</div>
<!--Koniec Dialogu -->
<script type="text/javascript" src="<?= base_url().'assetss/js/ilosc.js'?>"></script>
<script type="text/javascript">
    var div1=0;
    var div2=0;
    var div3=0;
    var div4=0;
    var div5=0;
    var chetny_div='';
    function wolny_div()
    {
        if(div1==0)
        {
            chetny_div='div1';
            div1=1;
        }
        else if(div2==0)
        {
            chetny_div='div2';
            div2=1;
        }
        else if(div3==0)
        {
            chetny_div='div3';
            div3=1
        }
        else if(div4==0)
        {
            chetny_div='div4';
            div4=1
        }
        else if(div5==0)
        {
            chetny_div='div5';
            div5=1
        }
        else if(div1==1 && div2==1 && div3==1 && div4==1 && div5==1)
        {
            chetny_div='brak';
        }
        return chetny_div;
    }

    <?php
    $i=1;
    foreach($zawieszki as $key)
    {
        echo 'document.getElementById("zdj'.$i.'").onclick=function(){dodaj_zawieszke(wolny_div(), "'.$key->nazwa_zdjecia.'");};';
        $i++;
    }
    ?>

</script>
<script src="<?= base_url().'assetss/js/drag_and_over.js'?>" type="text/javascript"></script>
<script type="text/javascript">
    var ilosc_zawieszek=0;
    function dialogg(){
        $( function() {
            $( "#dialog-message" ).dialog({
                modal: true,
                buttons: {
                    Ok: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        } );
    }
    function nazwa_zdjecia(str)
    {
        var n = str.lastIndexOf("/");
        var len = str.length;
        var zdjecie = str.substring(n+1, len-2);
        return zdjecie;
    }

    function dodaj_zawieszke($div, $nazwa_zdjecia)
    {
        if($div!='brak') {
            $("#" + $div).append('<img style="width:60px;" src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/' + $nazwa_zdjecia + '">');
            wybierz_cene(1);
            $("#" + $div + "del").css("display", "inline");
        }
        else
        //alert("Nie mozna wybrać więcej niż trzech zawieszek");
            dialogg();
    }

    function wybierz_cene($inc) {
        if($inc==1)
            ilosc_zawieszek++;
        else if($inc==0)
            ilosc_zawieszek--;
        switch (ilosc_zawieszek)
        {
        <?php
            foreach($stale_info as $item)
            {
            ?>
            case 1 :
                $(".cena1").css("display", "inline");
                $(".cena2").css("display", "none");
                $(".cena3").css("display", "none");
                $(".cena4").css("display", "none");
                $(".cena5").css("display", "none");
                $("#cena_glowna").val(<?=$item->zawieszka1?>);
                break;
            case 2 :
                $(".cena1").css("display", "none");
                $(".cena2").css("display", "inline");
                $(".cena3").css("display", "none");
                $(".cena4").css("display", "none");
                $(".cena5").css("display", "none");
                $("#cena_glowna").val(<?=$item->zawieszka2?>);
                break;
            case 3 :
                $(".cena1").css("display", "none");
                $(".cena2").css("display", "none");
                $(".cena3").css("display", "inline");
                $(".cena4").css("display", "none");
                $(".cena5").css("display", "none");
                $("#cena_glowna").val(<?=$item->zawieszka3?>);
                break;
            case 4 :
                $(".cena1").css("display", "none");
                $(".cena2").css("display", "none");
                $(".cena3").css("display", "none");
                $(".cena4").css("display", "inline");
                $(".cena5").css("display", "none");
                $("#cena_glowna").val(<?=$item->zawieszka4?>);
                break;
            case 5 :
                $(".cena1").css("display", "none");
                $(".cena2").css("display", "none");
                $(".cena3").css("display", "none");
                $(".cena4").css("display", "none");
                $(".cena5").css("display", "inline");
                $("#cena_glowna").val(<?=$item->zawieszka5?>);
                break;
            default :
                return false;

        <?php
            }
            ?>
        }
    }
    
    $('#div1').bind("DOMSubtreeModified",function(){
        $("#zawieszka1").val(nazwa_zdjecia($("#div1").html()));
    });

    $('#div2').bind("DOMSubtreeModified",function(){
        $("#zawieszka2").val(nazwa_zdjecia($("#div2").html()));
    });

    $('#div3').bind("DOMSubtreeModified",function(){
        $("#zawieszka3").val(nazwa_zdjecia($("#div3").html()));
    });

    $('#div4').bind("DOMSubtreeModified",function(){
        $("#zawieszka4").val(nazwa_zdjecia($("#div4").html()));
    });

    $('#div5').bind("DOMSubtreeModified",function(){
        $("#zawieszka5").val(nazwa_zdjecia($("#div5").html()));
    });


    function wyczysc($div)
    {
        $("#"+$div).empty();
        $("#" + $div + "del").css("display", "none");
        if($div=='div1')
            div1=0;
        else if($div=='div2')
            div2=0;
        else if($div=='div3')
            div3=0;
        else if($div=='div4')
            div4=0;
        else if($div=='div5')
            div5=0;

        wybierz_cene(0);
    }

</script>