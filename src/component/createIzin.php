<div class="modal fade" id="createIzin" tabindex="-1" aria-labelledby="createIzinLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-2xl font-bold" id="createIzinLabel">Request Izin</h1>
      </div>
      <div class="modal-body">
        <form action="../controller/createIzin.php" method="post" id="createIzinForm" autocomplete="off" class="bg-light border p-3">
            <div class="form-floating">
                <label for="alasan">Alasan Izin: </label>
                <textarea class="form-control" placeholder="Input alasan disini" id="alasan" name="alasan"></textarea>
            </div>
            <div class="mb-3">
              <label for="startDate">Start Date:</label>
              <input type="date" id="startDate" name="startDate" class="form-control">
            </div>
            <div class="mb-3">
              <label for="endDate">End Date:</label>
              <input type="date" id="endDate" name="endDate" class="form-control">
            </div>
            <?php
                echo "<input type='text' name='username' id='username' value='$_SESSION[username]' hidden>"
            ?>
        </form>
      </div>
      <div class="modal-footer">
        <button  class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button  class="btn btn-primary bg-blue-600" type="submit" form="createIzinForm">Send Request</button>
      </div>
    </div>
  </div>
</div>