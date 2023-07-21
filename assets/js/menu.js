function collapse(a) {
    $(".content-collapse").show(100)
}

function uncollapse(a) {
    $(".content-collapse").hide(100)
}
function menumobile(a) {
    $(a).hide(50);
    $(".close-menu").show(50)
    $(".menu-mobile").show(50)
}
function closemenu(a) {
    $(a).hide(50);
    $(".open-menu").show(50)
    $(".menu-mobile").hide(50)
}