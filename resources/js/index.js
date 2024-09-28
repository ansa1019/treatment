function save() {
    Swal.fire({
        title: "已儲存資料!",
        icon: "success",
        showConfirmButton: false,
        timer: 2500,
    });
}

function reset() {
    $("textarea").val("");
    $("input[type='text']").val("");
    $("#cohort").val("KMU").change();
    $("#follow_up").prop("checked", true);
    $("#clusterAnalysis").addClass("show");
    $("#cluster_YN").prop("checked", true);
    $("#batch_effect").prop("checked", true);
    $("input:radio:checked").prop("checked", false);
    $("input[name='subtype']:first").prop("checked", true);
    $("input[name='cluster']:first").prop("checked", true);
    $("input[name='cluster']:first").prop("checked", true);
}
