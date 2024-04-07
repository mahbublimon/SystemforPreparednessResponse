const list = document.querySelectorAll(".list");
const checkBox = document.querySelector(".checkbox1");
function makeLinkActive() {
  list.forEach((item) => {
    item.classList.remove("active");
    this.classList.add("active");
  });
}
list.forEach((item) => {
  item.addEventListener("click", makeLinkActive);
});
