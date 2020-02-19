M.AutoInit();
let table = document.getElementById('projects_table')
let form = document.getElementById('add_form')
let row = document.getElementsByClassName('row')[0]
let info = document.getElementById('project_informatie')
let search = document.getElementById('search_bar')
let back_button = document.createElement("i")
back_button.className = 'material-icons small teal-text back'
back_button.onclick = console.log('test');
back_button.innerHTML = 'arrow_back';
back_button.onclick = showTable
row.insertBefore(back_button, row.firstChild)


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
    // let table = document.getElementById('projects_table')
    // let form = document.getElementById('add_form')

    table.style.display = 'table'
    search.style.display = 'block'
    table.classList.toggle('flip-in-ver-right', true)
    form.style.display = 'none'
    info.style.display = 'none'
    back_button.style.display = 'none'
}

document.addEventListener("DOMContentLoaded", () => {
    const rows = document.querySelectorAll("tr[data-id]")
    rows.forEach(row => {
        row.addEventListener("click", () => {
            id = row.dataset.id
            fetch(`getProject.php?id=${id}`).then(function (response) {
                return response.json();
            })
                .then(function (body) {
                    console.log(body)
                    showRecord(body)
                });
        });
    })
})

function showRecord(data) {
    search.style.display = 'none'
    table.style.display = 'none'
    back_button.style.setProperty('display', 'inline-block', 'important')
    info.style.display = 'block'
    naam = document.getElementById('naam')
    omschrijving = document.getElementById('omschrijving')
    type = document.getElementById('type')
    begin_datum = document.getElementById('begin_datum')
    eind_datum = document.getElementById('eind_datum')


    const labels = document.querySelectorAll("label")
    labels.forEach(label => {
        label.classList.add('active')

    }
    )
    naam.value = data.naam
    omschrijving.value = data.omschrijving
    type.value = data.type
    begin_datum.value = data.begin_datum
    eind_datum.value = data.eind_datum
}