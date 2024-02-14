import { Datatable, initTE } from "tw-elements";

initTE({ Datatable });

let tr = document.getElementsByTagName("tr");
let trArray = Array.from(tr);

trArray.forEach((tr) => {
    tr.classList.add("child:text-gray-800");
    tr.classList.add("child:dark:text-gray-200");
});