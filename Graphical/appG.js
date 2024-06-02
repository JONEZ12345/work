let PtheKey = document.getElementById("theKey");
let PsecretOne = document.getElementById("secretOne");
let PsecretTwo = document.getElementById("secretTwo");
   
let encryptBtn = document.getElementById("encrypt");



encryptBtn.addEventListener('click', () => {
  
    
  
    theKey = PtheKey.value;
    secretOne = PsecretOne.value;
    secretTwo = PsecretTwo.value;
 

    let secret = secretTwo.split("").reverse().join("");

    let theKeyRev = theKey.split("").reverse().join("");

    let secretOneRevKey = secretOne.split("").reverse().join("");
    let secretOneRevKeyArray = secretOneRevKey.split('');

    let secretTwoRevKey = secretTwo.split("").reverse().join("");


    let result = theKeyRev.replace(secretTwo, "");

    array = result.split('');

    var a = array.splice(0,5);
    var b = array.splice(0,5);
    var c = b.concat(secretOneRevKeyArray[0]);
    var d = array.splice(0,5);
    var e = secretOneRevKeyArray[1].split("");
    var f = e.concat(d);
    var g = array.splice(0,5);
    var h = array.splice(0,10);


    let a1 = a.join("");
    let b1 = c.join("");
    let d1 = f.join("");
    let e1 = g.join("");
    let f1 = h.join("");

    decodeKey = [];
    decodeKey.push(a1, b1, d1, e1, f1);

    // console.log(decodeKey);
    
    // document.getElementById("result").innerHTML = decodeKey.toString();

    // document.getElementById("result").innerHTML = '["' + a1 + '", ' + '"' + b1 + '", ' + '"' + d1 + '", ' + '"' + e1 + '", ' + '"' + f1 + '"]';

    document.getElementById("result").innerHTML =`["${a1}", "${b1}", "${d1}", "${e1}", "${f1}"]`

    })

