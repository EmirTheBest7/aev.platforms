DevExpress.viz.currentTheme("generic.light");
const weekday = ["Ne","Po","Út","St","Čt","Pá","So"];
const month_cz = ["Leden", "Únor", "Březen", "Duben", "Květen", "Červen", "Červenec", "Srpen", "Září", "Říjen", "Listopad", "Prosinec", "Suka"];

var pdf_btn = "<div onclick=\"getPDF()\" class=\"dx-item dx-tab\">PDF</div>";
var xlsx_btn = "<div onclick=\"getXLSX()\" class=\"dx-item dx-tab\">XLSX</div>";

//$('.dx-tabs-wrapper')[0].innerHTML;

$(function(){
    $("#scheduler").dxScheduler({

        dataSource: data,

        // Odstraneno 2 weeks view
        views: [{ name:"Month", type:"timelineMonth"}, /*{ name:"2 weeks", type: "timelineWeek", intervalCount: 2, cellDuration: 1440, firstDayOfWeek: 1}*/],
        currentView: "timelineMonth",
        currentDate: new Date(),
        //currentDate: new Date().setMonth(new Date().getMonth() + 1),
        editing: true,
        groups: ["ownerId"],

        textExpr: "title",
        adaptivityEnabled: true,

        showCurrentTimeIndicator: true,
        shadeUntilCurrentTime: true,
        onAppointmentClick: function(e) {e.cancel = true;},
        onAppointmentDblClick: function(e) {e.cancel = true;},
        dataCellTemplate: function(cellData, index, container) {
                if(isWeekEnd(cellData.startDate)) {
                    container.addClass("weekend-day");
                }  
                return $("<div>")
                        .addClass("day-cell")
                        .text(cellData.text);
            },
        dateCellTemplate: function(data) {
          return $("<p>" + data.date.getDate() + "</br>" +  weekday[data.date.getDay()]+ "</p>") // Zkus odebrat -1 month/mesic
        },
        appointmentTemplate: function(data, index, container) {
          container.addClass("cat-" + data.category);
          var icon = "";
          switch(data.category){
            
            case "R1":
                icon = "far fa-calendar-times";
                break;
            case "R2":
                icon = "far fa-calendar-times";
                break;
            case "M":
                icon = "far fa-calendar-times";
                break;
            case "O1":
                icon = "far fa-calendar-times";
                break;
            case "X":
                icon = "far fa-calendar-times";
                break;
            
            case 1:
              icon = "far fa-calendar-times";
              break;
            case 2:
              icon = "fas fa-minus-circle";
              break;
            case 3:
              icon = "fas fa-times-circle";
              break;
            default:
              //icon = "fas fa-question-circle";
              icon = "";
          }
          return $("<p>" + data.category + "</p>") // + data.text +
        },
        resources: [{
            fieldExpr: "ownerId",
            dataSource: resourcesData,
            label: "Owner"
        }]
    });
    $( ".dx-tabs-wrapper" ).append( pdf_btn );
    $( ".dx-tabs-wrapper" ).append( xlsx_btn );
    // Make one "Print" button just to print it directly

    $('.dx-tab-text').text("Prosinec");
    //$('.dx-tab-text').text(month_cz[data.date.getMonth()]);
});


function isWeekEnd(date) {
  var day = date.getDay();
  return day === 0 || day === 6;
}

//Create PDf from HTML...
function getPDF() {
    var HTML_Width = $(".dx-scheduler-timeline").width();
    var HTML_Height = $(".dx-scheduler-timeline").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".dx-scheduler-timeline")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/png", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'PNG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'PNG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Prosinec.pdf");
        //$(".dx-scheduler-timeline").hide();
    });
}

function getXLSX() {
    console.log("getXLSX");

}
