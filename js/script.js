const inputColumn = document.querySelectorAll(".column input");

inputColumn.forEach((e) => {
  if (e.value == "") {
    e.classList.remove("inputShadow");
    e.nextElementSibling.classList.remove("labelClick");
  } else {
    e.classList.add("inputShadow");
    e.nextElementSibling.classList.add("labelClick");
  }
  e.addEventListener("input", () => {
    if (e.value == "") {
      e.classList.remove("inputShadow");
      e.nextElementSibling.classList.remove("labelClick");
    } else {
      e.classList.add("inputShadow");
      e.nextElementSibling.classList.add("labelClick");
    }
  });
});

//Permet d'avoir la case se souvenir de soi cocher lorsque que le cookie checked existe
function getCookie(cName) {
  const name = cName;
  const cDecoded = decodeURIComponent(document.cookie);
  const cArr = cDecoded.split("; ");
  const checkbox = document.getElementById("condition");
  let res;
  cArr.forEach((val) => {
    if (val.startsWith(name)) res = val.substring(name.length);
  });
  if (res) {
    checkbox.checked = true;
  }
}

getCookie("checked");

const formLogin = document.querySelector(".login");
const knowPassword = document.querySelector("#knowPassword");
const labelShowPassword = document.querySelector(".knowPassword");
const array = [knowPassword, labelShowPassword];
const groupShowPassword = document.querySelector(".showPassword");
const showPassword = document.createElement("p");
showPassword.classList.add("passwordValue");
const inputPassword = document.querySelector("#password");
if (formLogin) {
  array.forEach((e) => {
    e.addEventListener("click", () => {
      if (e.checked == false) {
        showPassword.remove();
      } else {
        groupShowPassword.appendChild(showPassword);
        showPassword.innerHTML = inputPassword.value;

        inputPassword.addEventListener("input", () => {
          showPassword.innerHTML = inputPassword.value;
        });
      }
    });
  });
}

const allIcons = document.querySelectorAll(".icons i");

allIcons.forEach((e) => {
  e.addEventListener("click", () => {
    e.classList.toggle("iconSelected");
  });
});

const titleAside = document.querySelector(".titleAside");
const titleExample = document.querySelector("#title");

titleExample.addEventListener("input", () => {
  titleAside.textContent = titleExample.value;
  if (titleExample.value == "") {
    titleAside.textContent = "example note";
  }
})

const description = document.querySelector(".description");
const paragraphAside = document.querySelector(".paragraphAside");

description.addEventListener("input", () => {
  paragraphAside.textContent = description.value;
  if (description.value == "") {
    paragraphAside.textContent = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime perferendis nostrum culpa ex perspiciatis provident, illum nemo harum qui animi commodi, magni eum. Optio, soluta perspiciatis et deserunt praesentium ullam!";
  }
})
