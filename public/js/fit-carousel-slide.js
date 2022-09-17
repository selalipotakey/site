window.onload = function() {

    var fittext_list = document.querySelectorAll('.fittext');
    var fittext_array = [...fittext_list];
    fittext_array.forEach(fittext => {
        var x = fittext.offsetWidth;
        var y = fittext.offsetHeight;
        var html = fittext.innerHTML;
        var len = html.length; 
        var factor1 = 1.15;

        var sc = Math.sqrt(((x*y)/(len)))*factor1;
            
        if (sc >= y) {
            fittext.style.fontSize = y*0.9 + "px";
        }
        else{
            fittext.style.fontSize = sc + "px";
        }
        fittext.style.visibility = 'visible';
    });
        
};