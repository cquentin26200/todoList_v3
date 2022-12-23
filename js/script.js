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
  const cDecoded = decodeURIComponent(document.cookie);
  const cArr = cDecoded.split("; ");
  const checkbox = document.getElementById("condition");
  let res;
  cArr.forEach((val) => {
    if (val.startsWith(cName)) res = val.substring(cName.length);
  });
  if (res && checkbox) {
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

const allIcons = document.querySelectorAll(".newNote .icons i");
if (allIcons[0]) {
  allIcons[0].classList.add("iconSelected");
  allIcons.forEach((e) => {
    const changeIcon = document.querySelector("#changeIcon");
    const changeIconAside = document.querySelector(".changeIconAside");
    e.addEventListener("click", () => {
      const iconSelected = document.querySelector(".iconSelected");
      changeIcon.className = `${e.className}`;
      changeIconAside.value = changeIcon.className;
      iconSelected.classList.remove("iconSelected");
      e.classList.add("iconSelected");
      if (!e.classList.contains("iconSelected")) {
        e.classList.add("iconSelected");
      }
    });
  });
}

const titleAside = document.querySelectorAll(".titleAside");
const titleExample = document.querySelector("#title");
titleAside.forEach((e) => {
  if (titleExample) {
    if (titleExample.value != "") {
      e.textContent = titleExample.value;
    } else {
      e.textContent = "example note";
    }
    titleExample.addEventListener("input", () => {
      if (titleExample.value == "") {
        e.textContent = "example note";
      } else {
        e.textContent = titleExample.value;
      }
    });
  }
});

const description = document.querySelector(".description");
const paragraphAside = document.querySelector(".paragraphAside");

if (description) {
  if (description.textContent == "") {
    paragraphAside.textContent =
      "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum debitis aut eum, quam eius sint consequuntur fuga sequi ducimus vel cumque perspiciatis, sit ratione accusantium recusandae dignissimos. Expedita, voluptatem veritatis?";
  } else {
    paragraphAside.textContent = description.value;
  }
  description.addEventListener("input", () => {
    paragraphAside.textContent = description.value;
    if (description.value == "") {
      paragraphAside.textContent =
        "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum debitis aut eum, quam eius sint consequuntur fuga sequi ducimus vel cumque perspiciatis, sit ratione accusantium recusandae dignissimos. Expedita, voluptatem veritatis?";
    }
  });
}

const reset = document.querySelector(".reset");
const date = document.querySelector("#date");
const allInputReset = [description, titleExample];
const priority = document.querySelector("#priority");

if (reset) {
  reset.addEventListener("click", () => {
    description.textContent = "";
    description.placeholder = "Enter a text";
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
}

const activeMenuBurger = document.querySelectorAll(".activeMenuBurger");
const menuBurger = document.querySelectorAll(".menuBurger");

const showInfo = document.createElement("div");
showInfo.className = "viewInfo";
const main = document.querySelector("main");
const paragraphe = document.createElement("p");
const title = document.createElement("h2");
const hideView = document.createElement("span");

document.body.addEventListener("click", (event) => {
  if (event.target.classList.contains("activeMenuBurger")) {
    event.target.nextElementSibling
      .querySelector(".menuBurger")
      .classList.toggle("none");
  } else {
    if (event.target.parentElement.querySelector(".menuBurger")) {
      const test = document.querySelectorAll(".menuBurger");
      test.forEach((e) => {
        e.classList.add("none");
      });
    }
  }
});

const allDifficulty = document.querySelector("#priority");
const changeIcon = document.querySelector("#changeIcon");
const userDateAfter = document.querySelector(".userDate .after");
const aside = document.querySelector("aside");
const userDateParagraphe = document.querySelectorAll(".userDate p i");

function changePriority(colorPrimary) {
  const asideHidden = document.querySelector(".asideHidden");
  asideHidden.value = colorPrimary;
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
    userDateParagraphe.forEach((e) => {
      e.style.color = "black";
    });
  });
}

const divAside = document.querySelectorAll("div .aside");

divAside.forEach((e) => {
  const icons = e.querySelector(".changeIcon");
  const iconParagraphe = e.querySelectorAll("p i");
  iconParagraphe.forEach((a) => (a.style.color = e.classList[1]));
  e.addEventListener("mouseenter", () => {
    iconParagraphe.forEach((a) => (a.style.color = "white"));
    icons.style.borderColor = "white";
    icons.style.color = "white";
    e.style.backgroundColor = e.classList[1];
  });
  e.addEventListener("mouseleave", () => {
    iconParagraphe.forEach((a) => (a.style.color = e.classList[1]));
    e.style.backgroundColor = "unset";
    icons.style.borderColor = e.classList[1];
    icons.style.color = e.classList[1];
  });
});

if (allDifficulty) {
  allDifficulty.addEventListener("change", changeColor);
  changeColor();
  function changeColor() {
    switch (allDifficulty[allDifficulty.selectedIndex].value) {
      case "very low":
        changePriority("#8ac3a3");
        break;
      case "low":
        changePriority("#87baf5");
        break;
      case "medium":
        changePriority("#f0864a");
        break;
      case "high":
        changePriority("#f674ad");
        break;
      case "very high":
        changePriority("#aa87f5");
        break;
      default:
        changePriority("#131313");
    }
  }
}
const groupTitleCross = document.createElement("div");
const viewShow = document.querySelector(".viewShow");
groupTitleCross.classList.add("flex");
const file = document.querySelector(".file");
showInfo.appendChild(groupTitleCross);
const view = document.querySelectorAll(".view");

view.forEach((e) => {
  e.addEventListener("click", (a) => test(a));
});

if (document.querySelector(".file")) {
  file.addEventListener("click", (a) => {
    test(a);
  });
}
const form = document.createElement("form");
const input = document.createElement("input");
const submit = document.createElement("input");
function test(a) {
  divAside.forEach(
    (a) => (a.style.boxShadow = "0px 0px 40px 0px rgba(0, 0, 0, 0.2)")
  );
  main.appendChild(showInfo);
  document.body.style.overflow = "hidden";
  if (a.target.classList.contains("view")) {
    groupTitleCross.appendChild(title);
    showInfo.appendChild(paragraphe);
    title.innerHTML = a.target
      .closest(".container")
      .querySelector(".titleAside").textContent;
    paragraphe.innerHTML = a.target
      .closest(".container")
      .querySelector(".paragraphAside").textContent;
  } else {
    title.remove();
    paragraphe.remove();
    form.method = "post";
    form.action = "../../todoList_v3/verification/verif_file.php";
    groupTitleCross.appendChild(form);
    input.type = "text";
    input.name = "name";
    input.id = "name";
    form.appendChild(input);

    submit.type = "submit";
    submit.value = "Envoyer";
    form.appendChild(submit);
  }
  groupTitleCross.appendChild(hideView);
  viewShow.classList.toggle("showViewOpacity");
  const menuBurger = document.querySelectorAll(".menuBurger");
  menuBurger.forEach((e) => e.classList.add("none"));
}

showInfo.style.animationFillMode = "forwards";
hideView.addEventListener("click", () => {
  form.remove();
  input.remove();
  submit.remove();
  document.body.style.overflow = "visible";
  viewShow.classList.toggle("showViewOpacity");
  showInfo.remove();
  divAside.forEach((a) => (a.style.boxShadow = "unset"));
});
const newMenu = document.querySelector(".new");
const newMenuChild = document.querySelector(".new ul");
if (newMenu) {
  newMenu.addEventListener("click", () => {
    newMenuChild.classList.toggle("none");
    newMenuChild.classList.toggle("newThings");
  });
}

const folder = document.querySelector(".folder");
const newFile = document.querySelector(".newFile");
if (folder) {
  folder.addEventListener("click", () => newFile.classList.toggle("none"));
}
