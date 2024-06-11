var showBtn = document.getElementById('menu-btn');
var showmenu = document.getElementById('menu');
 var closeBtn = document.getElementById('close-btn');

showBtn.addEventListener('click', showMenu);
function showMenu(){
   showmenu.style.display= "block";
   showBtn.style.display = "none";
};
closeBtn.addEventListener('click', closeMenu);
function closeMenu(){
   showmenu.style.display= "none";
   showBtn.style.display = "block";
};