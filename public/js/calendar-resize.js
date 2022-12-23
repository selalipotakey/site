var w = window.innerWidth;
if (w < 1200) {
    $('#month-calendar').hide();
    $('#agenda-calendar').show();
} else {
    $('#month-calendar').show();
    $('#agenda-calendar').hide();
}

window.addEventListener("resize", (event) => {});

onresize = (event) => {
    var w = window.innerWidth;
    if (w < 1200) {
        $('#month-calendar').hide();
        $('#agenda-calendar').show();
    } else {
        $('#month-calendar').show();
        $('#agenda-calendar').hide();
    }
};
