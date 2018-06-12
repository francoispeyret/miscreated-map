
var mapScale = 1;
var mapper = [];
var client = {};
var gps = true;
var markers = [];
var makerImgWhite;

var isDragging = false;

function setup() {
   	createCanvas(window.innerWidth, window.innerHeight);
   	for(tiles=0; tiles < 16; tiles++) {
   		mapper[tiles] = loadImage("assets/textures/map-texture_"+tiles+".jpg");
	}
	makerImgWhite = loadImage("assets/textures/marker-white.png");

    client.pos = createVector(0,0);

   	markers[0] = new Marker(100,100,'blue');
}

function draw() {
    background(30);
	translate(width/2,height/2);
	push();
	scale(mapScale);
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
    for(mark=0; mark < markers.length; mark++) {
    	markers[mark].display();
	}
    pop();
    if(gps==true) {
    	strokeWeight(1);
        stroke(0,255,255);
        //noFill();
        //rect(-15,-15,30,30);
        fill(0,255,255);
        text(client.pos.x,-width/2+10,height/2-40);
        text(client.pos.y,-width/2+10,height/2-28);
        line(0,-height/2,0,height/2);
        line(-width/2,0,width/2,0);
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

$(document).on('ready',function(){
	$('.zoom .minus').on('click',function(){
		mapScale *= 0.9;
	});
	$('.zoom .plus').on('click',function(){
		mapScale *= 1.1;
	});
	$('.gps').on('click',function(){
		if(gps) gps = false;
		else gps = true;
	});
});