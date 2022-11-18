

$(window).scroll(function(){

    if($(window).scrollTop() > 230){
        boxes();
     
      }
  
  });
  

  



  function boxes(){
  
    /* let id = null; */
    let id = 0;
    const elem = document.getElementById("box1");
    let x = 0;
    clearInterval(id);
    id = setInterval(frame, 1);
    function frame() {
      if (x == 1050) {
        clearInterval(id);
      } else {
        x++; 
        /* elem.style.top = pos + "px";  */ 
        elem.style.left = x + "px"; 
      }
    }
  };


