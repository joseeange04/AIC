var canadamap = document.getElementById("mada-map"),
provinceInfo = document.getElementById("provinceInfo"),
allProvinces = canadamap.querySelectorAll("g");
canadamap.addEventListener("mouseover", function(e){ 
    var province = e.target.parentNode;
    if(e.target.nodeName == "path") {
    for (var i=0; i < allProvinces.length; i++) {
        allProvinces[i].classList.remove("active");
    }
    province.classList.add("active");
    var provinceName = province.querySelector("title").innerHTML,
    provincePara = province.querySelector("desc p");
    sourceImg = province.querySelector("img"),
    imgPath = "";
    provinceInfo.innerHTML = "";
    provinceInfo.insertAdjacentHTML("afterbegin", "<img src="+imgPath + sourceImg.getAttribute('xlink:href')+" alt='"+sourceImg.getAttribute('alt')+"'><h1>"+provinceName+"</h1><p>"+provincePara.innerHTML+"</p>");
    provinceInfo.classList.add("show");
    }
})
var map = new Vivus('mada-map', {
    type: 'async',
    duration: 100,
    start: 'autostart',
    forceRender: false
  }, function doDone(obj) {
    obj.el.classList.add('finished');
  });