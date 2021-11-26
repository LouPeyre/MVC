<?php

class GenreController
{

    public static function listGenre()
    {
        $genres=Genre::ReadAll();
        include VIEWS.'genre/listGenre.php';
    }

    public static function addGenre()
    {
        if (isset($_GET['id'])) :
            $genre=Genre::find([
                'id'=>$_GET['id']
            ]);

            // die(var_dump($genre));
        endif;

        if (!empty($_POST)) :

            // die(var_dump($_POST));

                Genre::Insert([
                    'id'=>$_POST['id'],
                    'name'=>$_POST['name']
                ]);

                $_SESSION['messages']['success'][]='Genre édité avec succès';
                header('location:../genre/list');
                exit(); 
        endif;

        include VIEWS.'genre/addGenre.php';
    }

    public static function deleteGenre()
    {
        Genre::delete(['id'=>$_GET['id']]);
        
        $_SESSION['messages']['success'][]='Genre supprimé avec succès';
        header('location:../genre/list');
        exit(); 
    }

}