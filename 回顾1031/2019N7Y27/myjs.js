function $Id(id){
    return document.getElementById(id);
}
function getStyle(obj,attr){
    return obj.currentStyle ? obj.currentStyle[attr] : getComputedStyle(obj)[attr]; 
}
function doMove(obj,step,end,attr,endF){
    step = parseFloat(getStyle(obj,attr))>end ? -step : step;
    clearInterval(obj.timer);
    obj.timer = setInterval(function (){
        var next = parseFloat(getStyle(obj,attr))+step;
        next = step>0 ? Math.min(next,end) : Math.max(next,end);
        obj.style[attr] = attr=="opacity" ? next : next+"px";
        if(parseFloat(getStyle(obj,attr))==end){
            clearInterval(obj.timer);
            endF && endF();  //回调函数
            }
        }
    },30);
}