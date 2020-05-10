const add_taak = document.getElementById('add_taak')
const back_button = document.createElement("i")
const row = document.getElementsByClassName('col')[0]
const taken_lijst = document.getElementById('taken_lijst')
const type = document.getElementById("type")
const edit = document.getElementById('edit')
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

    response = await fetch(`../requests/get_taak.php?id=${project_id}`)
    const data = await response.json()

    for (const x of data) {
        let ss = []
        aa = await fetch(`../requests/get_deelnemers_per_taak.php?id=${x['taak_id']}`)
        deelnemers = await aa.json()
        ss.push(deelnemers)

        taken.push({
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
    typeValue = []

    function findType(id) {
        return id == data.type
    }

    for (let x of type.options) {
        typeValue.push(x.value)
    }

    type.options[typeValue.findIndex(findType)].setAttribute('selected', true)
    type.options[typeValue.findIndex(findType)].classList.add('white-text')
    refreshSelect(type)


    //value assignment
    naam.value = data.naam
    omschrijving.value = data.omschrijving
    begin_datum.value = data.datum_start
    eind_datum.value = data.datum_eind
}


let editable = false
// 
edit.addEventListener('click', editFields)

async function editFields() {
    editable = !editable
    console.log(editable)
    if (editable == true) {
        for (let e of project_informatie.getElementsByTagName('input')) {
            e.removeAttribute('disabled')
        }
        document.getElementById("omschrijving").removeAttribute("disabled")
        type.removeAttribute('disabled')
        document.getElementById("submit").removeAttribute('disabled')
        refreshSelect(type)
    } else if (editable == false) {
        for (let e of project_informatie.getElementsByTagName('input')) {
            e.setAttribute('disabled', true)
        }
        type.setAttribute('disabled', true)
        document.getElementById("omschrijving").setAttribute("disabled", true)
        document.getElementById("submit").setAttribute('disabled', true)
    }

}


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

// Create Verantwoordelijke Option Select
add_taak.addEventListener('click', function () {
    fetch('../requests/get_deelnemers.php').then(res => {
        return res.json()
    }).then(body => {
        // console.log(body)
        var selectList = document.getElementById("taak_verantwoordelijke");
        //Create and append the options
        var instance = M.FormSelect.getInstance(selectList)
        instance.destroy()
        selectList.innerHTML = '<option value="" disabled>Selecteer de deelnemers</option>'

        for (var i = 0; i < body.length; i++) {
            var option = document.createElement("option");
            option.value = body[i].id;
            option.text = body[i].naam;
            selectList.appendChild(option);
            console.log(electList)
        }
        instance = M.FormSelect.init(selectList);
        // console.log(deelnemers)
    })
})

// Disable financial boxes
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

// Create New Taak + Display new taak (Form Handling)
document.getElementById('taken_form').addEventListener('submit', function (e) {

    e.preventDefault()
    // console.log('test')
    tform = document.forms['taken_form']
    const formdata = new FormData(tform);
    // console.log(verantwoordelijk)
    id = project_id
    fetch(`../requests/create_taak.php?id=${id}`, {
        method: 'POST',
        body: formdata
    }).then(res => {
        return res.text()
    }).then(data => {
        console.log(data)
        let elem = document.getElementById('modal1')
        var instance = M.Modal.getInstance(elem)
        instance.close()
        selectProject(id)

    })

})
