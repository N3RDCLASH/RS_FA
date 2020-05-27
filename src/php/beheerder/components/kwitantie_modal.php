<div id="modal2" class="modal dark-2">
    <div class="modal-content">
        <!-- form voor het maken van kwitantie -->
        <h4 class="white-text center">Kwitantie</h4>
        <form action="../requests/.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="row">
                <div class="input-field col s10 offset-s1">
                    <input id="kwitantie_naam" name="kwitantie_naam" type="text" class="validate" required>
                    <label class="white-text active" for="naam">Naam</label>
                </div>

                <div class="input-field col s10 offset-s1">
                    <select id="kwitantie_type" name="kwitantie_type">
                        <option value="" disabled selected>Type kwitantie</option>
                        <option class="" value="3">Dienst</option>
                        <option class="" value="4">Materiaal</option>
                    </select>
                </div>
                <div class="input-field col s10 offset-s1">
                    <textarea id="kwitantie_aantal" name="kwitantie_aantal" type="text" class="materialize-textarea validate"></textarea>
                    <label class="white-text active" for="aantal">Aantal</label>
                </div>
                <div class="input-field col s10 offset-s1">
                    <textarea id="kwitantie_prijs" name="kwitantie_prijs" type="text" class="materialize-textarea validate"></textarea>
                    <label class="white-text active" for="prijs">Prijs</label>
                </div>
                <div class="input-field col s10 offset-s1"></div>
                <table>
                    <td>
                        <img class="materialboxed" id="kwitantie_img" width="650" src="">
                    </td>
                </table>

                <button class="btn waves-effect waves-light col s10 offset-s1 primary" type="submit" id="submit_kwitantie" value='test' name="save">Verzenden
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div>

            </div>
        </form>

    </div>
</div>

</div>