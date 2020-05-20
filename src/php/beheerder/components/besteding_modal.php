<div id="modal1" class="modal dark-2">
    <div class="modal-content">
        <form action="" method="post" name="taken_form" id="taken_form">
            <div class="row">
                <div class="input-field col s10 offset-s1">
                    <input id="taak_naam" name="taak_naam" type="text" class="validate" required>
                    <label class="white-text active" for="taak_naam">Naam</label>
                </div>
                <div class="input-field col s10 offset-s1">
                    <textarea id="taak_omschrijving" name="taak_omschrijving" type="text" class="materialize-textarea validate" required></textarea>
                    <label class="white-text active" for="taak_omschrijving">Omschrijving</label>
                </div>
                <div class="input-field col s10 offset-s1">
                    <select id="type_taak" name="type_taak">
                        <option value="" selected disabled>Type Taak</option>
                        <option class="" value="3">Uitvoering</option>
                        <option class="" value="4">UItgave</option>
                    </select>
                </div>
                <div class="input-field col s10 offset-s1">
                    <textarea id="taak_aantal" name="taak_aantal" type="text" class="materialize-textarea validate"></textarea>
                    <label class="white-text active" for="taak_aantal">Aantal</label>
                </div>
                <div class="input-field col s10 offset-s1">
                    <textarea id="taak_prijs" name="taak_prijs" type="text" class="materialize-textarea validate"></textarea>
                    <label class="white-text active" for="taak_prijs">Prijs</label>
                </div>

                <button class="btn waves-effect waves-light col s10 offset-s1 primary" type="submit" id="submit_taak" value='test' name="opslaan">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>


        </form>
    </div>
</div>

<div class="fixed-action-btn">
    <a class=" green lighten-1 btn-floating btn-large waves-effect waves-light modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
</div>