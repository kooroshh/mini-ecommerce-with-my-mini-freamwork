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
    


    function checkAndChangeColor(event) {
        let input = event.target;
        let parent = input.parentElement;

        if (input.checked) {
            parent.classList.remove("border");
            parent.classList.add("bg-gray-200");
            
        } else {
            parent.classList.add("border");
            parent.classList.remove("bg-gray-200");
        }
    }

    document.querySelectorAll(".checker").forEach(input => {
        input.addEventListener("click", checkAndChangeColor);
    });

    document.getElementById("image").addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) 
        {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('productImage');
                img.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

});