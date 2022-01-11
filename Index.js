<<<<<<< HEAD
let navitem = document.querySelector(".navigation");
let nav = document.querySelector("nav");
let ham = document.querySelector(".hamburger");
console.log(navitem.classList);
ham.addEventListener("click",()=>{
    ham.classList.toggle("active");

    const nav = document.querySelector("nav");
    nav.classList.toggle("open");
    if(nav.classList.contains("open"))
    {
        nav.style.maxHeight = nav.scrollHeight + "px";
    }
    else{
        nav.removeAttribute("style");
    }

})
=======
let navitem = document.querySelector(".navigation");
let nav = document.querySelector("nav");
let ham = document.querySelector(".hamburger");
console.log(navitem.classList);
ham.addEventListener("click",()=>{

    ham.classList.toggle("active");

    const nav = document.querySelector("nav");
    nav.classList.toggle("open");
    
})
>>>>>>> 94a052e215f0c6e59b5ae27d186cfe1c71498137
