import "./bootstrap";

import Alpine from "alpinejs";

import { Tooltip, Ripple, Sidenav, Carousel, initTE, Datatable} from "tw-elements";

window.Alpine = Alpine;

Alpine.start();

initTE({ Tooltip, Ripple, Carousel, Sidenav });

const sidenav = document.getElementById("full-screen-example");
const sidenavInstance = Sidenav.getInstance(sidenav);

let innerWidth = null;

const setMode = (e) => {
  // Check necessary for Android devices
  if (window.innerWidth === innerWidth) {
    return;
  }

  innerWidth = window.innerWidth;

  if (window.innerWidth < sidenavInstance.getBreakpoint("sm")) {
    sidenavInstance.changeMode("over");
    sidenavInstance.hide();
  } else {
    sidenavInstance.changeMode("side");
    sidenavInstance.show();
  }
};

if (window.innerWidth < sidenavInstance.getBreakpoint("sm")) {
  setMode();
}

// Event listeners
window.addEventListener("resize", setMode);
