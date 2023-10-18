function togglePopup() {
    var overlay = document.getElementById("overlay");
    var popupContainer = document.getElementById("popup-container");
    overlay.style.display = (overlay.style.display === "none" || overlay.style.display === "") ? "block" : "none";
    popupContainer.style.display = (popupContainer.style.display === "none" || popupContainer.style.display === "") ? "block" : "none";
}