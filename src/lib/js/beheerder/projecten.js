
//do work
setCookie('project_id', 0, 1)

const projects_table = document.getElementById('projects_table')
const form = document.getElementById('add_form')
const row = document.getElementsByClassName('col')[0]
const info = document.getElementById('project_informatie')
const taken = document.getElementById('project_taken')
const search = document.getElementById('search')
let response
let deelnemers = []
const back_button = document.createElement("i")
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
row.appendChild(back_button)


for (const x of document.getElementsByTagName("input")) {
    x.classList.add("white-text")
}


function showForm() {
    form.style.display = 'block'
    form.classList.toggle('flip-in-ver-right', true)
    projects_table.style.display = 'none'
    search.style.display = 'none'
    back_button.style.setProperty('display', 'inline-block', 'important')
}

function showTable() {
    projects_table.style.display = 'table'
    search.style.display = 'block'
    projects_table.classList.toggle('flip-in-ver-right', true)
    form.style.display = 'none'
    back_button.style.display = 'none'
}
back_button.addEventListener('click', showTable)



test = {
    test: 'test'
}
//Post Taak data
