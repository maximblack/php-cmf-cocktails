<li><a href="{$url}?controller=cocktail&action=add">
        <img src="{$url}images/back.png">
        <span>Intoarcete la cocktail</span></a>
</li>
<li><a id="addTag" href="#">
        <img src="{$url}images/save.png">
        <span>Salveaza tag</span></a>
</li>
<script type="text/javascript">
    $(function() {

        $('#addTag').click(function() {

            $('#formAddTag').submit();

        });

    });
</script>