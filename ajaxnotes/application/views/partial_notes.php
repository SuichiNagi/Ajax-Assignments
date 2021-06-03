<?php 
    foreach($notes as $note)
    { ?>
    <div class="notes">
        <h3><?= $note['title']; ?></h3>
        <form class="update_note" action="/notes/update/<?= $note['id']; ?>" method="post">
            Description <textarea name="description"><?= $note["description"]; ?></textarea>
        </form>
        <form class="remove_note" action="/notes/remove/<?= $note['id']; ?>" method="post">
        <input class="btn remove" type="submit" value="Remove Note">
        </form>
    </div>
<?php 
    } ?>