import "./bootstrap";

import Alpine from "alpinejs";

import { Tooltip, Ripple, Sidenav, Carousel, initTE, Modal } from "tw-elements";

window.Alpine = Alpine;

Alpine.start();

initTE({ Tooltip, Ripple, Carousel, Sidenav, Modal });