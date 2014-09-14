<?php
	class SongController extends controller
	{
		$this->layout='header';

		public function index(){
			$Song = $this->loadModel('Song')->find('all');
			$this->render('index',array('datos'=>$Song));
		}

		public function crear(){
			$Song = $this->loadModel('song')->find('all');

			$parametros = array(
				'id'=>$_POST['txtId'],
				'artist'=>$_POST['txtArtist'],
				'track'=>$_POST['txtTrack'],
				'link'=>$_POST['txtLink'],
			);
			$mensaje = null;
			$modelo = new song($parametros);
			try{
				if($modelo->save()){
					$mensaje = 'Operación exitosa';
				}else{
					$mensaje = 'Ha ocurrido un error';
				}
			}catch(Exception $e){
					$mensaje = $e->getMessage();
			}
			$this->render('index',array('datos'=>$Song,'mensaje'=>$mensaje));
		}

		public function modificar(){
			$Song = $this->loadModel('song')->find('all');
			$model = $this->loadModel('song')->find($_POST["codigo"]);

			$modelo->id= $_POST['txtId'];
			$modelo->artist= $_POST['txtArtist'];
			$modelo->track= $_POST['txtTrack'];
			$modelo->link= $_POST['txtLink'];

			$mensaje = null;
			try{
				if($model->save()){
					$mensaje = 'Operación exitosa';
				}else{
					$mensaje = 'Ha ocurrido un error';
				}
			}catch(Exception $e){
					$mensaje = $e->getMessage();
			}
			$this->render('index',array('datos'=>$Song,'mensaje'=>$mensaje));
		}

		public function modificar($codigo){
			$Song = $this->loadModel('song')->find('all');
			$model = $this->loadModel('song')->find($codigo);
			$mensaje = null;
			try{
				if($model->delete()){
					$mensaje = 'Operación exitosa';
				}else{
					$mensaje = 'Ha ocurrido un error';
				}
			}catch(Exception $e){
					$mensaje = $e->getMessage();
			}
			$this->render('index',array('datos'=>$Song,'mensaje'=>$mensaje));
		}

	}
?>