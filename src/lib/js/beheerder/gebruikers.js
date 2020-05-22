const back_button = document.createElement("i")
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
back_button.onclick = showTable
const gebruikers_form = document.getElementById('gebruikers')
const gebruikers_table = document.getElementById('gebruikers_table')
const row = document.getElementsByClassName('col')[0]
row.appendChild(back_button)


let x = document.getElementsByTagName('input')

for (const el of x) {
    el.classList.add("white-text")
}

gebruikers_form.childNodes[1].addEventListener('submit', function (e) {
    if (document.getElementsByName('gebruikers_password1')[0].value == document.getElementsByName('gebruikers_password2')[0].value) {
        // gebruikers_form.childNodes[1].submit()
    } else {
        e.preventDefault()
        console.log('fail')
        M.toast({ html: 'Passwords do not match!' })

    }
})
function showForm() {
    instance = M.FormSelect.init(document.getElementById('gebruikers_type'))
    gebruikers_form.style.display = 'block';
    gebruikers_form.classList.toggle('flip-in-ver-right', true)
    gebruikers_table.style.display = 'none';
    // search.style.display = 'none';
    back_button.style.setProperty('display', 'inline-block', 'important')
}

function showTable() {
    gebruikers_table.style.display = 'table'
    gebruikers_table.classList.toggle('flip-in-ver-right', true)
    gebruikers_form.style.display = 'none'
    back_button.style.display = 'none'
}


