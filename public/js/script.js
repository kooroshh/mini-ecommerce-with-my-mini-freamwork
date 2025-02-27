document.addEventListener("DOMContentLoaded", ()=>{

    let navBtn = document.getElementById("nav-btn");
    let navBtn2 = document.getElementById("nav-btn2");
    let nav = document.getElementById("nav");
    let body = document.querySelector("body");
    let navLinks = document.getElementById("nav-links");
    let navItems = document.getElementById("nav-items");

    function openNav()
    {
        nav.classList.remove("hidden");
        nav.classList.add("absolute", "h-screen");
        body.classList.add("overflow-hidden");
        navItems.classList.remove("hidden");
    }

    function closeNav()
    {
        nav.classList.add("hidden");
        nav.classList.remove("absolute", "h-screen");
        body.classList.remove("overflow-hidden");
        navItems.classList.add("hidden");
    }

    navBtn.addEventListener("click", openNav);
    navBtn2.addEventListener("click", closeNav);

    window.addEventListener("resize", ()=>{
        
        if(window.innerWidth >= 768)
            closeNav();
        

    });

});