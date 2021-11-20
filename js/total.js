
var iprice = document.getElementsByClassName('price');
var iamount = document.getElementsByClassName('amount');
var itotal = document.getElementsByClassName('itotal');
var total = document.getElementById('itotal2');
            

function iTotal() {
    pricetotal = 0
    for (i = 0; i < iprice.length; i++) {
        itotal[i].innerText = (iprice[i].value)*(iamount[i].value)

        pricetotal = pricetotal + (iprice[i].value)*(iamount[i].value)
    }
    total.innerText = pricetotal
}
iTotal();
