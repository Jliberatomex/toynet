<?php 
	
	/**
	 * autor: Eduardo Joshua Lopez Liberato
	 * Equipo : Fevar
	 */
	session_start();
	class Carrito{
		protected $elementos_Car=array();

		public function __construct(){
			$this->elementos_Car= !empty($_SESSION['elementos_Car'])?$_SESSION['elementos_Car']:NULL;
			if($this->elementos_Car===NULL){
				$this->elementos_Car= array('total_carrito'=>0,'total_elementos'=>0);
			}
		}

		public function contenido(){
			$cart=array($this->elementos_Car);
			unset($cart['total_elementos']);
			unset($cart['total_carrito']);
			return $cart;
		}

		public function obtener_elementos($id){
			return(id_array($id,array('total_elementos','total_carrito'),TRUE) OR ! isset($this->elementos_Car[$id]))
			? FALSE
			: $this->elementos_Car[$id];
		}

		public function total_elementos(){
			return $this->elementos_Car['total_elementos'];
		}

		public function total(){
			return $this->elementos_Car['total_carrito'];
		}

		public function insert($elem=array()){
			if(!is_array($elem) OR count($elem)===0){
				return FALSE;
			}else{
				if(!isset($elem['id_Juguete'],$elem['nombre_Juguete'],$elem['precio'],$elem['cantidad'])){
					return FALSE;
				}else{
					$elem['cantidad']=(float) $elem['cantidad'];
					if($elem['cantidad']==0){
						return FALSE;
					}
					$elem['precio']= (float) $elem['precio'];

					$rowid= md5($elem['id_Juguete']);

					$old_qty= isset($this->elementos_Car[$rowid]['cantidad']) ? (int) $this->elementos_Car[$rowid]['cantidad'] : 0;

					$elem['rowid'] = $rowid;
					$elem['cantidad'] += $old_qty;
					$this->elementos_Car[$rowid]=$elem;

					if($this->guardar_carro()){
						return isset($rowid) ? $rowid : TRUE; 
					}else{
						return FALSE;
					}

				}
			}
		}

		public function actualizar($elem=array()){
			if(!is_array($elem) OR count($elem) ===0){
				return FALSE;
			}else{
				if(!isset($elem['rowid'],$this->elementos_Car[$elem['rowid']])){
					return FALSE;
				}else{
					if(isset($elem['cantidad'])){
						$elem['cantidad'] = (float) $elem['cantidad'];

						if($elem['cantidad']==0){
							unset($this->elementos_Car[$elem['rowid']]);
							return TRUE;
						}
					}
					$keys = array_intersect(array_keys($this->elementos_Car[$elem['rowid']]), array_keys($elem));
					if(isset($elem['precio'])){
						$elem['precio'] = (float) $elem['precio'];
					}

					foreach (array_diff($keys, array('id_Juguete','nombre_Juguete')) as $key){
						$this->elementos_Car[$elem['rowid']][$key]=$elem[$key];
					}
					$this->guardar_carro();
					return TRUE;

				}
			}
		}	

		protected function guardar_carro(){
			$this->elementos_Car['total_elementos'] = $this->elementos_Car['total_carrito']=0;
			foreach ($this->elementos_Car as $key => $val){
				if(!is_array($val) OR !isset($val['precio'],$val['cantidad'])){
					continue;
				}
				$this->elementos_Car['total_carrito'] +=($val['precio']*$val['cantidad']);
				$this->elementos_Car['total_elementos'] += $val['cantidad'];
				$this->elementos_Car[$key]['subtotal'] =($this->elementos_Car[$key]['precio'] * $this->elementos_Car[$key]['cantidad']);
			}
			if(count($this->elementos_Car) <= 2 ){
				unset($_SESSION['elementos_Car']);
				return FALSE;
			}else{
				$_SESSION['elementos_Car'] = $this->elementos_Car;
				return TRUE;	
			}

		}

		public function borrar($rowid){
			unset($this->elementos_Car[$rowid]);
			$this->guardar_carro();
			return TRUE;
		}

		public function destroy(){
			$this->elementos_Car=array('total_carrito' => 0, 'total_elementos' => 0);
			unset($_SESSION['elementos_Car']);
		}



}

?>