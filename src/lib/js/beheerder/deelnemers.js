const back_button = document.createElement("i")
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
back_button.onclick = showTable
const deelnemer_form = document.getElementById('deelnemers')
const deelnemers_table = document.getElementById('deelnemers_table')
const search = document.getElementById('search')
const row = document.getElementsByClassName('col')[0]
row.appendChild(back_button)

M.AutoInit()

function showForm() {
    instance = M.FormSelect.init(document.getElementById('deelnemers_type'))
    updateUI()
    deelnemer_form.style.display = 'block';
    deelnemer_form.classList.toggle('flip-in-ver-right', true)
    deelnemers_table.style.display = 'none';
    search.style.display = 'none';
    back_button.style.setProperty('display', 'inline-block', 'important')
}

function showTable() {
    deelnemers_table.style.display = 'table'
    search.style.display = 'block'
    deelnemers_table.classList.toggle('flip-in-ver-right', true)
    deelnemer_form.style.display = 'none'
    back_button.style.display = 'none'
}

document.addEventListener("DOMContentLoaded", () => {
    const rows = document.querySelectorAll("tr[data-id]")
    rows.forEach(row => {
        row.addEventListener("click", () => {
            id = row.dataset.id
            fetch(`../requests/get_deelnemer.php?id=${id}`).then(function (response) {
                return response.json();
            })
                .then(function (body) {
                    // console.table(body)
                    response = body
                    showProject(body)
                });

            fetch(`../requests/get_taak.php?id=${id}`).then(function (response) {
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

function updateUI() {
    for (let element of document.getElementsByTagName("input")) { element.classList.add("white-text") }
    for (let element of document.getElementsByTagName("textarea")) { element.classList.add("white-text") }
    for (let element of document.getElementsByTagName("select")) { element.classList.add("white-text") }
    for (let element of document.getElementsByTagName("label")) {
        element.classList.add("white-text")
        element.classList.add("active")
    }
}