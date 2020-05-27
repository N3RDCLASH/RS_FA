<div id="modal1" class="modal dark-2">
    <div class="modal-content">
        <!-- form voor het maken van bestedingen -->
        <form action="../requests/create_bestedingen.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="row">
                <div class="input-field col s10 offset-s1">
                    <input id="besteding_naam" name="besteding_naam" type="text" class="validate" required>
                    <label class="white-text active" for="naam">Naam</label>
                </div>

                <div class="input-field col s10 offset-s1">
                    <select id="besteding_type" name="besteding_type">
                        <option value="" disabled selected>Type besteding</option>
                        <option class="" value="3">Dienst</option>
                        <option class="" value="4">Materiaal</option>
                    </select>
                </div>
                <div class="input-field col s10 offset-s1">
                    <textarea id="besteding_aantal" name="besteding_aantal" type="text" class="materialize-textarea validate"></textarea>
                    <label class="white-text active" for="aantal">Aantal</label>
                </div>
                <div class="input-field col s10 offset-s1">
                    <textarea id="besteding_prijs" name="besteding_prijs" type="text" class="materialize-textarea validate"></textarea>
                    <label class="white-text active" for="prijs">Prijs</label>
                </div>
                <div class="file-field col s10 offset-s1 input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" id="kwitantie_file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" id="kwitantie_link" name="kwitantie_link" type="text" placeholder="Upload one or more files">
                    </div>
                </div>

                <button class="btn waves-effect waves-light col s10 offset-s1 primary" type="submit" id="submit_besteding" value='test' name="save">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div>

            </div>
        </form>

    </div>
</div>

</div>

<div class="fixed-action-btn
    <a class=" green lighten-1 btn-floating btn-large waves-effect waves-light modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
</div>