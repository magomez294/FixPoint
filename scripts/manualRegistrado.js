function searchManual() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("manualSearchInput");
    filter = input.value.toUpperCase();
    tr = document.querySelectorAll("#manual");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].children[0];
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}