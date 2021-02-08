require("./bootstrap");

require("alpinejs");

function registerVisit(linkId) {
    return function () {
        axios
            .post(`/visits/${linkId}`, {})
            .then(console.log)
            .catch((error) => console.error(error.message));
    };
}

function init() {
    const $links = document.getElementsByClassName("user-link");

    for (const $link of $links) {
        $link.addEventListener(
            "click",
            registerVisit($link.getAttribute("link-id"))
        );
    }
}

init();
