import "./bootstrap";

import Alpine from "alpinejs";

import { Tooltip, Ripple, Sidenav, Carousel, initTE, Datatable} from "tw-elements";

window.Alpine = Alpine;

Alpine.start();

initTE({ Tooltip, Ripple, Carousel, Sidenav });