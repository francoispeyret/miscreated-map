Marker = function(x,y,group) {
    this.x = x;
    this.y = y;
    this.w = 25;
    this.group = group;

    this.display = function() {
        fill(255,0,0);
        noStroke();
        ellipse(client.pos.x + this.x - 12.5, client.pos.y + this.y - 12.5,this.w);
    }

    this.update = function () {

    }
}