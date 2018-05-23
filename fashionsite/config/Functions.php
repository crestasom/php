<?php
abstract class Functions {
	public static function getCategories($id = 0) {
		$category = new Category ();
		$category->condition = "status=1 AND category_id='$id'";
		return $category->findAll ();
	}
	public static function countCart() {
		$cartItems = 0;
		if (isset ( $_SESSION [SESSION_KEY] )) {
			$member = $_SESSION [SESSION_KEY];
			$cart = new Cart ();
			$cart->condition = " members_id=$member->id AND converted='0'";
			$record = $cart->findAll ();
			if ($record) {
				$cartItems = count ( $record );
			}
		}
		
		return $cartItems;
	}
	public static function getCartAmount() {
		$cartAmount = 0;
		if (isset ( $_SESSION [SESSION_KEY] )) {
			$member = $_SESSION [SESSION_KEY];
			$cart = new Cart ();
			// $sql = "SELECT SUM(c.quantity*p.price) AS 'totalAmount' "
			// . "FROM cart c "
			// . "LEFT JOIN "
			// . "product p "
			// . "ON c.product_id=p.id "
			// . "where c.members_id='$member->id' AND c.converted='0'";
			
			$sql="SELECT SUM(sa.quantity*p.price) AS 'totalAmount' " 
					. "from product p " 
					. "join (" . "select c.*,s.product_id,s.size from "
					 . "cart c " . "left join " . "stock s " 
					 . " on c.stock_id=s.id where c.members_id=$member->id AND converted='0') sa" 
					 . " on sa.product_id=p.id";
			// $cart->condition=" members_id=$member->id AND converted='0'";
			$record = $cart->findByQuery ( $sql );
			if ($record != NULL) {
				$cartAmount = $record->totalAmount;
			}
		}
		return $cartAmount;
	}
	public static function countManu($id = NULL) {
		$manuItems = 0;
		$product = new Product ();
		$product->condition = " manufacturer_id=$id and status='1'";
		$record = $product->findAll ();
		if ($record) {
			$manuItems = count ( $record );
		}
		return $manuItems;
	}
}
