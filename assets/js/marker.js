Marker = function(x,y,type) {
    this.x = x;
    this.y = y;
    this.type = type;

    this.display = function() {
        fill(255,0,0);
        noStroke();
        image(makerImgWhite, client.pos.x + this.x - 25, client.pos.y + this.y - 40);
    }

    this.update = function () {

    }
}