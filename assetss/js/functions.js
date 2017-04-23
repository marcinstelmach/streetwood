function wybierz_cene($inc) {
    if ($inc == 1)
        ilosc_zawieszek++;
    else if ($inc == 0)
        ilosc_zawieszek--;

    switch (ilosc_zawieszek) {
        case 1 :
            $(".cena1").css("display", "inline");
            $(".cena2").css("display", "none");
            $(".cena3").css("display", "none");
            $(".cena4").css("display", "none");
            $(".cena5").css("display", "none");
            przeliczCene("#stala-cena1", ".cena1");
            $("#cena_glowna").val(wydzielCene(".cena1"));

            break;
        case 2 :
            $(".cena1").css("display", "none");
            $(".cena2").css("display", "inline");
            $(".cena3").css("display", "none");
            $(".cena4").css("display", "none");
            $(".cena5").css("display", "none");
            przeliczCene("#stala-cena2", ".cena2");
            $("#cena_glowna").val(wydzielCene(".cena2"));

            break;
        case 3 :
            $(".cena1").css("display", "none");
            $(".cena2").css("display", "none");
            $(".cena3").css("display", "inline");
            $(".cena4").css("display", "none");
            $(".cena5").css("display", "none");
            przeliczCene("#stala-cena3", ".cena3");
            $("#cena_glowna").val(wydzielCene(".cena3"));

            break;
        case 4 :
            $(".cena1").css("display", "none");
            $(".cena2").css("display", "none");
            $(".cena3").css("display", "none");
            $(".cena4").css("display", "inline");
            $(".cena5").css("display", "none");
            przeliczCene("#stala-cena4", ".cena4");
            $("#cena_glowna").val(wydzielCene(".cena4"));

            break;
        case 5 :
            $(".cena1").css("display", "none");
            $(".cena2").css("display", "none");
            $(".cena3").css("display", "none");
            $(".cena4").css("display", "none");
            $(".cena5").css("display", "inline");
            przeliczCene("#stala-cena5", ".cena5");
            $("#cena_glowna").val(wydzielCene(".cena5"));

            break;
        default :
            return false;
    }

}

$('#div1').bind("DOMSubtreeModified", function () {
    $("#zawieszka1").val(nazwa_zdjecia($("#div1").html()));
});

$('#div2').bind("DOMSubtreeModified", function () {
    $("#zawieszka2").val(nazwa_zdjecia($("#div2").html()));
});

$('#div3').bind("DOMSubtreeModified", function () {
    $("#zawieszka3").val(nazwa_zdjecia($("#div3").html()));
});

$('#div4').bind("DOMSubtreeModified", function () {
    $("#zawieszka4").val(nazwa_zdjecia($("#div4").html()));
});

$('#div5').bind("DOMSubtreeModified", function () {
    $("#zawieszka5").val(nazwa_zdjecia($("#div5").html()));
});


function wyczysc($div) {
    $("#" + $div).empty();
    $("#" + $div + "del").css("display", "none");
    if ($div == 'div1')
        div1 = 0;
    else if ($div == 'div2')
        div2 = 0;
    else if ($div == 'div3')
        div3 = 0;
    else if ($div == 'div4')
        div4 = 0;
    else if ($div == 'div5')
        div5 = 0;

    wybierz_cene(0);
}

$( document ).ready(function() {
    przeliczCene("stala-cena1", "cena1");
});

function przeliczCene($id, $class)
{
    var promocja = $("#promocja").val();
    if(promocja=='')
        return;

    var nowaCena = $($id).val();
    console.log("nowa cena wyciagnieta= "+nowaCena);
    nowaCena=Math.round(nowaCena-(nowaCena*(promocja/100)));
    $($class).text(nowaCena.toFixed(2)+" zł");
    console.log("nowa cena= "+nowaCena);
}

function wydzielCene($cena) {
    var cena = $($cena).text();
    console.log("wydzielanie: "+cena);
    var index = cena.indexOf(".");
    cena = cena.substr(0, index);
    console.log("Wydzielona nowa ładna cena :D : "+cena);
    return cena;
}

function nazwa_zdjecia(str) {
    var n = str.lastIndexOf("/");
    var len = str.length;
    var zdjecie = str.substring(n + 1, len - 2);
    return zdjecie;
}