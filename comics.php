<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Comic extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
}

/* Obtención de la lista de tebeos */

$app->get('/comics', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de tebeos

    // Obtenemos la lista de tebeos de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $pelis = json_decode(\Comic::all());

    // Mostramos la vista
    return $this->view->render($res, 'comiclist_template.php', [
        'items' => $pelis
    ]);
})->setName('comics');


/*  Obtención de un tebeo en concreto  */
$app->get('/comics/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con el tebeo pasada como parámetro

    // Obtenemos el tebeo de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \Comic::find($args['name']);  
    $peli = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'comic_template.php', [
        'item' => $peli
    ]);

});

//Borrar tebeo
$app->delete('/comics/{name}', function ($req, $res, $args) {
    //Le pasamos la variable para que la encuentre
    $peli = Comic::find($args['name']);
    //Borramos la tebeo encontrada
    $peli->delete();
});

//Guardar nueva tebeo
$app->post('/comics', function ($req, $res, $args)  {
    $template = $req->getParsedBody();

    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $description = $datos[$i]['value'];
            break;
        case "writer":
            $writer = $datos[$i]['value'];
            break;
        case "painter":
            $painter = $datos[$i]['value'];
            break;
        case "datePublished":
            $datePublished = $datos[$i]['value'];
            break;
        }
    }
    $nueva_comic = new Comic;
    $nueva_comic['name'] = $name;
    $nueva_comic['description'] = $description;
    $nueva_comic['writer'] = $writer;
    $nueva_comic['painter'] = $painter;
    $nueva_comic['datePublished'] = $datePublished;

    $nueva_comic->save();
});
//Actualizar tebeo
$app->put('/comics/{id}', function ($req, $res, $args) {
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $description = $datos[$i]['value'];
            break;
        case "writer":
            $writer = $datos[$i]['value'];
            break;
        case "painter":
            $painter = $datos[$i]['value'];
            break;
        case "datePublished":
            $datePublished = $datos[$i]['value'];
            break;
        }
    }
  
    $nueva_comic = Comic::find($args['id']);
    $nueva_comic['name'] = $name;
    $nueva_comic['description'] = $description;
    $nueva_comic['writer'] = $writer;
    $nueva_comic['painter'] = $painter;
    $nueva_comic['datePublished'] = $datePublished;
  
    $nueva_comic->save();

});

?>
