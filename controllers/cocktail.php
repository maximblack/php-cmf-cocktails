<?php

class Controller_Cocktail extends Controller {

    public function index() {
        
    }

    public function add_tag() {



        if (!empty($_POST)) {

            $tagName = empty($_POST['tagName']) ? '' : $_POST['tagName'];

            new Query("INSERT INTO `tags` (`name`) VALUES ('$tagName')");
        }


        $tags = new Query("SELECT * FROM `tags` LIMIT 0, 1000");
        $tags = $tags->asArray();

        $tagsOutput = '';

        foreach ($tags as $tag) {

            $templateIngridient = new Template('addtag/tag');
            $templateIngridient->setArray(array(
                'name' => $tag['name'],
            ));
            $tagsOutput .= $templateIngridient;
        }

        $templateContent = new Template('addtag/content');
        $templateContent->setVariable('tags', $tagsOutput);

        $templateMenu = new Template('addtag/menu');

        parent::$template->setVariable('menu', $templateMenu);
        parent::$template->setVariable('content', $templateContent);
        parent::setTitle('Add tag');
        parent::outputHtml();
    }

    public function add_ingridient() {

        if (!empty($_POST)) {

            $ingridientName = empty($_POST['ingridientName']) ? '' : $_POST['ingridientName'];

            new Query("INSERT INTO `ingridients` (`name`) VALUES ('$ingridientName')");
        }


        $tags = new Query("SELECT * FROM `ingridients` LIMIT 0, 1000");
        $tags = $tags->asArray();

        $tagsOutput = '';

        foreach ($tags as $tag) {

            $templateIngridient = new Template('addingridient/ingridient');
            $templateIngridient->setArray(array(
                'name' => $tag['name'],
            ));
            $tagsOutput .= $templateIngridient;
        }

        $templateContent = new Template('addingridient/content');
        $templateContent->setVariable('ingridients', $tagsOutput);

        $templateMenu = new Template('addingridient/menu');

        parent::$template->setVariable('menu', $templateMenu);
        parent::$template->setVariable('content', $templateContent);
        parent::setTitle('Add ingridient');
        parent::outputHtml();
    }

    // Add cocktail
    public function add() {

        // Variabila pentru errori...
        $infoOutput = '';

        // If utilizatorul adauga cocktail
        if (!empty($_POST)) {

            $errors = array();

            // Daca utilizatorul nu a introdus numele cocktail-ui anuntam despre asta
            if (!empty($_POST['cocktailName']))
                $cocktailName = $_POST['cocktailName'];
            else
                $errors['cocktailName'] = 'Dati un nume pentru Cocktail';

            if (!empty($_POST['cocktailDescription']))
                $cocktailDescription = $_POST['cocktailDescription'];
            else
                $errors['cocktailDescription'] = 'Dati o descriere pentru Cocktail';

            if (!empty($_FILES['cocktailImage']['name'])) {
                $cocktailImage = $_FILES['cocktailImage']['name'];
                // Mutam imaginea uploadata in mapa 'cocktails'
                move_uploaded_file($_FILES["cocktailImage"]["tmp_name"], Url::getInstance()->fullPath . 'cocktails/' . $cocktailImage);
            }
            else
                $errors['cocktailImage'] = 'Selectati imaginea';

            if (!empty($_POST['ingridients_id']))
                $ingridients_id = $_POST['ingridients_id'];
            else
                $errors['ingridients_id'] = 'Selectati unul sau mai multe ingrediente';

            if (!empty($_POST['tags_id']))
                $tags_id = $_POST['tags_id'];
            else
                $errors['tags_id'] = 'Selectati unul sau mai multe tag-uri';

            // Daca nu sunt erori introducem in bd
            if (empty($errors)) {

                $query = new Query("INSERT INTO `cocktails` (`nume`, `imagine`, `descriere`) VALUES ('$cocktailName', '$cocktailImage', '$cocktailDescription')");

                $cocktailId = $query->insertId;

                foreach ($_POST['ingridients_id'] as $ingridient_id) {
                    new Query("INSERT INTO `cocktails_ingridients` (`cocktail_id`,`ingridient_id`) VALUES ('$cocktailId','$ingridient_id')");
                }

                foreach ($_POST['tags_id'] as $tag_id) {
                    new Query("INSERT INTO `cocktails_tags` (`cocktail_id`,`tag_id`) VALUES ('$cocktailId','$tag_id')");
                }

                // Afisam adaugarea cu success a cocktail
                $templateSuccess = new Template('success');

                $templateSuccess->setVariable('text', $cocktailName . ' was added');

                $infoOutput = $templateSuccess;
            } else {

                // Construim afisarea errorilor
                $infoOutput = $this->build_errors($errors);
            }
        }

        // Template...


        $templateContent = new Template('addcocktail/content');

        $templateContent->setVariable('infoOutput', $infoOutput);
        
        $templateContent->setVariable('ingridients', self::build_ingridients());

        $templateContent->setVariable('tags', self::build_tags());


        $templateMenu = new Template('addcocktail/menu');


        parent::$template->setVariable('content', $templateContent);

        parent::$template->setVariable('menu', $templateMenu);


        parent::setTitle('Add cocktail');

        parent::outputHtml();
    }

