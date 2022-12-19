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
allIcons[0].classList.add("iconSelected");
allIcons.forEach((e) => {
  e.addEventListener("click", () => {
    const changeIcon = document.querySelector(".changeIcon");
    const iconSelected = document.querySelector(".iconSelected");
    changeIcon.className = `changeIcon ${e.className}`;
    iconSelected.classList.remove("iconSelected");
    e.classList.add("iconSelected");
    if (!e.classList.contains("iconSelected")) {
      e.classList.add("iconSelected");
    }
  });
});

const titleAside = document.querySelector(".titleAside");
const titleExample = document.querySelector("#title");

titleExample.addEventListener("input", () => {
  titleAside.textContent = titleExample.value;
  if (titleExample.value == "") {
    titleAside.textContent = "example note";
  }
});

const description = document.querySelector(".description");
const paragraphAside = document.querySelector(".paragraphAside");

description.addEventListener("input", () => {
  paragraphAside.textContent = description.value;
  if (description.value == "") {
    paragraphAside.textContent =
      "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum debitis aut eum, quam eius sint consequuntur fuga sequi ducimus vel cumque perspiciatis, sit ratione accusantium recusandae dignissimos. Expedita, voluptatem veritatis?";
  }
});

const reset = document.querySelector(".reset");
const date = document.querySelector("#date");
const allInputReset = [description, titleExample];
const priority = document.querySelector("#priority");

reset.addEventListener("click", () => {
  const iconSelected = document.querySelector(".iconSelected");
  const allIcons = document.querySelectorAll(".icons i");
  iconSelected.classList.remove("iconSelected");
  allIcons[0].classList.add("iconSelected");
  date.value = "2022-01-01";
  allInputReset.forEach((e) => {
    e.value = "";
  });
  paragraphAside.textContent =
    "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum debitis aut eum, quam eius sint consequuntur fuga sequi ducimus vel cumque perspiciatis, sit ratione accusantium recusandae dignissimos. Expedita, voluptatem veritatis?";
  titleAside.textContent = "example note";
});

const activeMenuBurger = document.querySelector(".activeMenuBurger");
const menuBurger = document.querySelector(".menuBurger");

activeMenuBurger.addEventListener("click", () => {
  menuBurger.classList.toggle("none");
});

const allDifficulty = document.querySelector("#priority");
const changeIcon = document.querySelector(".changeIcon");
const userDateAfter = document.querySelector(".userDate .after");
const aside = document.querySelector("aside");
const userDateParagraphe = document.querySelectorAll(".userDate p i");

function changePriority(colorPrimary) {
  userDateParagraphe.forEach((e) => {
    if (allDifficulty[allDifficulty.selectedIndex].classList.value != "1") {
      e.style.color = "#131313";
    } else {
      e.style.color = "#87baf5";
    }
  });
  changeIcon.style.color = colorPrimary;
  changeIcon.style.borderColor = colorPrimary;
  userDateAfter.style.backgroundColor = colorPrimary;
  aside.addEventListener("mouseenter", () => {
    aside.style.backgroundColor = colorPrimary;
    changeIcon.style.color = "white";
    changeIcon.style.borderColor = "white";
    userDateParagraphe.forEach((e) => {
      e.style.color = "white";
    });
  });
  aside.addEventListener("mouseleave", () => {
    aside.style.backgroundColor = "unset";
    changeIcon.style.color = colorPrimary;
    changeIcon.style.borderColor = colorPrimary;
  });
}

allDifficulty.addEventListener("change", () => {
  switch (allDifficulty[allDifficulty.selectedIndex].classList.value) {
    case "0":
      changePriority("#8ac3a3");
      break;
    case "1":
      changePriority("#87baf5");
      break;
    case "2":
      changePriority("#f0864a");
      break;
    case "3":
      changePriority("#f674ad");
      break;
    case "4":
      changePriority("#aa87f5");
      break;
    default:
  }
});
