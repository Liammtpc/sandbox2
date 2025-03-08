let midicenc=document.querySelector("#midicenc");
let time=document.querySelector("#time");
function save(){
localStorage.setItem("midicenc",midicenc.value);
localStorage.setItem("time",time.value);
}
const editButtons = document.querySelectorAll(".btnEdit");
const show = document.querySelector(".edits");
const closes = document.querySelector(".closes");
const deleteButtons = document.querySelectorAll(".btnDelete");

editButtons.forEach(button => {
    button.addEventListener("click", (e) => {
        e.preventDefault(); 
        show.style.display = "flex";
    });
});

closes.addEventListener("click", () => {
    show.style.display = "none";
});
