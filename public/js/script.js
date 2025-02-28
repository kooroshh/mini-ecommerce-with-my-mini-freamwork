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

    navBtn.addEventListener("click", openNav);
    navBtn2.addEventListener("click", closeNav);

    window.addEventListener("resize", ()=>{
        
        if(window.innerWidth >= 768)
            closeNav();
        

    });

});