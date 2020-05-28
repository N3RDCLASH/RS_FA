const back_button = document.createElement("i")
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
back_button.onclick = showTable
const deelnemer_form = document.getElementById('deelnemers')
const deelnemers_table = document.getElementById('deelnemers_table')
const row = document.getElementsByClassName('col')[0]
row.appendChild(back_button)

M.AutoInit()


function showForm() {
    for (let x of document.getElementsByTagName("input")) {
        x.classList.add("white-text")
        console.log
            (x)
    }
    instance = M.FormSelect.init(document.getElementById('deelnemers_type'))
    deelnemer_form.style.display = 'block';
    deelnemer_form.classList.toggle('flip-in-ver-right', true)
    deelnemers_table.style.display = 'none';
    // search.style.display = 'none';
    back_button.style.setProperty('display', 'inline-block', 'important')
}

function showTable() {
    deelnemers_table.style.display = 'table'
    // search.style.display = 'block'
    deelnemers_table.classList.toggle('flip-in-ver-right', true)
    deelnemer_form.style.display = 'none'
    back_button.style.display = 'none'
}


