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
    setFirebase()
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

function setFirebase() {
    var firebaseConfig = {
        apiKey: "AIzaSyBv0KfIa5wG2RwuouIjToNyr77Vj-9D4oM",
        authDomain: "rs-fa-1eb3d.firebaseapp.com",
        databaseURL: "https://rs-fa-1eb3d.firebaseio.com",
        projectId: "rs-fa-1eb3d",
        storageBucket: "rs-fa-1eb3d.appspot.com",
        messagingSenderId: "742635924180",
        appId: "1:742635924180:web:fc94ccb78e9d05bf606941",
        measurementId: "G-K3PSD88XWJ"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
}

function uploadFile() {
    const storageRef = firebase.storage().ref();
    let file = document.getElementById("kwitantie_file").files[0]

    document.getElementsByClassName("file-path-wrapper")[0].innerHTML +=
        `
    <div class="progress">
        <div class="determinate" id="load_percentage" style="width: 0%"></div>
    </div>`

    uploadTask = storageRef.child(file.name).put(file)

    uploadTask.on('state_changed', (snapshot) => {
        let progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100
        document.getElementById('load_percentage').style.width = `${progress}%`
    },
        error => console.log(error),
        () => {
            console.log("Upload succesvol")
            uploadTask.snapshot.ref.getDownloadURL().then((downloadURL) => {
                document.getElementById("kwitantie_link").value = downloadURL
                document.forms[2].submit();
            });
        })
}

document.getElementById("submit_besteding").addEventListener("click", (e) => {
    e.preventDefault()
    uploadFile()
})

async function showKwitantie(id) {
    data = await fetch(`../requests/get_besteding.php?id=${id}`).then(res => res.json())
    console.log(data)
    document.getElementById("kwitantie_naam").value = data[0].naam
    document.getElementById("kwitantie_type").value = data[0].type
    document.getElementById("kwitantie_aantal").value = data[0].aantal
    document.getElementById("kwitantie_prijs").value = data[0].prijs
    data[0].kwitantie.length !== 0 ? document.getElementById("kwitantie_img").src = data[0].kwitantie : document.getElementById("kwitantie_img").style.display = "none"

}

