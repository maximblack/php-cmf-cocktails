<li><a href="{$url}?controller=cocktail&action=add">
        <img src="{$url}images/back.png">
        <span>Intoarcere Cocktail</span></a>
</li>
<li><a id="addIngridient" href="#">
        <img src="{$url}images/save.png">
        <span>Salveaza ingredient</span></a>
</li>
<script type="text/javascript">
    $(function() {

        $('#addIngridient').click(function() {

            $('#formAddIngridient').submit();

        });

    });
</script>