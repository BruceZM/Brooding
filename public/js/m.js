function fontSize() {
    var _html=document.getElementsByTagName('html')[0];
    var w = document.documentElement.clientWidth;
    if(w>750){
        _html.style.fontSize="100px";
    }else{
        _html.style.fontSize=w/7.5+"px";
    }
}
window.onresize = fontSize;
fontSize();