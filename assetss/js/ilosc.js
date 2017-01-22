var ilosc = $('#ilosc').val();
var cena = parseInt($('#cena_glowna').text());
var suma=cena;
$('#suma').text(suma);
$("#minus").click(function () {
    if(ilosc>1)
    {
        ilosc--;
        suma=ilosc*cena;
        $('#suma').text(suma);
        $("#ilosc").val(ilosc);
    }
});
$("#plus").click(function () {
    ilosc++;
    suma=ilosc*cena;
    $('#suma').text(suma);
    $("#ilosc").val(ilosc);
});/**
 * Created by marci on 22.11.2016.
 */
