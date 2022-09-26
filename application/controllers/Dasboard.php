<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Dasboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'Dasboard_model' );
    }

    public function poraceptar_cantidad() {
        $id_res = $this->session->userdata( 'id_user' );
        $data = $this->Dasboard_model->select_poraceptar( $id_res );
        $obj[ 'res' ] = $data != null;
        if ( $obj[ 'res' ] == true ) {
            $obj[ 'cantidad' ] = count( $data );
        } else {
            $obj[ 'cantidad' ] = 0;
        }
        echo json_encode( $obj );
    }

    public function poraceptar() {
        $id_res = $this->session->userdata( 'id_user' );
        $data = $this->Dasboard_model->select_poraceptar( $id_res );
        $obj[ 'res' ] = $data != null;
        if ( $obj[ 'res' ] == true ) {
            $obj[ 'cantidad' ] = count( $data );
        }
        $obj[ 'pedidos' ] = $data;
        echo json_encode( $obj );
    }

    public function detalle_pedido() {
        $id_pedido = $this->input->post( 'id_pedido' );
        $data = $this->Dasboard_model->detalle( $id_pedido );
        $obj[ 'res' ] = $data != null;
        $obj[ 'detalle' ] = $data;
        echo json_encode( $obj );
    }

    public function enpreparacion() {
        $id_res = $this->session->userdata( 'id_user' );
        $data = $this->Dasboard_model->preparando( $id_res );
        $obj[ 'res' ] = $data != null;
        if ( $obj[ 'res' ] == true ) {
            $obj[ 'cantidad' ] = count( $data );
        }
        $obj[ 'pedidos' ] = $data;
        echo json_encode( $obj );
    }

    public function espera() {
        $id_res = $this->session->userdata( 'id_user' );
        $data = $this->Dasboard_model->enespera( $id_res );
        $obj[ 'res' ] = $data != null;
        if ( $obj[ 'res' ] == true ) {
            $obj[ 'cantidad' ] = count( $data );
        }
        $obj[ 'pedidos' ] = $data;
        echo json_encode( $obj );
    }

    public function enviado() {
        $id_res = $this->session->userdata( 'id_user' );
        $data = $this->Dasboard_model->yaenviados( $id_res );
        $obj[ 'res' ] = $data != null;
        if ( $obj[ 'res' ] == true ) {
            $obj[ 'cantidad' ] = count( $data );
        }
        $obj[ 'pedidos' ] = $data;
        echo json_encode( $obj );
    }

    public function btn_aceptar() {
        $id_pedido = $this->input->post( 'id_pedido' );
        $fecha_act = date( 'Y-m-d H:m:s' );
        $obj[ 'res' ] = $this->Dasboard_model->pedido_aceptado( $id_pedido, $fecha_act );
        $obj[ 'mes' ] = $obj[ 'res' ]
        ? 'Status cambiado con éxito'
        : 'Imposible actualizar el status';

        echo json_encode( $obj );
    }

    public function btn_declinar() {
        $id_pedido = $this->input->post( 'id_pedido' );
        $fecha_act = date( 'Y-m-d H:m:s' );
        $obj[ 'res' ] = $this->Dasboard_model->pedido_declinado( $id_pedido, $fecha_act );
        $obj[ 'mes' ] = $obj[ 'res' ]
        ? 'Status cambiado con éxito'
        : 'Imposible actualizar el status';

        echo json_encode( $obj );
    }

    public function btn_listo()  {
        $id_pedido = $this->input->post( 'id_pedido' );
        // asignamos fecha
        $fecha_act = date( 'Y-m-d H:m:s' );
        //elegimos un repartidor alazar activo
        $id_rep = json_decode( json_encode( $this->Dasboard_model->select_repartidor() ), true );
        if ( $id_rep == null ) {
            // si no hay repartidores avisar para que no aga nada
            $obj[ 'mes' ]  = 'No hay repartidores intenta mas tarde';
            $obj[ 'res' ] = false;
            echo json_encode( $obj );
        } else {
            //conbierte el id del repartidor en entero
            $id_init = intval( $id_rep[ 'id_rep' ] );
            $obj[ 'id_repartidor' ] = $id_init; 
            $obj[ 'fecha' ] = $fecha_act; 
            //enviamos todos los datos al modelo pedido listos
            $obj[ 'res' ] = $this->Dasboard_model->pedido_listo( $id_pedido, $fecha_act, $id_init );
            if ( $obj[ 'res' ] == true ) { 
                $obj[ 'mes' ] = 'estatus, fecha, y repartidor actualizados';
                $obj[ 'repartidor' ] = $this->Dasboard_model->status_repartidor( $id_init );
                echo json_encode( $obj );
            } else {
                $obj['mes' ] = "No se actualizo el status";
                echo json_encode( $obj );
            }
            
        }
        
    }

    public function btn_cancelado() {
        $id_pedido = $this->input->post( 'id_pedido' );
        $id_res = $this->input->post( 'id_repartidor' );
        $fecha_act = date( 'Y-m-d H:m:s' );
        $obj[ 'res' ] = $this->Dasboard_model->pedido_cancelado( $id_pedido, $fecha_act );
        if ( $obj[ 'res' ] == true ) { 
            $obj[ 'repartidor' ] = $this->Dasboard_model->status_repartidor( $id_res );
        }
        $obj[ 'mes' ] = $obj[ 'res' ]
        ? 'Status cambiado con éxito'
        : 'Imposible actualizar el status';

        echo json_encode( $obj );
    }

    public function btn_enviado() {
        $id_pedido = $this->input->post( 'id_pedido' );
        $fecha_act = date( 'Y-m-d H:m:s' );
        $obj[ 'res' ] = $this->Dasboard_model->pedido_enviado( $id_pedido, $fecha_act );
        $obj[ 'mes' ] = $obj[ 'res' ]
        ? 'Status cambiado con éxito'
        : 'Imposible actualizar el status';

        echo json_encode( $obj );
    }

    public function btn_devolucion() {
        $id_pedido = $this->input->post( 'id_pedido' );
        $id_res = $this->input->post( 'id_repartidor' );
        $fecha_act = date( 'Y-m-d H:m:s' );
        $obj[ 'res' ] = $this->Dasboard_model->pedido_devolucion( $id_pedido, $fecha_act );
        if ( $obj[ 'res' ] == true ) { 
            $obj[ 'repartidor' ] = $this->Dasboard_model->status_repartidor( $id_res );
        }
        $obj[ 'mes' ] = $obj[ 'res' ]
        ? 'Status cambiado con éxito'
        : 'Imposible actualizar el status';

        echo json_encode( $obj );
    }

    public function btn_finalizado() {
        $id_pedido = $this->input->post( 'id_pedido' );
        $id_res = $this->input->post( 'id_repartidor' );
        $fecha_act = date( 'Y-m-d H:m:s' );
        $obj[ 'res' ] = $this->Dasboard_model->pedido_finalizado( $id_pedido, $fecha_act );
        if ( $obj[ 'res' ] == true ) { 
            $obj[ 'repartidor' ] = $this->Dasboard_model->status_repartidor( $id_res );
        }
        $obj[ 'mes' ] = $obj[ 'res' ]
        ? 'Status cambiado con éxito'
        : 'Imposible actualizar el status';

        echo json_encode( $obj );
    }

    

}

/* End of file Dasboard.php and path /application/controllers/Daisboard/Dasboard.php */