    public function view_cocktail() {
        $id = Url::getInstance()->getItem('id');
        $query = new Query('SELECT `nume`,`imagine`,`descriere`  FROM `cocktails`WHERE id=' . $id);
        $cocktails = $query->asArray();

        $templateContent = new Template('viewCocktail/content');

        $templateContent->setVariable('tags', self::build_tags($id));
        $templateContent->setVariable('ingridients', self::build_ingridients($id));

        $templateContent->setVariable('nume', $cocktails[0]['nume']);
        $templateContent->setVariable('imagine', $cocktails[0]['imagine']);
        $templateContent->setVariable('descriere', $cocktails[0]['descriere']);
        parent::$template->setVariable('content', $templateContent);
        parent::$template->setVariable('menu', new Template('viewCocktail/menu'));
        parent::setTitle('Viewing cocktail');
        parent::outputHtml();
    }

    public function edit_cocktail() {
        parent::outputHtml();
    }

    // Construim html tagurilor
    public static function build_tags($id = null, $limit = 1000) {

        if ($id != null)
            $query = "SELECT tags.`name`, tags.`id` FROM cocktails_tags INNER JOIN tags ON cocktails_tags.tag_id = tags.id WHERE cocktails_tags.cocktail_id = $id LIMIT 0, $limit";
        else
            $query = "SELECT `id`, `name` FROM `tags` LIMIT 0, $limit";

        $tags = new Query($query);

        $tags = $tags->asArray();

        $tagsOutput = '';

        foreach ($tags as $tag) {

            $templateTag = new Template('addcocktail/tag');

            $templateTag->setArray(array(
                'name' => $tag['name'],
                'id' => $tag['id'],
            ));

            $tagsOutput .= $templateTag;
        }

        return $tagsOutput;
    }

// Construim html ingridientelor
    public static function build_ingridients($id = null, $limit = 1000) {

        if ($id != null)
            $query = "SELECT ingridients.`name`, ingridients.`id` FROM cocktails_ingridients INNER JOIN ingridients ON cocktails_ingridients.ingridient_id = ingridients.id WHERE cocktails_ingridients.cocktail_id = $id LIMIT 0, $limit";
        else
            $query = "SELECT `id`, `name` FROM `ingridients` LIMIT 0, $limit";

        $ingridients = new Query($query);

        $ingridients = $ingridients->asArray();

        $ingridientsOutput = '';

        foreach ($ingridients as $ingridient) {

            $templateIngridient = new Template('addcocktail/ingridient');

            $templateIngridient->setArray(array(
                'name' => $ingridient['name'],
                'id' => $ingridient['id'],
            ));

            $ingridientsOutput .= $templateIngridient;
        }

        return $ingridientsOutput;
    }

    public static function build_errors($errors) {

        $errorsOutput = '';

        foreach ($errors as $error) {

            $templateError = new Template('error');

            $templateError->setVariable('error', $error);

            $errorsOutput .= $templateError;
        }

        return $errorsOutput;
    }

}

?>