const add_taak = document.getElementById('add_taak')
const back_button = document.createElement("i")
const row = document.getElementsByClassName('col')[0]
const taken_lijst = document.getElementById('taken_lijst')
const type = document.getElementById("type")
const edit = document.getElementById('edit')
const toggle = document.getElementById('switch')
const submit = document.getElementById('submit')
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
row.appendChild(back_button)

back_button.addEventListener('click', () => { window.location = 'projecten.php' })
back_button.style.setProperty('display', 'inline-block', 'important')

let project_id = document.getElementById('project_informatie').dataset.id
document.addEventListener('DOMContentLoaded', selectProject(project_id))

const inputs = document.getElementsByTagName('input')
const labels = document.getElementsByTagName('label')


// color all labesls & inputs white
for (const el of document.getElementsByTagName('textarea')) {
    el.classList.add("white-text")
}

for (const el of inputs) {
    el.classList.add("white-text")
}

for (const el of labels) {
    el.classList.add("white-text")
}


function selectProject(id) {
    fetch(`../requests/get_project.php?id=${id}`).then(function (response) {
        return response.json()
    })
        .then(function (body) {
            // console.table(body)
            response = body
            showProject(body)
        });
    showTaak()

    // selectDeelnemers(id);
}

async function selectTaken() {
    const taken = []

    response = await fetch(`../requests/get_taak_all.php?id=${project_id}`)
    const data = await response.json()

    for (const x of data) {
        let ss = []
        aa = await fetch(`../requests/get_deelnemers_per_taak.php?id=${x['taak_id']}`)
        deelnemers = await aa.json()
        ss.push(deelnemers)

        taken.push({
            'id': x.taak_id,
            'naam': x.naam,
            'omschrijving': x.omschrijving,
            'deelnemers': ss
        })

    }

    // console.log(await data)
    // window.alert(JSON.stringify(await data))
    return taken == [] ? console.log('leeg') : taken
}
// console.log(taken)

// Display Project Data 
async function showProject(data) {
    // alert(JSON.stringify(data))
    naam = document.getElementById('naam')
    omschrijving = document.getElementById('omschrijving')
    begin_datum = document.getElementById('begin_datum')
    eind_datum = document.getElementById('eind_datum')
    project_status = await fetch(`../requests/get_status.php?id=${project_id}`).then(res => res.json())

    if (project_status.status == "closed") {
        edit.classList.replace("primary-text", "grey-text")
        edit.removeEventListener("click", editFields)
    }

    const labels = document.querySelectorAll("label")
    labels.forEach(label => {
        label.classList.add('active')
    }
    )

    selectType(data, type)
    refreshSelect(type)

    //value assignment
    naam.value = data.naam
    omschrijving.value = data.omschrijving
    begin_datum.value = data.datum_start
    eind_datum.value = data.datum_eind
    project_status.status == "closed" ? toggle.checked = true : toggle.checked = false

}


let editable = false
// 
edit.addEventListener('click', editFields)
function editFields() {
    editable = !editable
    editable == true ? toggle.removeAttribute("disabled") : toggle.setAttribute("disabled", true)
    editable == true ? submit.removeAttribute("disabled") : submit.setAttribute("disabled", true)

}

/**
 * @param {object} data //
 * @param {HTMLElement} element // HTML select element
 */
function selectType(data, element) {
    typeValue = [...element.options].map(el => el.value)
    element.options[typeValue.findIndex(id => id == data.type)].setAttribute('selected', true)
    element.options[typeValue.findIndex(id => id == data.type)].classList.add('white-text')
}

/**
 * @param {HTMLElement} el // HTML select element
 */
function refreshSelect(el) {
    let instance = M.FormSelect.getInstance(el)
    instance.destroy()
    el.classList.add('white-text')
    M.FormSelect.init(el)
    document.getElementsByClassName("select-dropdown dropdown-trigger")[0].classList.add("white-text")
}





// Display Taak Data
async function showTaak() {
    const data = await selectTaken();
    // console.log(data)
    taken_lijst.innerHTML = ''
    data.forEach((taak, i) => {
        taken_lijst.innerHTML +=
            `<li>
        <div class="collapsible-header dark-1 white-text" > <i class="material-icons">check</i>${taak.naam}</div>
        <div class="collapsible-body dark-2 white-text">
        <span>
        ${taak.omschrijving}
        <div class='deelnemer_chips' >
        Deelnemers:
        <br>
        </div
        </span >
        <br>
    
        <a class="waves-effect waves-light btn btn-tiny right amber" href="view_taak.php?id=${taak.id}">View</a>
        </div >
        </li > `
        // window.alert(JSON.stringify(taak.deelnemers.length))
        // taak.deelnemers.forEach(deelnemer => console.log(deelnemer))
        // console.log(taak)
        instance = document.getElementsByClassName('deelnemer_chips')[i]
        // instance = M.Chips.getInstance(document.getElementById('chips'))
        console.log(instance)
        for (const deelnemer of taak.deelnemers[0]) {
            if (deelnemer.length > 1) {
                instance.innerHTML += `<div class="chip">${deelnemer}</div>`
            }

        }

    })
}
