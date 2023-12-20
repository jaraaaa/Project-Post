const checkbox = document.getElementById("checkbox");
const btnMode = document.getElementById("btnMode");
/* const btnMode = document.getElementById("btnMode"); */


checkbox?.addEventListener("change", () => {
  document.body.classList.toggle("dark");
  btnMode.classList.toggle("btnLight");
  /* cardCust.classList.toggle("cardCust.dark"); */
});

// btnMode.addEventListener("change", () => {
//   btnMode.classList.remove("btnDark");
//   // document.classList.add("btnLight");
// });