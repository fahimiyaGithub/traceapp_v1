var inp_phone = document.getElementById('phone_num');
//inp_phone.onkeyup = inp_phone.onchange = enforceFloat;

//enforce that only a float can be input
function enforceFloat() {
  var valid = /^\-?\d+\.\d*$|^\-?[\d]*$/;
  var number = /\-\d+\.\d*|\-[\d]*|[\d]+\.[\d]*|[\d]+/;
  if (!valid.test(this.value)) {
    var n = this.value.match(number);
    this.value = n ? n[0] : '';
   }
}