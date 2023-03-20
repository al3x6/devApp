function search_module() {
    let input = document.getElementById('searchbar').value;
    input = input.toLocaleLowerCase();
    let x = document.getElementsByClassName('domaine');

    for (let i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display = "none";
        } else {
            x[i].style.display = "list-item";
        }
    }
}