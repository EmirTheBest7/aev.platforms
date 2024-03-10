var MarkerAnnotation = mapkit.MarkerAnnotation, clickAnnotation;
var work = new mapkit.Coordinate(50.0751, 14.4565);

mapkit.init({
    authorizationCallback: function (done) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/services/jwt");
        xhr.addEventListener("load", function () {
            done(this.responseText);
        });
        xhr.send();
    }
});

let map = new mapkit.Map("map", {
    mapType: mapkit.Map.MapTypes.Hybrid,
    colorScheme: mapkit.Map.ColorSchemes.Dark
});

// Setting properties after creation:
var workAnnotation = new MarkerAnnotation(work);
workAnnotation.color = "#969696";
workAnnotation.title = "Office";
workAnnotation.subtitle = "ΛΞV | Digital studio.";
workAnnotation.selected = "true";
workAnnotation.glyphText = "ΛΞV";

// Add and show both annotations on the map
map.showItems([workAnnotation]);

// Drop an annotation where a Shift-click is detected:
map.element.addEventListener("click", function (event) {
    if (!event.shiftKey) {
        return;
    }

    if (clickAnnotation) {
        map.removeAnnotation(clickAnnotation);
    }

    var coordinate = map.convertPointOnPageToCoordinate(new DOMPoint(event.pageX, event.pageY));
    clickAnnotation = new MarkerAnnotation(coordinate, {
        title: "Click!",
        color: "#c969e0"
    });
    map.addAnnotation(clickAnnotation);
});