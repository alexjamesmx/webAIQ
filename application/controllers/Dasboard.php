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
        $id_pedido = $this->input->post('id_pedido');
        //var_dump($id_pedido);
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
        $fecha_act = date( 'Y-m-d H:i:s' );
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
        $zona = $this->session->userdata( 'zona' );
        // asignamos fecha
        $fecha_act = date( 'Y-m-d H:i:s' );
        //elegimos un repartidor alazar activo
        $id_rep = json_decode( json_encode( $this->Dasboard_model->select_repartidor($zona) ), true );
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
        $fecha_act = date( 'Y-m-d H:i:s' );
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
        $fecha_act = date( 'Y-m-d H:i:s' );
        $obj[ 'res' ] = $this->Dasboard_model->pedido_enviado( $id_pedido, $fecha_act );
        $obj[ 'mes' ] = $obj[ 'res' ]
        ? 'Status cambiado con éxito'
        : 'Imposible actualizar el status';

        echo json_encode( $obj );
    }

    public function btn_devolucion() {
        $id_pedido = $this->input->post( 'id_pedido' );
        $id_res = $this->input->post( 'id_repartidor' );
        $fecha_act = date( 'Y-m-d H:i:s' );
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
        $fecha_act = date( 'Y-m-d H:i:s' );
        $obj[ 'res' ] = $this->Dasboard_model->pedido_finalizado( $id_pedido, $fecha_act );
        if ( $obj[ 'res' ] == true ) { 
            $obj[ 'repartidor' ] = $this->Dasboard_model->status_repartidor( $id_res );
        }
        $obj[ 'mes' ] = $obj[ 'res' ]
        ? 'Status cambiado con éxito'
        : 'Imposible actualizar el status';

        echo json_encode( $obj );
    }

    public function contador() { 
        $id_pedido = $this->input->post( 'id_pedido' );
        $id_carrito = $this->input->post( 'id_carrito' );
        $obj['id_pedido'] = $id_pedido;
        $inicio = json_decode( json_encode($this->Dasboard_model->hora( $id_pedido )), true );
        $hora_inicio = $inicio[ 'fecha_act' ];
        $dt = new DateTime($hora_inicio);
        //var_dump($dt);
        $hora_act = date( 'Y-m-d H:i:s' );
        $dt1 = new DateTime($hora_act);
        //var_dump($dt1);
        $diff = $dt1->diff($dt);
        $obj['tiempo'] = ( ($diff->days * 24 ) * 60 ) + ( $diff->i ) . ':'. $diff->s;
        $obj['minutos'] = ( ($diff->days * 24 ) * 60 ) + ( $diff->i );
        $obj['asignado'] = $this->Dasboard_model->tiempo_asignado( $id_carrito );

        echo json_encode( $obj );
    }

    public function numero_repartidor()
    {
        $id_repa = $this->input->post( 'repartidor' );
        $data = json_decode( json_encode($this->Dasboard_model->numeros( $id_repa )), true );
        $obj[ 'res' ] = $data != null;

        $obj[ 'telefono' ] = $data['telefono'];
        
        echo json_encode( $obj );
    }

    public function mesajepedido()
    {
        $id_pedido = $this->input->post( 'pedido' );
        $data =  json_decode( json_encode($this->Dasboard_model->get_mesas( $id_pedido )),true );
        $obj[ 'res' ] = $data != null;
        $obj[ 'detalles' ] = $data;
        
        echo json_encode( $obj );
    }




    

}

/* End of file Dasboard.php and path /application/controllers/Daisboard/Dasboard.php */
