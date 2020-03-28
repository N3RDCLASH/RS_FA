
//do work
setCookie('project_id', 0, 1)

const projects_table = document.getElementById('projects_table')
const form = document.getElementById('add_form')
const row = document.getElementsByClassName('col')[0]
const info = document.getElementById('project_informatie')
const taken = document.getElementById('project_taken')
const search = document.getElementById('search_bar')
let response
let deelnemers = []
const back_button = document.createElement("i")
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
row.appendChild(back_button)

function showForm() {
    form.style.display = 'block'
    form.classList.toggle('flip-in-ver-right', true)
    projects_table.style.display = 'none'
    // deelnemers_table.style.display = 'none';
    // search.style.display = 'none'
    back_button.style.setProperty('display', 'inline-block', 'important')
}

function showTable() {
    projects_table.style.display = 'table'
    // search.style.display = 'block'
    projects_table.classList.toggle('flip-in-ver-right', true)
    form.style.display = 'none'
    back_button.style.display = 'none'
}
back_button.addEventListener('click', showTable)

// document.addEventListener("DOMContentLoaded", () => {
//     const rows = document.querySelectorAll("tr[data-id]")
//     rows.forEach(row => {
//         row.addEventListener("click", () => {
//             id = row.dataset.id
//             setCookie('project_id', id, 1)
//             fetch(`../requests/get_project.php?id=${id}`).then(function (response) {
//                 return response.json()
//             })
//                 .then(function (body) {
//                     // console.table(body)
//                     response = body
//                     showProject(body)
//                 });

//             fetch(`../requests/get_taak.php?id=${id}`).then(function (response) {
//                 return response.json()
//             })
//                 .then(function (body) {
//                     // console.table(body)
//                     response = body
//                     showTaak(body)
//                 });

//         });
//     })
// })


//Taken Form


// function chipData(data) {
//     var result = data.reduce(function (r, e) {
//         r[e.naam] = '../../lib/images/yuna.jpg';
//         return r;
//     }, {});

//     $('.chips-autocomplete').chips({
//         autocompleteOptions: {
//             data: result,
//             limit: Infinity,
//             minLength: 1
//         }
//     });
// }

test = {
    test: 'test'
}
//Post Taak data 
