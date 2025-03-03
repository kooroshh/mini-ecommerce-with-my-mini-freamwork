document.addEventListener("DOMContentLoaded", ()=>{

    function menuRemove(){

        if(window.innerWidth < 1024){
            document.getElementById("menu").classList.remove("translate-x-0"); 
            document.getElementById("menu").classList.add("-translate-x-full");
            document.getElementById("navbar").classList.add("flex");
            document.getElementById("navbar").classList.remove("hidden");
        }

    }

    function menuOpen(){
        document.getElementById("menu").classList.remove("-translate-x-full");
        document.getElementById("menu").classList.add("translate-x-0"); 
        document.getElementById("navbar").classList.remove("flex");
        document.getElementById("navbar").classList.add("hidden");

    }

    window.addEventListener("resize", ()=>{
        if(window.innerWidth >= 1024){
            document.getElementById("navbar").classList.add("flex");
            document.getElementById("navbar").classList.remove("hidden");
            menuRemove();
        }else{
            menuRemove();
        }
    });

    document.getElementById("menuToggler").addEventListener("click",menuOpen);
    document.getElementById("menuToggler2").addEventListener("click",menuRemove);
    

});