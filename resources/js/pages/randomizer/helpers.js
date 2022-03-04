CanvasRenderingContext2D.prototype.fillTextCircle = function(text,x,y,radius,startRotation){
    this.save();
    this.translate(x,y);
    this.rotate(startRotation);
 
    for(var i=0; i < text.length; i++) {
        var rot = ctx.measureText(text[i]).width / (Math.PI * radius * 2) * Math.PI*2;
        this.fillText(text[i],0, -radius);
        this.rotate(rot);
        radius += 0.5;
    }
    this.restore();
}