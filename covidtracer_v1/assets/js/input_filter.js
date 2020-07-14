function myFunction() {
  var div1 = document.getElementById("inp1");
  var div2 = document.getElementById("inp2");
  div1.style.display = "none";
  div2.style.display = "block";
}

var input = document.getElementById('number');
input.onkeyup = input.onchange = enforceFloat;

var input2 = document.getElementById('number2');
//input2.onkeyup = input2.onchange = enforceFloat;

//enforce that only a float can be input
function enforceFloat() {
  var valid = /^\-?\d+\.\d*$|^\-?[\d]*$/;
  var number = /\-\d+\.\d*|\-[\d]*|[\d]+\.[\d]*|[\d]+/;
  if (!valid.test(this.value)) {
    var n = this.value.match(number);
    this.value = n ? n[0] : '';
   }
}