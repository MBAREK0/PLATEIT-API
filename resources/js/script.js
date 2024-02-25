// dark mode --------------------------------------------------------------------
// Get mode btn
var modeBtn         = document.getElementById("mode");
var container       = document.getElementById("mymain");
var createArticle   = document.getElementById('c-article');
var sidebar         = document.getElementsByClassName('sidebar');
var rootElement     = document.documentElement;

console.log(sidebar);


// Toggle a class on the sections
function getmode() {
  document.body.classList.toggle("dark-body"); 
  container.classList.toggle("dark-body"); 
  createArticle.classList.toggle("dark-create-article");
  sidebar[0].classList.toggle("dark-sidebar");
  sidebar[1].classList.toggle("dark-sidebar");
  rootElement.classList.toggle("dark-body");
}

modeBtn.addEventListener("click", getmode);
// -------------------------------------------------------------------------------