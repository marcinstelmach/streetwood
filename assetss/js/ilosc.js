var ilosc = $('#ilosc').val();
$("#minus").click(function () {
    if(ilosc>1)
    {
        ilosc--;
        $("#ilosc").val(ilosc);
    }
});
$("#plus").click(function () {
    ilosc++;
    $("#ilosc").val(ilosc);
});
