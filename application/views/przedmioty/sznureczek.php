<script type="text/javascript" src="<?=base_url()?>assetss/js/jquery-1.9.1.min.js"></script>
<div class="col-md-5">
    <h1 class="nazwa-przedmiotu visible-xs">Sznureczek</h1>
    <div style="position: relative; height: 520px">
        <!-- Brans -->
        <img src="<?=base_url()?>assetss/img/products/bransoletki/sznureczek/brzoskwinia.png"  id="brans" draggable="false" style="z-index: -10;"/>
        
        <button onclick="wyczysc('div1')" id="div1delsz" class="buttondel" style="display: none"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <div id="div1" class="column sz1" draggable="true" ondragenter="event.stopPropagation(); event.preventDefault();" ondragover="event.stopPropagation(); event.preventDefault();" ondrop="event.stopPropagation(); event.preventDefault();" ></div>
        <button onclick="wyczysc('div2')" id="div2delsz" class="buttondel" style="display: none"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <div id="div2" class="column sz2" draggable="true" ondragenter="event.stopPropagation(); event.preventDefault();" ondragover="event.stopPropagation(); event.preventDefault();" ondrop="event.stopPropagation(); event.preventDefault();" ></div>
        <button onclick="wyczysc('div3')" id="div3delsz" class="buttondel" style="display: none"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <div id="div3" class="column sz3" draggable="true" ondragenter="event.stopPropagation(); event.preventDefault();" ondragover="event.stopPropagation(); event.preventDefault();" ondrop="event.stopPropagation(); event.preventDefault();" ></div>

    </div>



    <div class="row" style="margin-top: -60px;">
        <div class="center-block container-fluid">
            <h4>Wybierz kolor sznureczka</h4>
            <?php
            foreach($sznureczki as $key)
            {
                $zdjecie=$key->nazwa_zdjecia;
                ?>
                <img draggable="false" src="<?=base_url()?>assetss/img/products/bransoletki/sznureczek/thumbs/<?=$zdjecie?>" onclick="zmien('<?=$key->nazwa_zdjecia?>')" style="cursor: pointer"/>
                <?php
            }
            ?>
        </div>
    </div>
</div>




<div class="col-md-5" style="padding-left: 80px;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="nazwa-przedmiotu">Sznureczek</h1>
            <?php
            foreach ($stale_info as $key) {
            ?>
            <p class="cena-przedmiotu" id="cena1"><span id="cena"><?= number_format($key->zawieszka1, 2) ?> zł</span></p>
            <p class="cena-przedmiotu" id="cena2" style="display: none;"><span id="cena"><?= number_format($key->zawieszka2, 2) ?> zł</span></p>
            <p class="cena-przedmiotu" id="cena3" style="display: none"><span id="cena"><?= number_format($key->zawieszka3, 2) ?> zł</span></p>
        </div>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-7">
            <button class="wybierz-zawieszke" data-toggle="modal" data-target="#wybierz-zawieszke">Wybierz zawieszke</button>
        </div>
    </div>
    <?php 
    //$attributes = array('method'=>'get');
    echo form_open('koszyk/dodaj');?>
    <div class="row" style="padding-top: 20px">
        <div class="col-md-12">
            <button id="minus" class="increment" style="background-color: #555555; border: none" type="button">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
            </button>
            <input type="text" value="1" id="ilosc" class="ilosc" name="ilosc" />
            <button id="plus" class="increment" style="background-color: #555555; border: none;" type="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    <input type="hidden" name="zawieszka1" id="zawieszka1" value=""/>
    <input type="hidden" name="zawieszka2" id="zawieszka2" value=""/>
    <input type="hidden" name="zawieszka3" id="zawieszka3" value=""/>
    <input type="hidden" name="color" id="kolor_sznurka" value="brzoskwinia.png" />
    <input type="hidden" name="cena" id="cena_glowna" value="<?=$key->zawieszka1?>"/>
    <input type="hidden" name="nazwa" value="Sznureczek">
    <input type="hidden" name="id_produktu" value="1">
    <input type="hidden" name="actual_adress" value="<?=base_url(uri_string())?>">

    <div class="row" style="margin-top: 20px">
        <div class="center-block">
            <input class="dodaj-do-koszyka" type="submit" value="Dodaj do koszyka">
        </div>
    </div>
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
<div class="modal fade" id="wybierz-zawieszke" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9998;">
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
<script type="text/javascript" src="<?= base_url().'assetss/js/ilosc.js'?>"></script>
<script src="<?= base_url().'assetss/js/drag_and_over.js'?>" type="text/javascript"></script>
<script type="text/javascript">
    var ilosc_zawieszek=0;
    var div1=0;
    var div2=0;
    var div3=0;
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
        else if(div1==1 && div2==1 && div3==1)
        {
            chetny_div='brak';
            alert("Maksymalna ilość zawieszek to 3 :)");
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

    function zmien($nazwa_zdjecia) {
        $('#brans').attr('src','<?=base_url()?>assetss/img/products/bransoletki/sznureczek/'+$nazwa_zdjecia+'?v=4');
        $('#kolor_sznurka').val($nazwa_zdjecia);
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
            $("#" + $div).prepend('<img style="width:70px;" src="<?=base_url()?>assetss/img/products/bransoletki/zawieszki/' + $nazwa_zdjecia + '">');
            wybierz_cene(1);
            $("#" + $div + "delsz").css("display", "inline");
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
        $("#" + $div + "delsz").css("display", "none");
        if($div=='div1')
            div1=0;
        else if($div=='div2')
            div2=0;
        else if($div=='div3')
            div3=0;

        wybierz_cene(0);
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
                $("#cena1").css("display", "inline");
                $("#cena2").css("display", "none");
                $("#cena3").css("display", "none");
                $("#cena_glowna").val(<?=$item->zawieszka1?>);
                break;
            case 2 :
                $("#cena1").css("display", "none");
                $("#cena2").css("display", "inline");
                $("#cena3").css("display", "none");
                $("#cena_glowna").val(<?=$item->zawieszka2?>);
                break;
            case 3 :
                $("#cena1").css("display", "none");
                $("#cena2").css("display", "none");
                $("#cena3").css("display", "inline");
                $("#cena_glowna").val(<?=$item->zawieszka3?>);
                break;
            default :
                return false;

        <?php
            }
            ?>
        }
    }
</script>