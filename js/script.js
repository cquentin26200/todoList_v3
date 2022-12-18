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