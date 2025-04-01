export {updateImageSrc, checkForUpdateImageSrc};

let collection = document.querySelectorAll("img:not(.static)");

function updateImageSrc(image) {
    let fix = image.getAttribute("fix");
    let path = image.getAttribute("path");
    if (path !== null) {
        let url = config.imageResizer + path;
        if (fix != null) {
            switch (fix.toLowerCase()) {
                case "width":
                    let width = parseInt(window.getComputedStyle(image.parentElement).width) * 2;
                    url += "?width=" + width;
                    break;
                case "height":
                    let height = parseInt(window.getComputedStyle(image.parentElement).height) * 2;
                    url += "?height=" + height;
                    break;
                default:
                    break;
            }
            image.src = url;
        }
        image.addEventListener(
            "load",
            () => {
                image.classList.add("loaded");
                image.classList.remove("pixel");
            },
            {once: true},
        );
    }
}

function updateAllImages() {
    let captions = document.getElementsByTagName("figcaption");
    for (let i = 0; i < captions.length; i++) {
        captions[i].style.visibility = "visible";
    }
    allImages(updateImageSrc);
}

function checkForUpdateImageSrc(image) {
    if (image.classList.contains("loaded")) {
        let ratioWidth =
            image.naturalWidth / parseInt(window.getComputedStyle(image).width);
        let ratioHeight =
            image.naturalHeight / parseInt(window.getComputedStyle(image).height);
        if (
            (ratioWidth < 2 && ratioHeight !== 0 && !isNaN(ratioHeight)) ||
            (ratioWidth < 2 && ratioWidth !== 0 && !isNaN(ratioWidth))
        ) {
            updateImageSrc(image);
        }
    }
}

function allImages(thing) {
    for (let i = 0; i < collection.length; i++) {
        thing(collection[i]);
    }
}

function checkAllBlurred() {
    let blurred = true;
    allImages(function (image) {
        if (!image.complete) { blurred = false; }
    });
    return blurred;
}

//modal code

let modal = document.getElementById("modal");

modal.addEventListener("click", closeModal);

let modalImage = document.getElementById("modal-image");
let modalController = new AbortController();

function closeModal() {
    modalController.abort();
    modalController = new AbortController();
    modal.style.display = "none";
    modalImage.setAttribute("path", "");
    modalImage.classList.add("pixel-modal");
    modalImage.src = "";
}

function openModal(path) {
    modal.style.display = "block";
    modalImage.setAttribute("path", path);
    modalImage.classList.add("pixel-modal");
    updateModalSrc(4, modalController);
}

function modalEvent(image) {
    if (image.getAttribute("id") !== "modal-image" && image.parentElement.getAttribute("id") !== "archive-arrow") {
        image.addEventListener("click", () => {
            openModal(image.getAttribute("path"));
        });
    }
}

function updateModalSrc(width, controller) {
    let path = modalImage.getAttribute("path");
    if (path != null) {
        modalImage.src = config.imageResizer + path + "?width=" + width;
        modalImage.addEventListener(
            "load",
            () => {
                if (
                    modalImage.naturalWidth >
                    parseInt(window.getComputedStyle(modalImage).width) ||
                    (modalImage.width > 0 && modalImage.width < width)
                ) {
                    modalImage.classList.remove("pixel-modal");
                    modalImage.src = config.imageResizer + path;
                } else {
                    updateModalSrc(width * 2, controller);
                }
            },
            {once: true, signal: controller.signal},
        );
    }
}

function checkTrigger() {
    if (checkAllBlurred()) {
        if (document.readyState === "complete") {
            updateAllImages();
        } else {
            window.addEventListener("load", () => {
                updateAllImages();
            });
        }
    }
}


allImages(
    function (image) {
        image.addEventListener("load", () => { checkTrigger(); }, {once: true});
    }
)

// Do all init stuff
if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () {
        checkTrigger();
    })
} else {
    allImages(modalEvent);
    checkTrigger();
}

// Change image resolution if display changes
window.onload = () => {
    window.onresize = () => {
        allImages(checkForUpdateImageSrc);
    };

    window.ondeviceorientation = () => {
        allImages(checkForUpdateImageSrc);
    };
};
