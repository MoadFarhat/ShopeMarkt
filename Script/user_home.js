const sideMenu=document.querySelector("aside");
const menuBtn=document.querySelector("#menu-btn");
const closeBtn=document.querySelector("#close-btn");
const themeToggler =document.querySelector(".theme-toggler");
//show sidbar
menuBtn.addEventListener('click',()=>{
    sideMenu.style.display='block';
});
// close sidbar
closeBtn.addEventListener('click',()=>{
    sideMenu.style.display='none';
})
// chang mode
themeToggler.addEventListener('click',()=>{
  
    document.body.classList.toggle('dark-theme-variables');
    
   
})