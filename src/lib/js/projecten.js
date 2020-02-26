
//do work
const projects_table = document.getElementById('projects_table')
const form = document.getElementById('add_form')
const row = document.getElementsByClassName('row')[0]
const info = document.getElementById('project_informatie')
const add_taak = document.getElementById('add_taak')
const taken = document.getElementById('project_taken')
const taken_lijst = document.getElementById('taken_lijst')
const search = document.getElementById('search_bar')
let response
let deelnemers = []
const back_button = document.createElement("i")
back_button.className = 'material-icons small teal-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
row.insertBefore(back_button, row.firstChild)

function showForm() {
    form.style.display = 'block'
    form.classList.toggle('flip-in-ver-right', true)
    projects_table.style.display = 'none'
    // deelnemers_table.style.display = 'none';
    search.style.display = 'none'
    back_button.style.setProperty('display', 'inline-block', 'important')
}

function showTable() {


    projects_table.style.display = 'table'
    search.style.display = 'block'
    projects_table.classList.toggle('flip-in-ver-right', true)
    form.style.display = 'none'
    info.style.display = 'none'
    taken.style.display = 'none'
    back_button.style.display = 'none'
    taken_lijst.innerHTML = ''
}
back_button.addEventListener('click', showTable)

document.addEventListener("DOMContentLoaded", () => {
    const rows = document.querySelectorAll("tr[data-id]")
    rows.forEach(row => {
        row.addEventListener("click", () => {
            id = row.dataset.id
            fetch(`../requests/get_project.php?id=${id}`).then(function (response) {
                return response.json()
            })
                .then(function (body) {
                    // console.table(body)
                    response = body
                    showProject(body)
                });

            fetch(`../requests/get_taak.php?id=${id}`).then(function (response) {
                return response.json()
            })
                .then(function (body) {
                    // console.table(body)
                    response = body
                    showTaak(body)
                });

        });
    })
})
function showProject(data) {
    search.style.display = 'none'
    projects_table.style.display = 'none'
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
        // console.log(data)
    })
}


//Taken Form
document.getElementById('type_taak').addEventListener('change', () => {
    console.log(document.getElementById('type_taak').value)
    if (document.getElementById('type_taak').value == 3) {
        document.getElementById('taak_aantal').setAttribute('disabled', true)
        document.getElementById('taak_prijs').setAttribute('disabled', true)
    } else {
        document.getElementById('taak_aantal').removeAttribute('disabled')
        document.getElementById('taak_prijs').removeAttribute('disabled')
    }
})

add_taak.addEventListener('click', function () {
    fetch('../requests/select_deelnemers.php').then(res => {
        return res.json()
    }).then(body => {
        // console.log(body)
        chipData(body)
        // deelnemers = body
        // console.log(deelnemers)
    })
})

function chipData(data) {
    var result = data.reduce(function (r, e) {
        r[e.naam] = '../../lib/images/yuna.jpg';
        return r;
    }, {});

    $('.chips-autocomplete').chips({
        autocompleteOptions: {
            data: result,
            limit: Infinity,
            minLength: 1
        }
    });
}

test = {
    test: 'test'
}
//Post Taak data 
document.getElementById('taken_form').addEventListener('submit', function (e) {
    e.preventDefault()
    tform = document.forms['taken_form']
    const formdata = new FormData(tform);

    fetch('../requests/create_taak.php', {
        method: 'POST',
        body: formdata
    }).then(res => {
        return res.text()
    }).then(data => {
        console.log(data)
    })
    // console.log('test')

})

