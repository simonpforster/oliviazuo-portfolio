/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
let prevScrollpos = window.scrollY;
window.onscroll = function() {
    let currentScrollPos = window.scrollY;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").classList.remove("hide");
    } else if (prevScrollpos < currentScrollPos) {
        document.getElementById("navbar").classList.add("hide");
    }
    prevScrollpos = currentScrollPos;
}