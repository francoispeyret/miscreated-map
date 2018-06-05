
var mapScale = 1;
var mapper = [];
var client = {};

var isDragging = false;

function setup() {
   	createCanvas(window.innerWidth, window.innerHeight);
   	for(tiles=0; tiles < 16; tiles++) {
   		mapper[tiles] = loadImage("assets/textures/map-texture_"+tiles+".jpg");
	}

    client.pos = createVector(0,0);
}

function draw() {
    background(30);
	translate(width/2,height/2);
	scale(mapScale);

    //image(mapper, client.pos.x, client.pos.y, -mapper.width/2, -mapper.height/2);
	var y = -1;
    for(tiles=0; tiles < 16; tiles++) {
    	if(tiles%4==0)
    		y++;
        image(mapper[tiles],
				client.pos.x + (512 * (tiles%4)),
				client.pos.y+ (512 * y),
				mapper[tiles].width/2,
				mapper[tiles].height/2
		);
    }
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
	}
}

function mouseReleased() {
	isDragging = false;
}