import "./bootstrap";
import "bootstrap";

import Alpine from "alpinejs";
window.Alpine = Alpine;

Alpine.start();

import jQuery from "jquery";
window.$ = jQuery;

import swal from "sweetalert2";
window.Swal = swal;

$("#clusterAnalysis").collapse(
    $("#cluster_YN").prop("checked") ? "show" : "hide"
);