
var mapScale = 1;
var client = {};
var x = 0;
var y = 0;

var isDragging = false;

function setup() {
   	createCanvas(window.innerWidth, window.innerHeight);
    mapper = loadImage("assets/textures/map-texture.jpg");

    client.pos = createVector(width/2,height/2);
}

function draw() {
    background(30);
	translate(width/2,height/2);
	scale(mapScale);

    image(mapper, client.pos.x, client.pos.y, -mapper.width/2, -mapper.height/2);
}

function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}

function mouseWheel(event) {
    if(event.delta < 0 && mapScale < 3) {
        mapScale *= 1.05;
	}
    else if(mapScale > 0.1) {
        mapScale *= 0.95;
	}
}

function mousePressed() {
	var m = createVector(mouseX, mouseY);
	clickOffset = p5.Vector.sub(client.pos, m);
	isDragging = true;
}

function mouseDragged(e) {
	if(isDragging) {
		let m = createVector(mouseX, mouseY);
		client.pos.set(m).add(clickOffset);
		console.log(client.pos);
	}
}

function mouseReleased() {
	isDragging = false;
}