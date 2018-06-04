

$(document).on('ready', function () {

	$("#map img").draggable();
	var map = $("#map img");
	var mapDecalage = $("#map #map-decallage");
	var decalageZoom = 150;

	// fonction du zoom
	$('#map').bind('mousewheel', function (e) {
		var x = e.pageX;
		var y = e.pageY;

		x = mappingValue(x,0,$(window).width(),decalageZoom/2,-decalageZoom/2);
		y = mappingValue(y,0,$(window).height(),decalageZoom/2,-decalageZoom/2);


		// zoomIn
		if (e.originalEvent.wheelDelta / 120 > 0) {
			mapZoom(true);
			mapDecalage.css('margin-left', parseInt(mapDecalage.css('margin-left')) - decalageZoom/2 + x);
			mapDecalage.css('margin-top', parseInt(mapDecalage.css('margin-top')) - decalageZoom/2 + y);
		}
		// zoomOut
		else {
			mapZoom(false);
			mapDecalage.css('margin-left', parseInt(mapDecalage.css('margin-left')) + decalageZoom/2 + x);
			mapDecalage.css('margin-top', parseInt(mapDecalage.css('margin-top')) + decalageZoom/2 + y);
		}
	});

	function mapZoom(direction) {
		if(direction == true) {
			map.width(map.width()+decalageZoom);
			map.height(map.height()+decalageZoom);
		}
		if(direction == false) {
			map.width(map.width()-decalageZoom);
			map.height(map.height()-decalageZoom);
		}
	}

	function mappingValue(n, start1, stop1, start2, stop2, withinBounds) {
		var newval = (n - start1) / (stop1 - start1) * (stop2 - start2) + start2;
		if (!withinBounds) {
			return newval;
		}
		if (start2 < stop2) {
			return this.constrain(newval, start2, stop2);
		} else {
			return this.constrain(newval, stop2, start2);
		}
	}

});