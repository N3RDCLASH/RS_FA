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
    selectType(data, type)
    refreshSelect(type)
    updateUI()
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
        // selectType(taak, type)
        refreshSelect(type)
        updateUI()
    } else if (editable == false) {
        for (let e of taak_informatie.getElementsByTagName('input')) {
            e.setAttribute('disabled', true)
        }
        for (let e of taak_informatie.getElementsByTagName('select')) {
            e.setAttribute('disabled', true)
        }
        for (let e of taak_informatie.getElementsByTagName('textarea')) {
            e.setAttribute('disabled', true)
        }
        type.setAttribute('disabled', true)
        document.getElementById("submit_taak").setAttribute('disabled', true)
    }
}

function refreshSelect(el) {
    let instance = M.FormSelect.getInstance(el)
    instance.destroy()
    el.classList.add('white-text')
    M.FormSelect.init(el)
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

/**
 * @param {object} data //
 * @param {HTMLElement} element // HTML select element
 */
function selectType(data, element) {
    typeValue = [...element.options].map(el => el.value)
    console.log(arguments)
    element.options[typeValue.findIndex(id => id == data.type)] ? element.options[typeValue.findIndex(id => id == data.type)].setAttribute('selected', true) : element.options[0].setAttribute("selected", true)
    element.options[typeValue.findIndex(id => id == data.type)] ? element.options[typeValue.findIndex(id => id == data.type)].classList.add('white-text') : element.options[0].classList.add("white-text")
}
