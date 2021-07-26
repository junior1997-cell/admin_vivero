
//document.getElementById("vidadigital").src ='.../images/upeu/begoña rastreras.png';
	// El selector deseado
var brandImg = document.querySelectorAll("#imagenesP img");

for (var i = 0; i < brandImg.length; i++) {
    var ckEdiloop = brandImg[i];
    ckEdiloop.addEventListener("click", function(el){
        var thisSrc = this.src;
        var srcall = thisSrc.substring(0,100);
       //alert(srcall);
        document.getElementById("vidadigital").src =srcall;
        
    });
}
