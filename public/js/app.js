if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready();
}


// create row on click

function ready(){
    document.getElementById("addRow").addEventListener("click", function(e) {

        console.log("clicked...")

        var table = document.getElementById('myTable');
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        row.setAttribute('class', 'productrows');
        //Column 1
        var cell1 = row.insertCell(0);
        var element1 = document.createElement("button");
        element1.innerHTML = '<i class="fas fa-minus-circle" name="btnName"></i>';
        element1.type = "button";
        var btnName = "button" + (rowCount + 1);
        element1.name = btnName;
        element1.setAttribute('value', 'Delete'); // or element1.value = "button";
        element1.setAttribute('class', 'btn btn-danger delteBtn');
        element1.onclick = function() {
            removeRow(btnName);
        }
        cell1.appendChild(element1);

        //Column 2
        var cell5 = row.insertCell(1);
        var element5 = document.createElement("input");
        element5.type = "text";
        element5.setAttribute('class', 'form-control');
        element5.setAttribute('placeholder', 'Student Name');
        element5.setAttribute('name', 'name[]');
        element5.setAttribute('id', 'productName');
        cell5.appendChild(element5);

        //Column 2
        var cell2 = row.insertCell(2);
        var element2 = document.createElement("input");
        element2.type = "number";
        element2.setAttribute('class', 'form-control price numberInputs');
        element2.setAttribute('placeholder', 'Price');
        element2.setAttribute('name', 'price[]');
        element2.setAttribute('id', 'price');
        element2.setAttribute('value', '0');
        element2.onkeyup = function() {
        handleTotal();
        }

        cell2.appendChild(element2);

        //Column 3
        var cell3 = row.insertCell(3);
        var element3 = document.createElement("input");
        element3.type = "number";
        element3.setAttribute('class', 'form-control qty numberInputs');
        element3.setAttribute('placeholder', 'Qty');
        element3.setAttribute('name', 'qty[]');
        element3.setAttribute('id', 'qty');
        element3.setAttribute('value', '1');
        element3.onkeyup = function() {
        handleTotal();
        }

        cell3.appendChild(element3);


        //Column 4
        var cell4 = row.insertCell(4);
        var element4 = document.createElement("b");
        // element4.type = "text";
        element4.setAttribute('class', 'totalprice');
        cell4.appendChild(element4);


        var numberInputs = document.getElementsByClassName('numberInputs');
        for (let i = 0; i < numberInputs.length; i++) {
            const input = numberInputs[i];
            input.addEventListener('change', quantityChanged);

        }


});


}

// Input validation

function quantityChanged(event){
    var input = event.target;
    if(isNaN(input.value) || input.value <= 0 ){
        input.value = 1;
    }
    // handleTotal();
}


// Total calculation

function handleTotal(){

    var productrows = document.getElementsByClassName('productrows');

    var subToal = 0

    for (var i = 0; i < productrows.length; i++) {
        const productrow = productrows[i];
        const price = productrow.getElementsByClassName('price')[0];
        const qty = productrow.getElementsByClassName('qty')[0];
        const totalprice = productrow.getElementsByClassName('totalprice')[0];

        const total = parseFloat(price.value) * parseFloat(qty.value);

        totalprice.innerHTML = total;

        subToal = subToal + (parseFloat(price.value) * parseFloat(qty.value));

        document.getElementById('subTotal').innerText = subToal;

    }

    // var grandTotal = document.getElementById('grandTotal');

    // grandTotal.innerText = subToal;

    // discountTotal()

}

// Discount calculation

/* function discountTotal(){

    var subTotal = document.getElementById('subTotal');
    var grandTotal = document.getElementById('grandTotal');
    var discount = document.getElementById('discount');

    var grandCal = parseFloat(subTotal.innerText) - parseFloat(discount.value);

    grandTotal.innerText = grandCal;

} */

//Remove Row for table

function removeRow(btnName) {
    try {
        var table = document.getElementById('myTable');
        var rowCount = table.rows.length;
        for (var i = 0; i < rowCount; i++) {
            var row = table.rows[i];
            var rowObj = row.cells[0].childNodes[0];
            if (rowObj.name == btnName) {
                table.deleteRow(i);
                rowCount--;
                handleTotal();
            }
        }
    } catch (e) {
        alert(e);
    }
}

//Random Number for Invoice

/* const str = Math.floor(new Date().getTime() * Math.random()).toString();
const invoice_no = '#INV-' + str.slice(0, 5);
console.log(invoice_no)

document.getElementById('invoice_no').innerHTML = invoice_no;
document.getElementById('invoice_no_input').value = invoice_no; */
