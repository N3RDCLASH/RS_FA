const back_button = document.createElement("i")
const row = document.getElementsByClassName('col')[0]
const edit = document.getElementById('edit')
const taak_informatie = document.getElementById("taken_form")
const type = document.getElementById("type_taak")
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
row.appendChild(back_button)
let editable = false

back_button.addEventListener('click', () => { window.location = `view_project.php?id=${taak[0].project_id}` })
back_button.style.setProperty('display', 'inline-block', 'important')

// id's
let taak
taak_id = document.getElementsByTagName('body')[0].dataset.id

document.getElementById('edit').addEventListener('click', () => editFields())

document.addEventListener("DOMContentLoaded", async function () {
    updateUI()
    taak = await fetch(`../requests/get_taak.php?id=${taak_id}`).then(res => res.json())
    deelnemers = await fetch(`../requests/get_deelnemers_per_taak.php?id=${taak_id}`).then(res => res.json())
    displayDeelnemers(deelnemers)
    displayTaak(taak[0])
})


// {taak_id: "23", project_id: "6", naam: "Hark Kopen", omschrijving: "xd", type: "4", …}
function displayTaak(data) {
    document.getElementById("taak_naam").value = data.naam
    document.getElementById("taak_omschrijving").value = data.omschrijving
    document.getElementById("type_taak").value = data
    document.getElementById("taak_aantal").value = data.aantal
    document.getElementById("taak_prijs").value = data.prijs
}

// data = []
function displayDeelnemers(data) {
    console.log(data)
    for (let deelnemer of data) {
        if (deelnemer.length <= 1) {
            document.getElementById("deelnemers_collection").innerHTML +=
                `<li class="collection-item dark-1">
            Geen deelnemers gevonden.
            </li>`
            break
        } else {
            document.getElementById("deelnemers_collection").innerHTML +=
                `<li class="collection-item dark-1">
            <div>${deelnemer}<a href="#!" class="secondary-content"><i class="material-icons amber-text">send</i></a></div>
        </li>`
        }
    }
}

async function editFields() {
    editable = !editable
    console.log(editable)
    if (editable == true) {
        for (let e of taak_informatie.getElementsByTagName('input')) {
            e.removeAttribute('disabled')
        }
        for (let e of taak_informatie.getElementsByTagName('select')) {
            e.removeAttribute('disabled')
        }
        for (let e of taak_informatie.getElementsByTagName('textarea')) {
            e.removeAttribute('disabled')
        }
        type.removeAttribute('disabled')
        document.getElementById("submit_taak").removeAttribute('disabled')
        refreshSelect(type)
        updateUI()
    } else if (editable == false) {
        for (let e of taak_informatie.getElementsByTagName('input')) {
            e.setAttribute('disabled', true)
        }
        type.setAttribute('disabled', true)
        document.getElementById("submit_taak").setAttribute('disabled', true)
    }
}

function updateUI() {
    for (let element of document.getElementsByTagName("input")) { element.classList.add("white-text") }
    for (let element of document.getElementsByTagName("textarea")) { element.classList.add("white-text") }
    for (let element of document.getElementsByTagName("select")) { element.classList.add("white-text") }
    for (let element of document.getElementsByTagName("label")) {
        element.classList.add("white-text")
        element.classList.add("active")
    }
}
