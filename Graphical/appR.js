let PtheKey = document.getElementById("theKey");
let PsecretOne = document.getElementById("secretOne");
let PsecretTwo = document.getElementById("secretTwo");
   
let encryptBtn = document.getElementById("encrypt");

encryptBtn.addEventListener('click', () => {

    let MixString = PtheKey.value;
    
    MixString = MixString.replace(/,/g, '');
    let result = MixString.replace("[", "");
    result = result.replace("]", "");
    result = result.replace(/"/g, '');
    let arr = result.split(' ');


    let secretOne = PsecretOne.value; 
    let secretTwo = PsecretTwo.value;
    
    let secret = secretTwo.split("").reverse().join("");
    stepOne = arr.join("").split("").reverse().join("");
    stepTwo = stepOne.split(secretOne);
    stepThree = stepTwo[0] + stepTwo[1];
    key = stepThree + secret;
    console.log(key);



    

    document.getElementById("result").innerHTML =`${key}`;


}
)