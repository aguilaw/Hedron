


<form class="forms" action ="index.php?page=pages&id=" method ="post" role="form">
    <label for="title">Title:</label>
    <input class="input" type="text" name="title" id="title" value="" placeholder="Title">
    <br>
    <label for="date">Date:</label>
    <input class="input" type="text" name="date" id="date" value="" placeholder="MM-DD-YYYY">
    <br>
    <label for="tools">Tools:</label>
    <input class="input" type="text" name="tools" id="tools" value="" placeholder="">
    <br>
    <label for="type">Type:</label>
    <input class="input" type="text" name="type" id="type" value="" placeholder="">
    <br>
    <label for="desc">Description:</label>
    <br>
    <textarea class="input"  name="desc" id="desc" rows="20" columns="40"></textarea>
    <br>
    <input class="" type="checkbox" name="featured" id="featured">
    Featured
    <hr>
    <label for="width">Width:</label>
        <input class="static-info" type="text" name="type" id="type" value="px" readonly>
    <label for="height">Height:</label>
        <input class="static-info" type="text" name="type" id="type" value="px" readonly>
    <br>
    <label for="width">File Size:</label>
        <input class="static-info" type="text" name="type" id="type" value="Kb" readonly>
    <label for="width">Extension:</label>
        <input class="static-info" type="text" name="type" id="type" value=".PNG" readonly>
</form>
