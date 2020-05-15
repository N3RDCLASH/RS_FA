const back_button = document.createElement("i")
const row = document.getElementsByClassName('col')[0]
const edit = document.getElementById('edit')
back_button.className = 'material-icons small white-text back'
back_button.innerHTML = 'arrow_back';
back_button.id = 'back_button'
row.appendChild(back_button)

back_button.addEventListener('click', () => { window.location = `view_project.php?id=${taak[0].project_id}` })
back_button.style.setProperty('display', 'inline-block', 'important')

// id's
let taak
taak_id = document.getElementsByTagName('body')[0].dataset.id



document.addEventListener("DOMContentLoaded", async function () {
    taak = await fetch(`../requests/get_taak.php?id=${taak_id}`).then(res => res.json())
    console.log(taak)
})