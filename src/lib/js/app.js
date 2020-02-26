M.AutoInit();
$(document).ready(
    function () {
        $('.datepicker').datepicker({ format: 'yyyy-mm-dd', container: 'body' });
    }
);

// function setCookie(cname, cvalue, exdays) {
//     var d = new Date();
//     d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
//     var expires = "expires=" + d.toUTCString();
//     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
// }