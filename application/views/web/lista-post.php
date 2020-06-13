<!--TABLA/LISTADO DE POST-->
<div class="container">
<div class="row mt-4">
    <div class="col-12 col-md-5 text-center">
      <h1 class="">Listado de posts</h1>
    </div>
    <div class="col-12 col-md-3 text-center">
      <a href="/nuevo-post" class="btn btn-primary">Crear un nuevo post</a>
    </div>
    <div class="col-12 col-md-4">
      <form class="form-inline my-2 my-lg-0 justify-content-center">
        <input class="form-control mr-sm-2 mb-sm-2" type="text" placeholder="Buscar...">
        <button class="btn btn-primary my-2 my-sm-0 mb-md-2" type="submit">Búsqueda</button>
      </form>
    </div>
  </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <?php
                    if (isset($posts)) {

                    ?>
                        <thead class="thead-dark">
                            <tr>
                                <th class="th-sm">Imagen</th>
                                <th class="th-sm">Título</th>
                                <th class="th-sm">Creador</th>
                                <th class="th-sm">Descripción</th>
                                <th class="th-sm">Meta descripción</th>
                                <th class="th-sm">Última modificación</th>
                                <th class="th-sm">Visitas</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($posts as $post) {

                            //Se filtran algunos valores clave
                            if ($post['estado'] == "1") {
                                $abierto = "<img src='/images/activo.png'  width=20px>";
                            } else {
                                $abierto = "<img src='/images/no_activo.png' width=20px>";
                            }

                            //Se procesan los datos recibidos
                            $id = $post['id_post'];
                            $titulo = $post['titulo'];
                            $contenido = strlen($post['contenido']) > 60 ? substr($post['contenido'], 0, 60) . "..." : $post['contenido'];
                            $imagen = $post['imagen_post'];
                            $modificado = $post['modificado'];
                            $activo = $post['estado'] == 1 ? 'Activo' : 'Cerrado';
                            $link = $post['slug'];
                            $visitas = $post['visitas'];
                            $username = $post['username'];
                            $id_usuario = $post['id_usuario'];
                            
                            //Y se muestran en forma de tabla
                            echo "<tr id=\"" . $id . "\">
                            <td><img src=\"/images/" . $imagen . "\"  width=\"200px\"></td>
                            <td><a href=\"/post/" . $id . "\">" . $titulo . "</a></td>
                            <td><a href=\"/usuario/" . $id_usuario . "\">" . $username . "</a></td>
                            <td>" . $contenido . " </td>
                            <td><a href=\"post/" . $id . "\">$link</a></td>
                            <td>" . $modificado . " </td>
                            <td class=\"text-center\">" . $visitas . "</td>
                            </tr>";
                        }
                    } else {
                        echo isset($resultado) ? $resultado : '';
                    }
                        ?>
                        </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- /.row -->

</div>