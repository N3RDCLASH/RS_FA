M.AutoInit();
let table = document.getElementById('projects_table')
let form = document.getElementById('add_form')
let row = document.getElementsByClassName('row')[0]
let info = document.getElementById('project_informatie')
let taken = document.getElementById('project_taken')
let taken_lijst = document.getElementById('taken_lijst')
let search = document.getElementById('search_bar')
let back_button = document.createElement("i")
back_button.className = 'material-icons small teal-text back'
back_button.onclick = console.log('test');
back_button.innerHTML = 'arrow_back';
back_button.onclick = showTable
back_button.id = 'back_button'
row.insertBefore(back_button, row.firstChild)
let response


$(document).ready(
    function () {
        $('.datepicker').datepicker({ format: 'yyyy-mm-dd', container: 'body' });
    }
);

function showForm() {
    form.style.display = 'block';
    form.classList.toggle('flip-in-ver-right', true)
    table.style.display = 'none';
    search.style.display = 'none';
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
    taken.style.display = 'none'
    back_button.style.display = 'none'
    taken_lijst.innerHTML = ''
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
                    console.table(body)
                    response = body
                    showProject(body)
                });
            fetch(`getTaak.php?id=${id}`).then(function (response) {
                return response.json();
            })
                .then(function (body) {
                    console.table(body)
                    response = body
                    showTaak(body)
                });

        });
    })
})

function showProject(data) {
    search.style.display = 'none'
    table.style.display = 'none'
    back_button.style.setProperty('display', 'inline-block', 'important')
    info.style.display = 'block'
    taken.style.display = 'block'
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
    begin_datum.value = data.datum_start
    eind_datum.value = data.datum_eind
}
function showTaak(data) {
    data.forEach(taak => {
        taken_lijst.innerHTML +=
            `<li>
            <div class="collapsible-header" > <i class="material-icons">check</i>${taak.naam}</div>
            <div class="collapsible-body"><span>${taak.omschrijving}</span></div>
    </li > `
        console.log(data)
    })
}




// function setCookie(cname, cvalue, exdays) {
//     var d = new Date();
//     d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
//     var expires = "expires=" + d.toUTCString();
//     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
// }