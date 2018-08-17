
var mapScale = 1;
var dragScale = 1;
var mapper = [];
var client = {};
var gps = false;
var markers = [];
var groups = [];

var isDragging = false;

function setup() {
    if(document.getElementById('map-holder')) {
    	var size = document.getElementById('map-holder').offsetWidth;
        var canvas = createCanvas(size, size);
        canvas.parent('map-holder');
        client.pos = createVector(document.getElementById('x').value,document.getElementById('y').value);
        $(document).trigger('map-init');
        gps = true;
	} else {
        var canvas = createCanvas(window.innerWidth, window.innerHeight);
        client.pos = createVector(0,0);
	}
   	for(tiles=0; tiles < 16; tiles++) {
   		mapper[tiles] = loadImage("assets/textures/map-texture_"+tiles+".jpg");
	}

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
				(client.pos.x + (512 * (tiles%4))) ,
				(client.pos.y + (512 * y)),
				mapper[tiles].width/2,
				mapper[tiles].height/2
		);
    }
    for(mark=0; mark < markers.length; mark++) {
    	if(groups[markers[mark].group]['view']==true)
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
    if(!document.getElementById('map-holder')) {
        resizeCanvas(windowWidth, windowHeight);
    }
}

function mouseWheel(event) {
    if(event.delta < 0 && mapScale < 3) {
        mapScale *= 1.05;
        dragScale *= 0.95;
	}
    else if(mapScale > 0.1) {
        mapScale *= 0.95;
        dragScale *= 1.05;
	}
}

function mousePressed() {
    let m = createVector(Math.trunc(mouseX*dragScale), Math.trunc(mouseY*dragScale));
	clickOffset = p5.Vector.sub(client.pos, m);
    $(document).trigger('map-move');
	isDragging = true;
}

function mouseDragged() {
	if(isDragging) {
		let m = createVector(Math.trunc(mouseX*dragScale), Math.trunc(mouseY*dragScale));
		client.pos.set(m).add(clickOffset);
        $(document).trigger('map-move');
	}
}

function mouseReleased() {
	isDragging = false;
}

$(document).on('ready',function(){

    $.ajax({
        dataType: "json",
        url: './ajax.php?type=groups',
        data: '',
        success: function(data) {
            $.each( data, function( key, val ) {
            	//console.log(val);
                groups[val.name] = [];
                groups[val.name]['name'] = val.name;
                groups[val.name]['description'] = val.description;
                groups[val.name]['color'] = val.color;
                groups[val.name]['view'] = true;
                $('#groups .content').append('<div class="group"><label class="name" style="background-color: '+val.color+';"><input type="checkbox" name="'+val.name+'" checked>'+val.name+'</label> <span class="description">'+val.description+'</span></div>');

            });
            //markers[key] = new Marker(val.x, val.y, val.id_group);
            $.ajax({
                dataType: "json",
                url: './ajax.php',
                data: '',
                success: function(data) {
                    $.each( data, function( key, val ) {
                        markers[key] = new Marker(parseInt(val.x * -1), parseInt(val.y * -1), val.id_group);
                    });
                },
                error: function(data) {
                    alert('Error : loading markers failed');
                }
            });
		},
		error: function(data) {
        	alert('Error : loading groups failed');
		}
    });

    /*$.ajax({
        url: './data/markers.xml',
        dataType: 'xml',
        success: function(data){
            // Extract relevant data from XML
            var xml_node = $('markers marker',data);
            xml_node.each(function(node){
                markers[node] = new Marker(parseInt($('markers marker x',data).eq(node).text()),parseInt($('markers marker y',data).eq(node).text()),$('markers marker group',data).eq(node).text());
            });
        },
        error: function(data,a,b){
            alert('Error : loading markers.xml failed');
        }
    });
    $.ajax({
        url: './data/groups.xml',
        dataType: 'xml',
        success: function(data){
            // Extract relevant data from XML
            var xml_node = $('groups group',data);
            xml_node.each(function(node){
            	var name = $('groups group name',data).eq(node).text();
            	var description = $('groups group description',data).eq(node).text();
            	var color = $('groups group color',data).eq(node).text();
            	$('#groups .content').append('<div class="group"><label class="name" style="background-color: '+color+';"><input type="checkbox" name="'+name+'" checked>'+name+'</label> <span class="description">'+description+'</span></div>');
            	groups[name] = [];
            	groups[name]['name'] = name;
            	groups[name]['description'] = description;
            	groups[name]['description'] = color;
            	groups[name]['view'] = true;
                //markers[node] = new Marker(parseInt($('markers marker x',data).eq(node).text()),parseInt($('markers marker y',data).eq(node).text()));
			});
        },
        error: function(data,a,b){
            alert('Error : loading groups.xml failed');
        }
    });*/

    $('#groups .toggle').on('click',function(){
    	$(this).parent().toggleClass('active').find('.content').stop(true).toggle();
	});

	$(document).on('click','.group input',function(){
		var groupCible = $(this).attr('name');
		if(groups[groupCible]['view']) {
			groups[groupCible]['view'] = false;
		} else {
			groups[groupCible]['view'] = true;
		}
	});

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