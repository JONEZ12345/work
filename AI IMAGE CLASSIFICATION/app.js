
function check(){

$('#check').prop('disabled', true);

let img;

const element = document.getElementById("result");
element.innerHTML = "Detecting...";
$("#result").addClass( "border" );

// Initialize Image Classifier with MobileNet.
const classifier =  ml5.imageClassifier('MobileNet');
img = document.getElementById("image"); 
// img = loadImage('cat.png');
classifier.classify(img, gotResult);

// Function to run when results arrive
function gotResult(error, results) {
 
  if (error) {
    element.innerHTML = error;
  } else {
    let num = results[0].confidence * 100;
    element.innerHTML = "<h5>" + results[0].label + "</h5> Confidence: <b>" + num.toFixed(2) + "%</b>";
  }
}

}




function readURL(input) {
    if (input.files && input.files[0]) {
        $('#check').prop('disabled', false);
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$('#check').prop('disabled', true);
