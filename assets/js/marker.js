Marker = function(x,y,group) {
    this.x = x;
    this.y = y;
    this.w = 25;
    this.group = group;
    this.color = groups[this.group].color;

    this.display = function() {
        console.log();
        fill(color(this.color));
        stroke(0,0,0,120);
        ellipse(client.pos.x + this.x, client.pos.y + this.y,this.w);
    },

    this.update = function () {

    }
};