import "./bootstrap";
import "bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.addEventListener("resize", () => {
    pieChart.resize();
});
