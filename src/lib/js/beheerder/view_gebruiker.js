const back_button = document.createElement("i")
const row = document.getElementsByClassName('col')[0]
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
row.appendChild(back_button)


let x = document.getElementsByTagName('input')

for (const el of x) {
    el.classList.add("white-text")
}

let y = document.getElementsByTagName('label')

for (const el of y) {
    el.classList.add("white-text")
}

let gebruiker_id = document.getElementById('gebruiker_informatie').dataset.id

document.addEventListener("DOMContentLoaded", async function () {
    naam = document.getElementById('naam')
    naam = document.getElementById('naam')
    password1 = document.getElementById('password1')
    password2 = document.getElementById('password2')

    data = await fetch(`../requests/get_gebruiker.php?id=${gebruiker_id}`).then(res => res.json())
    naam.value = data.naam
    typeValue = []

    function findType(id) {
        return id == data.type
    }

    for (let x of type.options) {
        typeValue.push(x.value)
    }

    type.options[typeValue.findIndex(findType)].setAttribute('selected', true)
    type.options[typeValue.findIndex(findType)].classList.add('white-text')
    var instance = M.FormSelect.getInstance(type)
    instance.destroy()
    password1.value = "************"
    password2.value = "************"
    instance = M.FormSelect.init(type)

    path = "/html/body/div[2]/div/div[1]/div[2]/div/input"
    document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue.classList.add('white-text')
})