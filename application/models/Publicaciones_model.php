<?php
class Publicaciones_model extends CI_Model {

        public $idPublicacion;
        public $imagen;
        public $fecha;

         public function insertar_publicacion($fecha)
        {
                $data = array(
        			'fecha_publicacion' => $fecha,
        		);

				$this->db->insert('publicacion', $data);
        }

        public function insertar_imagen(int $idPublicacion, string $imagen)
        {
               
                $data = array(
                	'publicacion_id_publicacion' => $idPublicacion,
        			'url_imagen' => $imagen,
        		);

				$this->db->insert('imagen', $data);
        }

        

}