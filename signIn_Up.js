let heading = document.querySelector("h1");
let confirmPassword = document.querySelector(".cpassword");
let content1 = document.querySelector(".content1");

let login = document.getElementById("login");
let signup = document.getElementById("signup");
login.addEventListener("click",()=>{
    document.querySelector(".signUp").classList.toggle("active");
    document.querySelector(".signIn").classList.toggle("active");
    document.querySelector(".container").classList.toggle("active");
    document.querySelector(".content1").classList.toggle("active");
});
signup.addEventListener("click",()=>{
    document.querySelector(".signUp").classList.toggle("active");
    document.querySelector(".signIn").classList.toggle("active");
    document.querySelector(".container").classList.toggle("active");
    document.querySelector(".content1").classList.toggle("active");
});
