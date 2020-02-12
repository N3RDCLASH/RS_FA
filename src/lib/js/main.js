M.AutoInit();
let table = document.getElementById('projects_table')
let form = document.getElementById('add_form')
let row = document.getElementsByClassName('row')[0]
let back_button = document.createElement("i")
back_button.className = 'material-icons small teal-text back'
back_button.onclick = console.log('test');
back_button.innerHTML = 'arrow_back';
back_button.onclick = showTable
row.appendChild(back_button)


$(document).ready(
    function () {
        $('.datepicker').datepicker({ format: 'yyyy-mm-dd', container: 'body' });
    }
);

function showForm() {
    form.style.display = 'block';
    form.classList.toggle('flip-in-ver-right', true)
    table.style.display = 'none';
    back_button.style.setProperty('display', 'inline-block', 'important')
}

function showTable() {
    let table = document.getElementById('projects_table')
    let form = document.getElementById('add_form')

    table.style.display = 'table'
    table.classList.toggle('flip-in-ver-right', true)
    form.style.display = 'none'
    back_button.style.display = 'none'
}




