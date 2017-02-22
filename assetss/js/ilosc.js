var ilosc = $('#ilosc').val();
var cena = $('#cena_glowna').val();
var suma=cena;
$('#suma').text(suma);
console.log("suma"+suma);
console.log("ilosc"+ilosc);
console.log("cena"+cena);
$("#minus").click(function () {
    if(ilosc>1)
    {
        ilosc--;
        suma=ilosc*cena;
        $('#suma').text(suma);
        $("#ilosc").val(ilosc);
        console.log(suma);
    }
});
$("#plus").click(function () {
    ilosc++;
    suma=ilosc*cena;
    $('#suma').text(suma);
    $("#ilosc").val(ilosc);
    console.log(suma);
});/**
 * Created by marci on 22.11.2016.
 */
