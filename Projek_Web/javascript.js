
var element= document.body

function ubahwarna(){
    
    element.classList.toggle("Dark");
    if(element.classList.contains('Dark')){
        localStorage.setItem('tema','Dark');
    } else{
        localStorage.setItem('tema','Light');
    }
}

var tema = localStorage.getItem("tema")
if (tema=='Dark'){
    element.classList.add("Dark");
}

