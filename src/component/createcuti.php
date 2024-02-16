<div class="modal fade" id="createcuti" tabindex="-1" aria-labelledby="createcutiLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-2xl font-bold" id="createcutiLabel">Request cuti</h1>
      </div>
      <div class="modal-body">
        <form action="../controller/createcuti.php" method="post" id="createcutiForm" autocomplete="off" class="bg-light border p-3">
            <div class="form-floating">
                <label for="alasan">Alasan cuti: </label>
                <textarea class="form-control" placeholder="Input alasan disini" id="alasan" name="alasan"></textarea>
            </div>
            <?php
                echo "<input type='text' name='username' id='username' value='$_SESSION[username]' hidden>"
            ?>
        </form>
      </div>
      <div class="modal-footer">
        <button  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button  class="btn btn-primary" type="submit" form="createcutiForm">Send Request</button>
      </div>
    </div>
  </div>
</div>