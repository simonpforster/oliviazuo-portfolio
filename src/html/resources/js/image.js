let collection = document.getElementsByTagName("img");

const SOURCE = "https://image-resizer.simonpforster.com/oliviazuo-portfolio";

function updateImageSrc(image, pixel = false) {
    let fix = image.getAttribute("fix");
    let path = image.getAttribute("path");

    if (path !== null) {
        let url = SOURCE + path;
        if (fix != null) {
            switch (fix.toLowerCase()) {
                case 'width':
                    let width = pixel ? 4 : parseInt(window.getComputedStyle(image.parentElement).width) * 2;
                    url += "?width=" + width;
                    break;
                case 'height':
                    let height = pixel ? 4 : parseInt(window.getComputedStyle(image.parentElement).height) * 2;
                    url += "?height=" + height;
                    break;
                default:
                    break;
            }
        }
        image.src = url;

        if (pixel) {
            image.addEventListener("load", () => {
                image.classList.add("pixel");
                if (checkAllBlurred()) {
                    if (document.readyState === 'complete') {
                        console.log("bing");
                        updateAllImageClear();
                    } else {
                        console.log("bong");
                        window.addEventListener("load", () => {
                            console.log("bang")
                            updateAllImageClear();
                        });
                    }
                }
            }, {once: true})
        } else {
            image.addEventListener("load", () => {
                image.classList.add("loaded")
                image.classList.remove("pixel");
            }, {once: true})
        }
    }
}

function updateImageSrcBlur(image) {
    updateImageSrc(image, true)
    if (image.getAttribute("id") !== "modal-image") {
        image.addEventListener("click", () => {
            openModal(image.getAttribute("path"));
        })
    }
}

function updateAllImageClear()  {
    let captions = document.getElementsByTagName("figcaption")
    for (let i = 0; i < captions.length; i++) {
        captions[i].style.display = "block";
    }
    allImages(updateImageSrc);
}


function checkForUpdateImageSrc(image) {
    let ratioWidth = image.naturalWidth / parseInt(window.getComputedStyle(image).width);
    let ratioHeight = image.naturalHeight / parseInt(window.getComputedStyle(image).height);
    if ((ratioWidth < 2 && ratioHeight !== 0 && !isNaN(ratioHeight))
        || (ratioWidth < 2 && ratioWidth !== 0 && !isNaN(ratioWidth))) {
        updateImageSrc(image);
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
        if (!image.classList.contains("pixel")) {
            blurred = false;
        }
    })
    return blurred;
}

let modal = document.getElementById("modal");

modal.addEventListener("click", closeModal)

let modalImage = document.getElementById("modal-image");
let modalController = new AbortController();

function closeModal() {
    modalController.abort();
    modalController = new AbortController();
    modal.style.display = "none";
    modalImage.setAttribute("path", "");
    modalImage.src = "";
}

function openModal(path) {
    modal.style.display = "block";
    modalImage.setAttribute("path", path);
    modalImage.classList.add("pixel");
    updateModalSrc(4, modalController)
}

function updateModalSrc(width, controller) {
    let path = modalImage.getAttribute("path");
    if (path != null) {
        modalImage.src = SOURCE + path + "?width=" + width;
        modalImage.addEventListener("load", () => {
                if (modalImage.naturalWidth > parseInt(window.getComputedStyle(modalImage).width)
                    || (modalImage.width > 0 && modalImage.width < width)) {
                    modalImage.classList.remove("pixel");
                    modalImage.src = SOURCE + path
                } else {
                    updateModalSrc(width * 2, controller)
                }
            }, {once: true, signal: controller.signal }
        )
    }
}


export {
    updateImageSrc,
    checkForUpdateImageSrc
}

// Do all init stuff
document.readyState === "loading"
    ? document.addEventListener("DOMContentLoaded", function () {
        allImages(updateImageSrcBlur)
    })
    : allImages(updateImageSrcBlur)

window.onload = () => {

    window.onresize = () => {
        allImages(checkForUpdateImageSrc);
    };

    window.ondeviceorientation = () => {
        allImages(checkForUpdateImageSrc);
    }
};

