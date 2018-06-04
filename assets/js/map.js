

$(document).on('ready', function () {

	$("#map img").draggable();
	var map = $("#map img");
	var mapDecalage = $("#map #map-decallage");
	var decalageZoom = 150;

	// fonction du zoom
	$('#map').bind('mousewheel', function (e) {

		var x = mappingValue(e.pageX,0,$(document).width(),decalageZoom/2,-decalageZoom/2);
		var y = mappingValue(e.pageY,0,$(document).height(),decalageZoom/2,-decalageZoom/2);

		console.log(x);


		// zoomIn
		if (e.originalEvent.wheelDelta / 120 > 0) {
			mapZoom(true);
			mapDecalage.css('margin-left', parseInt(mapDecalage.css('margin-left')) + x);
			mapDecalage.css('margin-top', parseInt(mapDecalage.css('margin-top')) + y);
		}
		// zoomOut
		else {
			mapZoom(false);
			mapDecalage.css('margin-left', parseInt(mapDecalage.css('margin-left')) + x);
			mapDecalage.css('margin-top', parseInt(mapDecalage.css('margin-top')) + y);
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
			return constrain(newval, start2, stop2);
		} else {
			return constrain(newval, stop2, start2);
		}
	}

	function constrain (n, low, high) {
		return Math.max(Math.min(n, high), low);
	}

});