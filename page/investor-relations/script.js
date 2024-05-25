window.onload = function() {
    var heart = document.getElementsByClassName("heart");
    var classname = document.getElementsByClassName("tabitem");
    var boxitem = document.getElementsByClassName("box");

    var clickFunction = function(e) {
        e.preventDefault();
        var a = this.getElementsByTagName("a")[0];
        var span = this.getElementsByTagName("span")[0];
        var href = a.getAttribute("href").replace("#","");
        for(var i=0;i<boxitem.length;i++){
            boxitem[i].className =  boxitem[i].className.replace(/(?:^|\s)show(?!\S)/g, '');
        }
        document.getElementById(href).className += " show";
        for(var i=0;i<classname.length;i++){
            classname[i].className =  classname[i].className.replace(/(?:^|\s)active(?!\S)/g, '');
        }
        this.className += " active";
        span.className += 'active';
        var left = a.getBoundingClientRect().left;
        var top = a.getBoundingClientRect().top;
        var consx = (e.clientX - left);
        var consy = (e.clientY - top);
        span.style.top = consy+"px";
        span.style.left = consx+"px";
        span.className = 'clicked';
        span.addEventListener('webkitAnimationEnd', function(event){
            this.className = '';
        }, false);  
    };

    for(var i=0;i<classname.length;i++){
        classname[i].addEventListener('click', clickFunction, false);
    }
    for(var i=0;i<heart.length;i++){
        heart[i].addEventListener('click', function(e) {
            var classString = this.className, nameIndex = classString.indexOf("active");
            if (nameIndex == -1) {
                classString += ' ' + "active";
            }
            else {
                classString = classString.substr(0, nameIndex) + classString.substr(nameIndex+"active".length);
            }
            this.className = classString;

        }, false);
    }
}

//Particles

particlesJS("particles-js", {
    "particles":{
      "number":{
        "value":80,
        "density":{
          "enable":true,"value_area":800
        }
      },
      "color":
      {"value":"#ffffff"},
      "shape":{
        "type":"circle",
        "stroke":{
          "width":0,"color":"#000000"},
        "polygon":{
          "nb_sides":5
        },
        "image":{
          "src":"img/github.svg",
          "width":100,"height":100
        }
      },
      "opacity":{
        "value":0.5,
        "random":false,
        "anim":{
          "enable":false,
          "speed":1,
          "opacity_min":0.1,
          "sync":false
        }
      },
      "size":{
        "value":3,
        "random":true,
        "anim":{
          "enable":false,
          "speed":40,
          "size_min":0.1,
          "sync":false
        }
      },
      "line_linked":{
        "enable":true,
        "distance":150,
        "color":"#ffffff",
        "opacity":0.4,
        "width":1},
      "move":{
        "enable":true,
        "speed":2,
        "direction":"none",
        "random":false,
        "straight":false,
        "out_mode":"out",
        "bounce":false,
        "attract":{
          "enable":false,
          "rotateX":600,
          "rotateY":1200
        }
      }
    },
    "interactivity":{
      "detect_on":"canvas",
      "events":{
        "onhover":{
          "enable":false,
          "mode":"repulse"
        },
        "onclick":{
          "enable":true,
          "mode":"push"
        },
        "resize":true
      },
      "modes":{
        "grab":{
          "distance":400,
          "line_linked":{
            "opacity":1
          }
        },
        "bubble":{
          "distance":400,
          "size":40,
          "duration":2,
          "opacity":8,
          "speed":3
        },
        "repulse":{
          "distance":200,
          "duration":0.4},
        "push":{
          "particles_nb":4
        },
        "remove":{
          "particles_nb":2
        }
      }
    },
    "retina_detect":true
  });
  var 
  count_particles, stats, update; 
  stats = new Stats; 
  stats.setMode(0); 
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() { stats.begin();
                       stats.end(); 
                       if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                         count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; 
                       } 
                       requestAnimationFrame(update); 
                      }; 
  requestAnimationFrame(update);
  ;