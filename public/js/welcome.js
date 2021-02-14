
//-------------------LOGIN--------------------------


const body = document.querySelector("body");
const modal = document.querySelector(".modal");
const modalRegistro = document.querySelector("#modal-registro");
const modalButtonLogin = document.querySelector("#btn-login");
const modalButtonRegistro = document.querySelector("#btn-registro");
const modalButtonRegistroLogin = document.querySelector("#btn-registro-login");


const closeButtonLogin = document.querySelector(".close-button");
const closeButtonRegistro = document.querySelector("#model-close");
const scrollDown = document.querySelector(".scroll-down");
let isOpened = false;


//-------------------MODAL DE LOGIN --------------------------
const openModal = () => {
// or window.location(url);
  modal.classList.add("is-open");
  body.style.overflow = "hidden";
};

const closeModal = () => {
  modal.classList.remove("is-open");
  body.style.overflow = "initial";
};

//-------------------MODAL DE REGISTRO --------------------------

const openModalRegistro = () => {
  var temp = 'register';
  url = "http://127.0.0.1:8000/" + temp;
  modalRegistro.classList.add("is-open");
  body.style.overflow = "hidden";
};

const closeModalRegistro = () => {
  modalRegistro.classList.remove("is-open");
  body.style.overflow = "initial";
};


window.addEventListener("scroll", () => {
  if (window.scrollY > window.innerHeight / 3 && !isOpened) {
    isOpened = true;
    scrollDown.style.display = "none";
    openModal();
  }
});

modalButtonLogin.addEventListener("click", openModal);
closeButtonLogin.addEventListener("click", closeModal);
modalButtonRegistro.addEventListener("click", openModalRegistro);
closeButtonRegistro.addEventListener("click", closeModalRegistro);

modalButtonRegistroLogin.addEventListener("click",  () => {
  closeModal()
  openModalRegistro()
  

}); 

document.onkeydown = evt => {
  evt = evt || window.event;
  evt.keyCode === 27 ? closeModal() : false;
};

