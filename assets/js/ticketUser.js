$(document).ready(function () {
    $("#table_wiki").DataTable({
        paging: false,
        // searching: false,
        // ordering:  false,
        info: false,
        language: {
            search: "Recherche :",
            emptyTable:" "

        }
    })
})
$("#addTicket").popover({
    html : true,
    container : 'body',
    sanitize : false
})
$("#table_wiki").on('click','tbody tr',function () {
    console.log($(this).attr("id"))
    window.location.href="editTicket.php?id="+$(this).attr("id")
})