document.addEventListener("DOMContentLoaded", ()=>{

    let navBtn = document.getElementById("nav-btn");
    let navBtn2 = document.getElementById("nav-btn2");
    let nav = document.getElementById("nav");
    let navItems = document.getElementById("nav-items");

    function openNav()
    {
        nav.classList.remove("hidden");
        nav.classList.add("fixed", "h-screen");
        navItems.classList.remove("hidden");
    }

    function closeNav()
    {
        nav.classList.add("hidden");
        nav.classList.remove("fixed", "h-screen");
        navItems.classList.add("hidden");
    }

    if(nav)
    {
        navBtn.addEventListener("click", openNav);
        navBtn2.addEventListener("click", closeNav);
        
        window.addEventListener("resize", ()=>{
            
            if(window.innerWidth >= 768)
                closeNav();
            

        });
    }


    let menu = document.getElementById("menu");

    function menuRemove(){

        if(window.innerWidth < 1024){
            menu.classList.remove("translate-x-0"); 
            menu.classList.add("-translate-x-full");
            document.getElementById("navbar").classList.add("flex");
            document.getElementById("navbar").classList.remove("hidden");
        }

    }

    function menuOpen(){
        menu.classList.remove("-translate-x-full");
        menu.classList.add("translate-x-0"); 
        document.getElementById("navbar").classList.remove("flex");
        document.getElementById("navbar").classList.add("hidden");

    }

    if(menu)
    {
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
    }

    


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

    let checker = document.querySelectorAll(".checker");
    if(checker)
    {
        checker.forEach(input => {
            input.addEventListener("click", checkAndChangeColor);
        });
    }

    let image = document.getElementById("image");

    if(image)
    {
        image.addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) 
            {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('objectImage');
                    img.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });        
    }


    let addCommentBtn = document.getElementById('addComment');
    let addCommentElement = document.getElementById('add-comment');
    let comments = document.getElementById("comments");
    let commentsBtn = document.getElementById("commentsBtn");

    function changeCommentMethod()
    {
        addCommentElement.classList.remove('hidden');
        comments.classList.add('hidden');
        commentsBtn.classList.remove("text-indigo-600","border-b-2", "border-indigo-600");
        commentsBtn.classList.add("text-gray-700");
        addCommentBtn.classList.remove("text-gray-700");
        addCommentBtn.classList.add("text-indigo-600","border-b-2", "border-indigo-600");
    }

    if(addCommentBtn)
    {
        addCommentBtn.addEventListener('click', changeCommentMethod);
    }



});