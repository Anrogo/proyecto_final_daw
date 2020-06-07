<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('BackEndModel', 'BackEndModel');
	}

	public function index()
	{

		/* El inicio de sesión se verifica en la funcion comprobar_login(), ubicada en utiles_helper */
		$datos = comprobar_login();

		if (!empty($datos) && $datos['rol'] == 'administrador') {
			$vista = array(
				'vista' => 'admin/index.php',
				'params' => $datos,
				'layout' => 'ly_admin.php',
				'titulo' => 'Inicio',
			);

			$this->layouts->view($vista);

		} else { //si no se consigue verificar correctamente, te manda al inicio
			header("Location: /");
		}
	}

	public function panel_control()
	{
		$datos = comprobar_login();

		if (!empty($datos) && $datos['rol'] == 'administrador') {
			$vista = array(
				'vista' => 'admin/listados.php',
				'params' => $datos,
				'layout' => 'ly_admin.php',
				'titulo' => 'Administración',
			);
			$this->layouts->view($vista);

		} else {
			header("Location: /error ");
		}
	}

	public function perfil_admin()
	{
		$datos = comprobar_login();

		if (!empty($datos) && $datos['rol'] == 'administrador') {
			//debug($datos);

			$vista = array(
				'vista' => 'admin/perfil_admin.php',
				'params' => $datos,
				'layout' => 'ly_session.php',
				'titulo' => 'Usuario logueado',
			);

			$this->layouts->view($vista);

		} else {

			header("Location: /error ");
		}
	}

	public function listado_juegos()
	{
		//Leemos los datos recibidos en formato json
		$json = file_get_contents('https://videojuegos.fandom.com/api/v1/Search/List?query=dead&limit=10&minArticleQuality=10&batch=1&namespaces=0%2C14');

		//Se "decodifican" del formato json y se almacenan en un array, los "items" que básicamente es el array que contiene los datos sobre los videojuegos
		$juegos = json_decode($json, true);

		//Se almacenan los datos en el array para pasarselo a la vista que corresponda
		$datos = array(
			'juegos' => $juegos['items'],
		);
		//debug($datos);
		$verif = comprobar_login();

		if (!empty($verif) && $verif['rol'] == 'administrador') {
			$datos['rol'] = $verif['rol'];
			$vista = array(
				'vista' => 'admin/listado-videojuegos.php',
				'params' => $datos,
				'layout' => 'ly_admin.php',
				'titulo' => 'Videojuegos - Admin'
			);

			$this->layouts->view($vista);
		} else {

			$vista = array(
				'vista' => 'web/listado-videojuegos.php',
				'params' => $datos,
				'layout' => 'ly_home.php',
				'titulo' => 'Videojuegos'
			);

			$this->layouts->view($vista);
		}
	}

	public function listado_usuarios()
	{
		$datos = comprobar_login();
		if (!empty($datos) && $datos['rol'] == 'administrador') {

			$info = $this->BackEndModel->Lista('usuarios','id_usuario');
			//debug($info);
			$datos = array(
				'usuarios' => $info
			);

			$vista = array(
				'vista' => 'admin/listado_usuarios.php',
				'params' => $datos,
				'layout' => 'ly_admin.php',
				'titulo' => 'Usuarios',
			);

			$this->layouts->view($vista);

		} else {

			header("Location: /error ");
		}
	}
	/*
	public function registro_usuario()
	{

		$datos = array();

		$vista = array(
			'vista' => 'admin/nuevo_usuario.php',
			'params' => $datos,
			'layout' => 'ly_admin.php',
			'titulo' => 'Añadir nuevo usuario',
		);

		$this->layouts->view($vista);
	}

	public function registrar_nuevo_usuario()
	{
		foreach ($_POST as $key => $value) {
			$datos[$key] = $value;
		}
		//debug($datos);

		if ($datos['password'] == $datos['password_confirm']){
			//Es necesario pasar la contraseña cifrada previamente, así que utilizamos la función md5 para cifrarla
			$datos['password'] = md5($datos['password']);
			unset($datos['password_confirm']);
		}
		
		//$datos['password'] = md5($datos['password']);
		
		//debug($datos);
		
		$this->BackEndModel->insert('usuarios', $datos);

		header('Location: /admin/panel-control/usuarios');
	}

	public function usuario_existente($username,$email)
	{
		//$info = $this->BackEndModel->Lista('usuarios');

	}

	public function editar_admin()
	{
		//Se extrae el id de la uri y se manda a la base de datos para que devuelva su registro
		$info = $this->BackEndModel->ListarUsuario($this->uri->segment(2));

		$datos = array(
			//se carga como el "apartado" data para evitar problemas en el archivo desde donde se visualizan los datos
			'usuarios' => $info['data']
		);
		//debug($datos);

		$vista = array(
			'vista' => 'admin/editar_usuario.php',
			'params' => $datos,
			'layout' => 'ly_admin.php',
			'titulo' => 'Editar usuario',
		);

		$this->layouts->view($vista);
	}
*/
	public function actualizar_usuario()
	{
		$datos = comprobar_login();

		if (!empty($datos) && $datos['rol'] == 'administrador') {
			foreach ($_POST as $key => $value) {
				$datos[$key] = $value;
				//el campo que esté vacío no se incluye en la actualización:
				if ($datos[$key] == null) {
					unset($datos[$key]);
				}
			}
			if (isset($datos['password']) && !empty($datos['password'])) {
				$datos['password'] = md5($datos['password']);
			} else {
				unset($datos['password']);
			}

			$where['id_usuario'] = $datos['id'];
			//se quita el id antes de actualizar porque es la clave primaria y no se puede modificar
			unset($datos['id']);

			//debug($datos);

			$this->BackEndModel->update('usuarios', $datos, $where);

			header('Location: /admin/panel-control/usuarios');

		} else {

			header('Location: /error');

		}
	}

	public function eliminar_usuario()
	{
		$datos = comprobar_login();

		if (!empty($datos) && $datos['rol'] == 'administrador') {
			//debug($this->uri);

			$where['id_usuario'] = $this->uri->segment(3);

			$this->BackEndModel->delete('usuarios', $where);

			header('Location: /admin/panel-control/usuarios');
		
		} else {

			header('Location: /error');

		}
	}

	public function listado_post()
	{
		$posts = $this->BackEndModel->Lista('post','id_post');

		//Se almacenan los datos en el array para pasarselo a la vista que corresponda
		$datos = array(
			'posts' => $posts,
		);
		//debug($datos);
		//Tras obtener los datos que se van a mostrar, se comprueba si hay una sesión abierta por parte del usuario
		$verif = comprobar_login();

		if(!empty($verif)){

			$datos['rol'] = $verif['rol'];			

			$vista = array(
				'vista' => 'admin/lista-post.php',
				'params' => $datos,
				'layout' => 'ly_admin.php',
				'titulo' => 'Lista de post'
			);

			$this->layouts->view($vista);

		} else {

			header('Location: /error');

		}
	}

	public function registrar_nuevo_post()
	{

	}

	public function actualizar_post()
	{
		
	}

	public function eliminar_post()
	{
		$datos = comprobar_login();

		if (!empty($datos) && $datos['rol'] == 'administrador') {

			$where['id_post'] = $this->uri->segment(3);

			$this->BackEndModel->delete('post', $where);

			header('Location: /admin/panel-control/post');
		
		} else {

			header('Location: /error');

		}
	}

	public function listado_comentarios()
	{
		$comentarios = $this->BackEndModel->Listado_comentarios_post_y_usuarios();

		//Se almacenan los datos en el array para pasarselo a la vista que corresponda
		$datos = array(
			'comentarios' => $comentarios,
		);

		//Tras obtener los datos que se van a mostrar, se comprueba si hay una sesión abierta por parte del usuario
		$verif = comprobar_login();

		if(!empty($verif)){

			$datos['rol'] = $verif['rol'];			

			$vista = array(
				'vista' => 'admin/lista-comentarios.php',
				'params' => $datos,
				'layout' => 'ly_admin.php',
				'titulo' => 'Lista de comentarios'
			);
			$this->layouts->view($vista);
		//debug($datos);
		} else {

			header('Location: /error');

		}
	}

	public function eliminar_comentario()
	{
		$datos = comprobar_login();

		if (!empty($datos) && $datos['rol'] == 'administrador') {

			$where['id_comentario'] = $this->uri->segment(3);

			$this->BackEndModel->delete('comentarios', $where);

			header('Location: /admin/panel-control/comentarios');
		
		} else {

			header('Location: /error');

		}
	}

	/*---------------------- FUNCIONES ANTIGUAS -----------------------------*/
	public function registro()
	{
		$datos = array();

		$vista = array(
			'vista' => 'admin/new_autor.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Página de registro',
		);

		$this->layouts->view($vista);
	}


	public function add_autor()
	{
		/*Ponemos los datos que llegan en el post 
		 en formato array antes de pasarlo al modelo */
		foreach ($_POST as $key => $value) {
			$datos[$key] = $value;
		}

		if (isset($datos['enabled'])) {
			$datos['enabled'] = 1;
		} else {
			$datos['enabled'] = 0;
		}
		//debug($datos);
		$datos['password'] = md5($datos['password']);
		$this->BackEndModel->insert('authors', $datos);

		//echo "INSERCIÓN DE NUEVO AUTOR COMPLETADA";
		header('Location: /autores');
	}

	public function list()
	{

		$posts = $this->BackEndModel->ListPosts();

		//debug($posts);

		$datos = array(
			'posts' => $posts
		);

		$vista = array(
			'vista' => 'admin/index.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Página listado de post',
		);

		$this->layouts->view($vista);
	}

	public function new_post()
	{
		$authors = $this->BackEndModel->ListAuthors();
		$datos = array(
			'authors' => $authors
		);

		$vista = array(
			'vista' => 'admin/new_post.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Página de Login',
		);

		$this->layouts->view($vista);
	}

	public function add()
	{
		/*Ponemos los datos que llegan en el post 
		 en formato array antes de pasarlo al modelo */
		foreach ($_POST as $key => $value) {
			$datos[$key] = $value;
		}

		if (isset($datos['enabled'])) {
			$datos['enabled'] = 1;
		} else {
			$datos['enabled'] = 0;
		}
		//debug($datos);
		$this->BackEndModel->insert('posts', $datos);

		//echo "INSERCIÓN DE NUEVO POST COMPLETADA";
		header('Location: /list');
	}

	public function autores()
	{
		$authors = $this->BackEndModel->ListAuthors();
		$datos = array(
			'authors' => $authors
		);

		$vista = array(
			'vista' => 'admin/list_autores.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Página de autores',
		);

		$this->layouts->view($vista);
	}

	public function edit()
	{
		//debug($this->uri);
		$post = $this->BackEndModel->ListOnePost($this->uri->segment(2));

		$authors = $this->BackEndModel->ListAuthors();

		$datos = array(
			'post' => $post['data'],
			'authors' => $authors
		);

		$vista = array(
			'vista' => 'admin/edit_post.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Página para editar los post',
		);

		$this->layouts->view($vista);
	}

	public function update()
	{
		foreach ($_POST as $key => $value) {
			$datos[$key] = $value;
		}

		if (isset($datos['enabled'])) {
			$datos['enabled'] = 1;
		} else {
			$datos['enabled'] = 0;
		}

		$where['id'] = $datos['id'];
		//se quita el id antes de actualizar porque es la clave primaria y no se puede modificar
		unset($datos['id']);

		$this->BackEndModel->update('posts', $datos, $where);

		header('Location: /list');
	}

	public function edit_autor()
	{
		//debug($this->uri);
		$author = $this->BackEndModel->ListOneAuthor($this->uri->segment(2));

		$datos = array(
			'autor' => $author['data']
		);

		$vista = array(
			'vista' => 'admin/edit_author.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Página para editar los autores',
		);

		$this->layouts->view($vista);
	}

	public function update_autor()
	{
		foreach ($_POST as $key => $value) {
			$datos[$key] = $value;
		}

		if (isset($datos['enabled'])) {
			$datos['enabled'] = 1;
		} else {
			$datos['enabled'] = 0;
		}

		$where['id'] = $datos['id'];
		//se quita el id antes de actualizar porque es la clave primaria y no se puede modificar
		unset($datos['id']);

		$this->BackEndModel->update('authors', $datos, $where);

		header('Location: /autores');
	}

	public function delete()
	{
		$where['id'] = $this->uri->segment(2);

		$this->BackEndModel->delete('posts', $where);

		header('Location: /list');
	}

	public function delete_autor()
	{
		$where['id'] = $this->uri->segment(2);

		$this->BackEndModel->delete('authors', $where);

		header('Location: /autores');
	}
}
