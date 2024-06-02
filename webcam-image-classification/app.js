let video; 
let classifier; 
let label; 
let prob; 


function setup() {
    createCanvas(640, 550);
    background(0);
    video = createCapture(VIDEO);
    video.hide(); 
    background(0);
    classifier = ml5.imageClassifier('MobileNet', video, modelReady);

}

function draw() {
    background(0);
    image(video, 0 ,0);
    fill(255);
    textSize(32);
    text(label, 10, height - 20);
}

function modelReady() {
    console.log("Model is Loded!");
    classifier.predict(gotResults);
}

function gotResults(error, results) {
    if (error) {
        console.log(error)
    } else {
        label = results[0].label; 
        prob = results[0].confidence; 
        classifier.predict(gotResults);
    }

}