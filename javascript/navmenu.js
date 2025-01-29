function myFunction(){
    var x = document.getElementById("firstnavmenu");
    if(x.className==="navmenu"){
        x.className+= "responsive";
    } else {
        x.className="navmenu";
    }
}
