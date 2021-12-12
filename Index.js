let navitem = document.querySelector(".navigation");
let nav = document.querySelector("nav");
let ham = document.querySelector(".hamburger");
console.log(navitem.classList);
ham.addEventListener("click",()=>{

    ham.classList.toggle("active");

    const nav = document.querySelector("nav");
    nav.classList.toggle("open");
    

})
