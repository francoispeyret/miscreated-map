
var mapScale = 1;
var client = {};
	client.x = 0;
	client.y = 0;
var x = 0;
var y = 0;
function setup() {
   	createCanvas(window.innerWidth, window.innerHeight);
    mapper = loadImage("assets/textures/map-texture.jpg");
}

function draw() {
    background(30);
	translate(width/2+client.x,height/2+client.y);
	scale(mapScale);
    image(mapper, -mapper.width/2, -mapper.height/2);
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

function mouseDragged(e) {
	print(e);
    client.x += e.clientX;
    client.y += e.clientY;
}