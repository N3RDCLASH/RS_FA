M.AutoInit();
let projects_table = document.getElementById('projects_table')
let deelnemers_table = document.getElementById('deelnemers_table')
let form = document.getElementById('add_form')
let row = document.getElementsByClassName('row')[0]
let info = document.getElementById('project_informatie')
let add_taak = document.getElementById('add_taak')
let taken = document.getElementById('project_taken')
let taken_lijst = document.getElementById('taken_lijst')
let search = document.getElementById('search_bar')
let back_button = document.createElement("i")
back_button.className = 'material-icons small teal-text back'
back_button.innerHTML = 'arrow_back';
back_button.onclick = showTable
back_button.id = 'back_button'
row.insertBefore(back_button, row.firstChild)
let response
let deelnemers = []

$(document).ready(
    function () {
        $('.datepicker').datepicker({ format: 'yyyy-mm-dd', container: 'body' });
    }
);

function showForm() {
    form.style.display = 'block';
    form.classList.toggle('flip-in-ver-right', true)
    projects_table.style.display = 'none';
    deelnemers_table.style.display = 'none';
    search.style.display = 'none';
    back_button.style.setProperty('display', 'inline-block', 'important')
}

function showTable() {
    // let table = document.getElementById('projects_table')
    // let form = document.getElementById('add_form')

    projects_table.style.display = 'table'
    deelnemers_table.style.display = 'table'
    search.style.display = 'block'
    projects_table.classList.toggle('flip-in-ver-right', true)
    deelnemers_table.classList.toggle('flip-in-ver-right', true)
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
                    // console.table(body)
                    response = body
                    showProject(body)
                });

            fetch(`getTaak.php?id=${id}`).then(function (response) {
                return response.json();
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
    deelnemers_table.style.display = 'none'
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
    fetch('selectDeelnemers.php').then(res => {
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
        r[e.naam] = null;
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

//Post Taak data 
document.getElementById('taken_form').addEventListener('submit', function () {
    e.preventDefault()
    // form = FormData(this);

    // options = {
    //     'method': 'post',
    //     'body': FormData
    // }
    // fetch('createTaak.php', options).then(res => {
    //     console.log(res)
    // }).then
    console.log('test')
})



// function setCookie(cname, cvalue, exdays) {
//     var d = new Date();
//     d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
//     var expires = "expires=" + d.toUTCString();
//     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
// }