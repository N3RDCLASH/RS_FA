const row = document.getElementsByClassName('col')[0]
const back_button = document.createElement("i")
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
row.appendChild(back_button)
back_button.addEventListener('click', () => { window.location = 'projecten.php' })
back_button.style.setProperty('display', 'inline-block', 'important')

let project_id = document.getElementById('project_informatie').dataset.id
document.addEventListener('DOMContentLoaded', selectProject(project_id))

function selectProject(id) {
    fetch(`../requests/get_project.php?id=${id}`).then(function (response) {
        return response.json()
    })
        .then(function (body) {
            // console.table(body)
            response = body
            showProject(body)
        });

    fetch(`../requests/get_taak.php?id=${id}`).then(function (response) {
        return response.json()
    })
        .then(function (body) {
            // console.table(body)
            response = body
            showTaak(body)
        });
}

// Display Project Data 
function showProject(data) {
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

// Display Taak Data
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
        selectList.innerHTML = ''
        for (var i = 0; i < body.length; i++) {
            var option = document.createElement("option");
            option.value = body[i].id;
            option.text = body[i].naam;
            selectList.appendChild(option);
            console.log(selectList)
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
