const back_button = document.createElement("i")
const change_pass = document.getElementById('change_pass')
const taak_informatie = document.getElementById('gebruiker_informatie')

const gebruiker_id = taak_informatie.dataset.id
const inputs = document.getElementsByTagName('input')
const path2 = "/html/body/div[2]/div/div[1]/form/div[2]/div/input"
const row = document.getElementsByClassName('col')[0]
const type = document.getElementById("type")
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'

row.appendChild(back_button)
back_button.addEventListener('click', () => { window.location = 'gebruikers.php' })
back_button.style.setProperty('display', 'inline-block', 'important')


// color all labesls & inputs white
for (const el of inputs) {
    el.classList.add("white-text")
}

const labels = document.getElementsByTagName('label')

for (const el of labels) {
    el.classList.add("white-text")
}



// Insert Gebruiker Data into form
document.addEventListener("DOMContentLoaded", async function () {
    naam = document.getElementById('naam')
    password1 = document.getElementById('password1')
    password2 = document.getElementById('password2')
    password1.parentNode.style.display = 'none'
    password2.parentNode.style.display = 'none'

    data = await fetch(`../requests/get_gebruiker.php?id=${gebruiker_id}`).then(res => res.json())
    naam.value = data.naam

    // Select correct input value 
    selectType(data, type)

    refreshSelect(type)


    document.evaluate(path2, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue.classList.add('white-text')

})

/**
 * @param {object} data //
 * @param {HTMLElement} element // HTML select element
 */
function selectType(data, element) {
    typeValue = [...element.options].map(el => el.value)
    type.options[typeValue.findIndex(id => id == data.type)].setAttribute('selected', true)
    type.options[typeValue.findIndex(id => id == data.type)].classList.add('white-text')
}

let editable = false

// edit gebruiker
document.getElementById('edit').addEventListener('click', () => {
    editable = !editable
    console.log(editable)
    if (editable == true) {
        for (let e of taak_informatie.getElementsByTagName('input')) {
            if (e.type === "password") {

            } else {
                e.removeAttribute('disabled')
            }
        }
        type.removeAttribute('disabled')
        document.getElementById("submit").removeAttribute('disabled')
        refreshSelect(type)
    } else if (editable == false) {
        if (change_pass.checked) {
            change_pass.click()
        }
        for (let e of taak_informatie.getElementsByTagName('input')) {
            e.setAttribute('disabled', true)
        }
        type.setAttribute('disabled', true)
        document.getElementById("submit").setAttribute('disabled', true)
    }


})

//refresh the slect input 
function refreshSelect(el) {
    let instance = M.FormSelect.getInstance(el)
    instance.destroy()
    el.classList.add('white-text')
    M.FormSelect.init(el)
    document.evaluate(path2, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue.classList.add('white-text')
}

//Check if passwords match
taak_informatie.childNodes[1].addEventListener('submit', function (e) {
    // console.log('help' + e)
    if (change_pass.checked) {
        if (password1.value == password2.value) {
            confirm("Are you sure you want to update this password?") ? console.log("not canceled") : e.preventDefault()
        } else {
            e.preventDefault()
            M.toast({ html: 'Passwords do not match!' })

        }
    }

})

//check if change_pass is checked
change_pass.addEventListener('click', () => {
    if (change_pass.checked) {
        password1.parentNode.style.display = 'block'
        password2.parentNode.style.display = 'block'
        password1.removeAttribute('disabled')
        password2.removeAttribute('disabled')
        password1.value = ''
        password2.value = ''

    }
    else {
        password1.parentNode.style.display = 'none'
        password2.parentNode.style.display = 'none'
        password1.setAttribute('disabled', true)
        password2.setAttribute('disabled', true)
        password1.value = "************"
        password2.value = "************"

    }
})