//Modal thong tin ca nhan
let modal = document.querySelector(".modal");
let modalU = document.querySelector(".modal-info-user");
let btn_info = document.querySelectorAll(".btn-info");
let modalContainer1 = document.querySelector(".ct-1");
let modalContainer2 = document.querySelector(".ct-2");
let buttonLeave1 = document.querySelectorAll(".button-leave");
let buttonLeave2 = document.querySelectorAll("#X");
btn_info.forEach((e) => {
    e.addEventListener("click", function () {
        modalU.classList.add("open");
    });
});

//Modal thong tin dang nhap

let modalL = document.querySelector(".modal-login-user");
let btn_login = document.querySelector(".btn-login");
btn_login.addEventListener("click", function () {
    modalL.classList.add("open");
});

//Modal mật khẩu
let modalP = document.querySelector(".modal-pw-user");
let buttonchangePw = document.querySelector(".change-pw");
buttonchangePw.addEventListener("click", function () {
    modalL.classList.remove("open");
    modalP.classList.add("open");
});

// Exit modal
buttonLeave1.forEach((element) => {
    element.addEventListener("click", function () {
        modalU.classList.remove("open");
        modalL.classList.remove("open");
        modalP.classList.remove("open");
    });
});
buttonLeave2.forEach((element) => {
    element.addEventListener("click", function () {
        modalU.classList.remove("open");
        modalL.classList.remove("open");
        modalP.classList.remove("open");
    });
});

document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        modalU.classList.remove("open");
        modalL.classList.remove("open");
        modalP.classList.remove("open");
    }
});
