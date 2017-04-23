var div1 = 0;
var div2 = 0;
var div3 = 0;
var div4 = 0;
var div5 = 0;
var chetny_div = '';
function wolny_div() {
    if (div1 == 0) {
        chetny_div = 'div1';
        div1 = 1;
    }
    else if (div2 == 0) {
        chetny_div = 'div2';
        div2 = 1;
    }
    else if (div3 == 0) {
        chetny_div = 'div3';
        div3 = 1
    }
    else if (div4 == 0) {
        chetny_div = 'div4';
        div4 = 1
    }
    else if (div5 == 0) {
        chetny_div = 'div5';
        div5 = 1
    }
    else if (div1 == 1 && div2 == 1 && div3 == 1 && div4 == 1 && div5 == 1) {
        chetny_div = 'brak';
        alert("Maksymalna ilość zawieszek to 5 :)");
    }
    return chetny_div;
}
