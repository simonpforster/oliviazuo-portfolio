let collection = document.getElementsByTagName("img");

const SOURCE = "https://image-resizer.simonpforster.com/oliviazuo-portfolio"

function updateImageSrc(image, pixel = false) {
    let fix = image.getAttribute("fix");
    let path = image.getAttribute("path");

    if (path != null) {
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
                    let captions = document.getElementsByTagName("figcaption")
                    for (let i = 0; i < captions.length; i++) {
                        captions[i].style.display = "block";
                    }
                    allImages(updateImageSrc)
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
    image.addEventListener("click", () => {
        openModal(image.getAttribute("path"));
    })
}

function checkForUpdateImageSrc(image) {
    let ratioWidth = image.naturalWidth / parseInt(window.getComputedStyle(image).width);
    let ratioHeight = image.naturalHeight / parseInt(window.getComputedStyle(image).height);
    if ((ratioWidth < 2 && ratioHeight !== 0 && !isNaN(ratioHeight))
        || (ratioWidth < 2 && ratioWidth !== 0 && !isNaN(ratioWidth))) {
        console.info("requesting a higher resolution image");
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

var modal = document.getElementById("modal");

modal.addEventListener("click", closeModal)

var modalImage = document.getElementById("modal-image");

function closeModal() {
    modal.style.display = "none";
    modalImage.setAttribute("path", "");
    modalImage.src = "";
}

function openModal(path) {
    modal.style.display = "block";
    modalImage.setAttribute("path", path);
    modalImage.classList.add("pixel");
    updateModalSrc(4)
}

function updateModalSrc(width) {
    let path = modalImage.getAttribute("path");
    if (path != null) {
        modalImage.src = SOURCE + path + "?width=" + width;
        modalImage.addEventListener("load", () => {
                if (modalImage.naturalWidth > parseInt(window.getComputedStyle(modalImage).width)
                    || (modalImage.width > 0 && modalImage.width < width)) {
                    modalImage.classList.remove("pixel");
                    modalImage.src = SOURCE + path
                } else {
                    updateModalSrc(width * 2)
                }
            }, {once: true}
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

window.onload = (event) => {

    window.onresize = (event) => {
        allImages(checkForUpdateImageSrc);
    };

    window.ondeviceorientation = (event) => {
        allImages(checkForUpdateImageSrc);
    }
};

