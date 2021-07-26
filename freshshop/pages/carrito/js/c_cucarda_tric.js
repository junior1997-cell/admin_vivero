//-------------------cucardas tricolor------

document.getElementById("cucardat").src ='../images/upeu/cucarda tricolor.png';
    // El selector deseado
var brandImg = document.querySelectorAll("#cucardat_p img");

for (var i = 0; i < brandImg.length; i++) {
    var ckEdiloop = brandImg[i];
    ckEdiloop.addEventListener("click", function(el){
        var thisSrc = this.src;
        var srcall = thisSrc.substring(0,100);
       // alert(srcall);
        document.getElementById("cucardat").src =srcall;
        
    });
}