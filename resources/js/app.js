require("./bootstrap");

import "alpinejs";

import turbolinks from "turbolinks";
turbolinks.start();

const body = document.querySelector(".body");
const searchbox = document.querySelector(".searchbox");

if (searchbox) {
    body.addEventListener("keyup", event => {
        if (event.key == "/") {
            if (searchbox) {
                searchbox.focus();
            }
        }
    });
}
