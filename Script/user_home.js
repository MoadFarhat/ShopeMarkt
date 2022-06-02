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
let number=document.getElementById('numberprogresincom');
let counter=0;
setInterval(()=>{
    if(counter==65){
    clearInterval();
    }
    else{
counter++;
number.innerHTML=counter+"%";}
},30)
let number3=document.getElementById('numberprogresexpenses');
let counter3=0;
setInterval(()=>{
    if(counter3==43){
    clearInterval();
    }
    else{
counter3++;
number3.innerHTML=counter3+"%";}
},30)
let number2=document.getElementById('numberprogressales');
let counter2=0;
setInterval(()=>{
    if(counter2==19){
    clearInterval();
    }
    else{
counter2++;
number2.innerHTML=counter2+"%";}
},30)