const back_button = document.createElement("i")
const edit = document.getElementById('edit')
const taak_informatie = document.getElementById("deelnemer_informatie")
const row = document.getElementsByClassName('col')[0]
const type = document.getElementById("deelnemers_type")
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
row.appendChild(back_button)


deelnemer_id = document.getElementsByTagName('body')[0].dataset.id

back_button.addEventListener('click', () => { window.location = `deelnemers.php` })
back_button.style.setProperty('display', 'inline-block', 'important')


edit.addEventListener('click', editFields)

document.addEventListener("DOMContentLoaded", async function () {
    updateUI()
    deelnemer = await fetch(`../requests/get_deelnemer.php?id=${deelnemer_id}`).then(res => res.json())
    displayDeelnemer(deelnemer[0])
})




let editable = false

async function editFields() {
    editable = !editable
    console.log(editable)
    if (editable == true) {
        for (let e of taak_informatie.getElementsByTagName('input')) {
            e.removeAttribute('disabled')
        }
        type.removeAttribute('disabled')
        document.getElementById("submit").removeAttribute('disabled')
        refreshSelect(type)
        updateUI()
    } else if (editable == false) {
        for (let e of taak_informatie.getElementsByTagName('input')) {
            e.setAttribute('disabled', true)
        }
        type.setAttribute('disabled', true)
        document.getElementById("submit").setAttribute('disabled', true)
    }
}

function displayDeelnemer(data) {
    console.log(data)
    document.getElementById("deelnemers_naam").value = data.naam
    document.getElementById("deelnemers_email").value = data.email
    selectType(data, type)
    document.getElementById("deelnemers_adres").value = data.adres
    document.getElementById("deelnemers_telefoonnummer").value = data.telefoon
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

//refresh the slect input 
function refreshSelect(el) {
    let instance = M.FormSelect.getInstance(el)
    instance.destroy()
    el.classList.add('white-text')
    M.FormSelect.init(el)
}

function selectType(data, element) {
    typeValue = [...element.options].map(el => el.value)
    element.options[typeValue.findIndex(id => id == data.type)].setAttribute('selected', true)
    element.options[typeValue.findIndex(id => id == data.type)].classList.add('white-text')
}