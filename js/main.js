
const navItems=document.querySelector('.nav-items');
const openNavbtn=document.querySelector('#open-nav-btn');
const closeNavbtn=document.querySelector('#close-nav-btn');

const openNav=()=>{
    navItems.style.display='flex';
    openNavbtn.style.display='none';
    closeNavbtn.style.display='inline-block';
}

const closeNav=()=>{
    navItems.style.display='none';
    openNavbtn.style.display='inline-block';
    closeNavbtn.style.display='none';
}

openNavbtn.addEventListener('click',openNav)
closeNavbtn.addEventListener('click',closeNav)
