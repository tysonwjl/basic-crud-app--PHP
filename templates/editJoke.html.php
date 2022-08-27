<form action="editJoke.php" method="post">
    <div class="mb-3">
        <label for="jokeEntry" class="form-label">Please enter the update joke below</label>
        <textarea class="form-control" id='jokeEntryUpdate' rows="3" name='jokeEntryUpdate'></textarea>
    </div>
    <div class="col-12">
    <input type="hidden" name="id2" value="<?=$id2?>">
        <input class="btn btn-primary" type="submit" name="edit" value="Edit"></input>
    </div>
    </form>