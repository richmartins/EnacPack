var isClicked = 0;
function showBarNav() {
    var elems = document.getElementsByClassName('item-barNav');

    if (isClicked == 0) {
        for (let i = 0; i < elems.length; i++) {
            elems[i].style.display = 'block';
        }
        isClicked = 1;
    } else {
        for (let i = 0; i < elems.length; i++) {
            elems[i].style.display = 'none';
        }
        isClicked = 0;
    }
}