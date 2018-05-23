<?php

class MemberController extends MainController {

    public function index($parameter = NULL) {
        $this->loadView("index");
    }

    public function login() {
        $data['seoTitle'] = "Login | E-Nepal";
        $manufacturer = new Manufacturer();
        $data['manufacturer'] = $manufacturer;
        $category = new Category();
        $data['category'] = $category;
        $member = new Member();
        $messages = array();
        if (isset($_SESSION[SESSION_KEY])) {
            $this->redirect("site/index");
        }

        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $member->condition = "  email=:email AND password=:password AND status=:status AND approved=:approved";
            $member->params = array(':email' => $email, ':password' => $password, ':approved' => '1', ':status' => '1');
            try {
                $data = $member->loginCheck();
                if ($data) {
                    $_SESSION[SESSION_KEY] = $data;
                    $this->redirect("site/index");
                } else {
                    $this->setFlash('error', "Invalid username or password!!! Please try again....");
                }
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
        $messages['seoTitle'] = "Login | E-Nepal";
        $messages['category'] = new Category();
        $messages['manufacturer'] = new Manufacturer();
        $this->loadViewNoSideBar("__login", $messages);
    }

    public function fblogin() {
        if (isset($_SESSION['FBID']) and $_SESSION['FBID']!="") {
//echo 'done';exit;
            $fbkey = $_SESSION['FBID'];
            $fbname = $_SESSION['FULLNAME'];
            $fbaddress = $_SESSION['LOCATION'];
            $fbemail = $_SESSION['EMAIL'];
            $object = new stdClass();
            $object->fullname = $fbname;
			//print_r($object);exit;

            $member = new Member();
            $member->condition = ' email=:fbkey';
            $member->params = array(':fbkey' => $fbkey);
            $record = $member->find();
// var_dump($record);exit;
            if ($record) {
                $object->id = $record->id;
            } else {
                $member->params = array();
                $member->attributes['fullname'] = $fbname;
                $member->attributes['email'] = $fbkey;
                $member->attributes['address'] = $fbaddress;
                $insert = $member->insert();
                if ($insert) {
                    $object->id = $member->pdoObject->lastInsertId();
                } else {
                    $this->setFlash('error', $insert[2]);
                }
            }
            $_SESSION[SESSION_KEY] = $object;
            $this->redirect("site/index");
        } else {
            header("location:" . MAIN_URL . "assets/fb/fbconfig.php");
        }
    }

    public function register($parameter = NULL) {
        $data['seoTitle'] = "Restore Password | E-Nepal";
//while registering a new user
        $member = new Member();
        $data = array();
        $manufacturer = new Manufacturer();
        $data['manufacturer'] = $manufacturer;
        $category = new Category();
        $data['category'] = $category;

        if (isset($_POST['register'])) {
            if ($this->isSession('captcha') AND trim(strtolower($_POST['captcha'])) == $_SESSION['captcha']) {
                //process for register            
                $phone = $_POST['phone'];
                $email = $_POST['email'];

                //to check if email is in required format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->setFlash("error", "Invalid Email format");
                } else {
                    $password = $_POST['password'];
                    $confirmpassword = $_POST['confirmpassword'];
                    $member->condition = " email=:email";
                    $member->params = array(':email' => $email);
                    $datas = $member->find();
                    //to match password
                    if ($password != $confirmpassword) {
                        $this->setFlash("error", "Password doesnot match!!Please Type again");
                    } else if ($datas) {
                        $this->setFlash("error", "Email Already Exists.Please try Another One...");
                    } else if (!preg_match("/^[0-9]{7,10}$/", $phone)) {
                        $this->setFlash("error", "Not a valid phone number");
                    } else {
                        //insert the record into the database
                        $address = $_POST['address'];
                        $member->params = array();
                        $member->attributes['fullname'] = $_POST['fullname'];
                        $member->attributes['email'] = $email;
                        $member->attributes['address'] = $address;
                        $member->attributes['mobile'] = $phone;
                        $member->attributes['password'] = md5($password);
                        $secretKey = md5(time());
                        $member->attributes['secretKey'] = $secretKey;
                        $inserts = $member->insert();
                        if ($inserts) {
                            $data['success'] = "Thank you for Registering with us. Please check your email for verification...";
                            //for sending email
                            $this->sendEmail(array('email' => $email, 'secretKey' => $secretKey, 'type' => 'register'));
                        } else {
                            $data['error'] = $inserts[2];
                        }
                    }
                }
            } else {
                $this->setFlash("error", "Invalid Captcha Code.Please Re-Type the Captcha again");
            }
        }

        $data['seoTitle'] = "Register | E-Nepal";
        $this->loadViewNoSideBar("__register", $data);
    }

    private function sendEmail($attributes = array()) {
//sending email with html format
        ob_start();
        if (isset($attributes['cartRecords'])) {
            $this->loadPartialView("_confirmation", $attributes);
        } else {
            $this->loadPartialView("_register", $attributes);
        }
        $message = ob_get_contents();
        ob_clean();
       // echo $message;
        $to = $attributes['email'];
        $subject = !isset($attributes['cartRecord']) ? "Registration Confirmation" : "Order Received";
        ;
        $header = "";
        @ mail($to, $subject, $message, $header);
    }

    public function verify($secretKey = NULL) {
        try {
            if (!$secretKey) {
                throw new Exception("Invalid Request...");
            }
            $model = new Member();
            $model->condition = " secretKey=:secretKey";
            $model->params = array(':secretKey' => $secretKey);
            $member = $model->find();
            if ($member) {
//process for verification
                $model->params = array();
                $model->attributes['approved'] = '1';
                $update = $model->update($member->id);
                if ($update) {
                    $this->setFlash('success', 'you are now verified..Please login to continue');
                    $this->redirect('member/login');
                }
            } else {
                throw new Exception("The Verification Code doesnot match...Please process through your email");
            }
        } catch (Exception $ex) {
            $data['error'] = $ex->getMessage();
            $data['category'] = new Category();
            $data['manufacturer'] = new Manufacturer();
            $this->loadView("../member/error", $data);
        }
    }

    public function logout() {
        $this->isLoggedIn("member/login");
		$_SESSION['FBID']="";
        session_destroy();
		
        $this->redirect("site/index.html");
    }

    public function addtocart() {
        $data = array();
        if (!$this->isSession(SESSION_KEY)) {
            $data['error'] = "Please Login to continue.";
//$data['error'] = $_POST['quantity'];
            echo json_encode($data);
            exit;
        }
//echo $_POST['id'];exit;
//$data['error'] = $_SESSION[SESSION_KEY]->id;
//echo json_encode($data);
//exit;
        try {
            if (isset($_POST['id']) and ! empty($_POST ['id'])) {
                $stock_id = $_POST['id'];
                $member = $_SESSION[SESSION_KEY];
                $qty = $_POST['quantity'];
                $stock = new Stock();
//check whether quanitity is enough in stock
                $stockData = $stock->findById($stock_id);
                if ($qty < 1 or $qty > 5 or $qty > $stockData->quantity) {
                    $data['error'] = "Product quantity not in range..Please try again..";
                } else {
                    $cart = new Cart();
                    $cart->condition = " stock_id='$stock_id' AND members_id='$member->id' AND converted='0'";
                    $cartData = $cart->find();
                    if (!$cartData) {
                        $cart->attributes['stock_id'] = $stock_id;
                        $cart->attributes['members_id'] = $member->id;
                        $cart->attributes['quantity'] = $qty;

//print_r($cart->attributes);
//exit;
                        $insert = $cart->insert();
                        if ($insert == true) {
                            $data['success'] = "Successfully Added to your cart..";
                        } else {
                            $data['error'] = "Cannot Add This item to your cart..";
                        }
                    } else {
                        $data['error'] = "This item is already in your cart...";
                    }
                }
            } else {
                $data['error'] = "Please select a valid product..";
            }
        } catch (PDOException $ex) {
            $data['error'] = $ex->getMessage();
        }
        $data['cartItems'] = Functions::countCart();
        echo json_encode($data);
    }

    public function removeCartItem() {

        $data = array();
        $stock = new Stock();
        if (!$this->isSession(SESSION_KEY)) {
            $data['error'] = "Please Login to continue.";
            echo json_encode($data);
            exit;
        }

        try {
            if (isset($_POST['id']) and ! empty($_POST ['id'])) {
                $cart_id = $_POST['id'];
                $member = $_SESSION[SESSION_KEY];
                $cart = new Cart();
                $cartData = $cart->findById($cart_id);
                if ($cartData) {
                    $delete = $cart->deleteById($cart_id);
                } else {
                    $data['error'] = "Item not found...";
                }
                if ($delete) {
                    $sql = "SELECT sa.*,p.title,p.image,p.price "
                            . "from product p "
                            . "join ("
                            . "select c.*,s.product_id,s.size from "
                            . "cart c "
                            . "left join "
                            . "stock s "
                            . " on c.stock_id=s.id where c.members_id=$member->id AND converted='0') sa"
                            . " on sa.product_id=p.id";
                    $cartItems = $cart->findAllByQuery($sql);
//load the cart list view file
                    ob_start();
                    $this->loadPartialView("_cartItems", array('cartItems' => $cartItems, 'stock' => $stock));
                    $cartList = ob_get_contents();
                    ob_clean();

                    $data['success'] = "Items Removed Successfully";
                    $data['cartList'] = $cartList;
                    $data['cartCount'] = Functions::countCart();
                    $data['cartAmt'] = Functions::getCartAmount();
                }
            } else {
                $data['error'] = "Not a valid id for cart..";
            }
        } catch (PDOException $ex) {
            $data['error'] = $ex->getMessage();
        }
        $data['cartItems'] = Functions::countCart();
        echo json_encode($data);
    }

    public function emptyCart() {

        $data = array();
        $stock = new Stock();
        if (!$this->isSession(SESSION_KEY)) {
            $data['error'] = "Please Login to continue.";
            echo json_encode($data);
            exit;
        }

        try {
            $member = $_SESSION[SESSION_KEY];
            $member_id = $member->id;
            $cart = new Cart();
            $cart->condition = " members_id=:members_id";
            $cart->params[':members_id'] = $member_id;
            $cartData = $cart->find();
//print_r($cartData);exit;
            if ($cartData) {
                $cart->condition = " members_id=$member_id";
                $delete = $cart->deleteBySql();
            } else {
                $data['error'] = "No item in cart";
            }
            if (isset($delete)) {
                $sql = "SELECT sa.*,p.title,p.image,p.price "
                        . "from product p "
                        . "join ("
                        . "select c.*,s.product_id,s.size from "
                        . "cart c "
                        . "left join "
                        . "stock s "
                        . " on c.stock_id=s.id where c.members_id=$member->id AND converted='0') sa"
                        . " on sa.product_id=p.id";
                $cartItems = $cart->findAllByQuery($sql);
//load the cart list view file
                ob_start();
                $this->loadPartialView("_cartItems", array('cartItems' => $cartItems, 'stock' => $stock));
                $cartList = ob_get_contents();
                ob_clean();

                $data['success'] = "All Items Removed Successfully";
                $data['cartList'] = $cartList;
                $data['cartCount'] = Functions::countCart();
                $data['cartAmt'] = Functions::getCartAmount();
            }
        } catch (PDOException $ex) {
            $data['error'] = $ex->getMessage();
        }
        $data['cartItems'] = Functions::countCart();
        echo json_encode($data);
    }

    public function cart() {
        $this->isLoggedIn("member/login");
        $data = array();
        $data['seoTitle'] = "Cart | E-Nepal";
        $member = $_SESSION[SESSION_KEY];
        $cart = new Cart();
//$cart->condition=" members_id=$member-> and converted='0'";
//$cartItems=$cart->findAll();
        /* $sql = "SELECT  c.*,p.title ,p.image,p.price,s.size "
          . "FROM cart c "
          . "left join stock s "
          . "LEFT JOIN "
          . "product p "
          . "on c.stock_id=s.id "
          . "and s.stock_id=p.id "
          . " where "
          . "c.members_id=$member->id AND converted='0'"; */
        $sql = "SELECT sa.*,p.title,p.image,p.price "
                . "from product p "
                . "join ("
                . "select c.*,s.product_id,s.size from "
                . "cart c "
                . "left join "
                . "stock s "
                . " on c.stock_id=s.id where c.members_id=$member->id AND converted='0') sa"
                . " on sa.product_id=p.id";

//echo $sql;exit;
// $cart->condition=" members_id=$member->id AND converted='0'";
        $cartItems = $cart->findAllByQuery($sql);
        $data['stock'] = new Stock();
//echo '<pre>';
//print_r($cartItems);
//exit;
        $data['member'] = $member;
        $data['cartItems'] = $cartItems;
        $data['category'] = new Category();
        $data['manufacturer'] = new Manufacturer();
        $this->loadViewNoSideBar("__cart", $data);
    }

    public function checkEmail() {
        $return = "false";
        if (isset($_POST['email'])) {
            $model = new Member();
            $model->condition = " email=:email";
            $model->params = array(':email' => $_POST['email']);


            $data = $model->find();

            if (!$data) {
                $return = "true";
            }
            echo $return;
        }
    }

    public function payment_method() {
        $this->isLoggedIn("member/login");
        $data = array();
        $data['category'] = new Category();
        $data['manufacturer'] = new Manufacturer();
        $member = $_SESSION[SESSION_KEY];

        if (isset($_POST['payment_method'])) {
            $method = $_POST['payment_method'];
            $_SESSION['payment'] = $method;
            $_SESSION['deliveryInfo'] = $_POST['delivery'];
            if ($_POST['payment_method'] == 'cod') {
                $payment = new Payment();
                $payment->attributes = array('payway' => 'Cash On Delivery', 'amount' => Functions::getCartAmount(), 'members_id' => $_SESSION[SESSION_KEY]->id, 'detail' => 'Cash on Delivery');
                $status = $payment->insert();
                $payment_id = $payment->pdoObject->lastInsertId();
                if ($status) {
//get the cart records of member
                    $cart = new Cart();
                    $cart->condition = " members_id=$member->id and converted='0'";
                    $cartRecords = $cart->findAll();
//print_r($cartRecords);exit;
                    $orderIds = array();
//move record to order
                    foreach ($cartRecords as $record) {
                        $order = new Order();
                        $order->attributes = array('stock_id' => $record->stock_id, 'members_id' => $record->members_id, 'quantity' => $record->quantity);
                        $orderInsert = $order->insert();
                        if ($orderInsert) {
                            $orderIds[] = $order->pdoObject->lastInsertId();
                            $cart->attributes = array('converted' => '1');
                            $cart->update($record->id);
                            $stock = new Stock();
                            $sql = "update stock set quantity=quantity-$record->quantity where id=$record->stock_id";
                            $stock->updateByQuery($sql);
                        }
                    }
//for delivery info
                    $delivery = new Delivery();
                    $delivery->attributes['members_id'] = $member->id;
                    $delivery->attributes['payment_id'] = $payment_id;
                    $delivery->attributes['order_ids'] = implode(', ', $orderIds);
                    $delivery->attributes['contactName'] = $_SESSION['deliveryInfo']['name'];
                    $delivery->attributes['contactAddress'] = $_SESSION['deliveryInfo']['address'];
                    $delivery->attributes['contactEmail'] = $_SESSION['deliveryInfo']['email'];
                    $delivery->attributes['contactPhone'] = $_SESSION['deliveryInfo']['phone'];
                    $delivery->attributes['status'] = '0';
                    $deliveryInsert = $delivery->insert();
                    if ($deliveryInsert) {
                        $delivery_id = $delivery->pdoObject->lastInsertId();
                        unset($_SESSION['deliveryInfo']);
                        $data['success'] = "Thank you for Shopping with us. We will contact you as soon as possible....";
                        $this->sendEmail(array('email' => $member->email, 'cartRecords' => $_SESSION['cartItems'], 'deliveryInfo' => $delivery->attributes, 'payment_method' => "Cash On Delivery", 'delivery_id' => $delivery_id));
                        unset($_SESSION['cartItems']);
                    }
                    $this->loadViewNoSideBar('paymentSuccess', $data);
                    exit;
                }
            }
        } else {
            $errorData['error'] = "Invalid request for payment";
            $this->loadViewNoSideBar("../site/error", $errorData);
            exit;
        }

        $cart = new Cart();
        $data['method'] = $method;
        $data['cartItems'] = Functions::countCart();
        $data['cartTotal'] = Functions::getCartAmount();
//echo $data['cartTotal'];
//exit;
        $this->loadViewNoSideBar("payment", $data);
    }

    public function payment($type = 'failure') {
        $this->isLoggedIn('member/login');
//echo '<pre>';
//print_r($_POST);exit;
       // print_r($_GET);exit;
        if (isset($_GET['amt'])) {
            $amount = $_GET['amt'];
            $transactionKey = $_GET['refId'];
            $detail = 'After payment in esewa';
            $payway = 'Esewa';
        } else if (isset($_POST['payment_status']) and $_POST['payment_status'] == 'Completed') {
            $transactionKey = $_POST['txn_id'];
            $amount = $_POST['payment_gross'];
            $detail = 'After payment in paypal';
            $payway = 'Paypal';
        }
//echo $amount;exit;
        if ($type=='success') {
//for payment recieved
            $data = array();
            $member = $_SESSION[SESSION_KEY];
            $payment = new Payment();
            $payment->attributes = array('members_id' => $member->id, 'transactionKey' => $transactionKey, 'amount' => $amount, 'detail' => $detail, 'payway' => $payway);
            $insert = $payment->insert();
            $payment_id = $payment->pdoObject->lastInsertId();
            if ($insert) {
//get the cart records of member
                $cart = new Cart();
                $cart->condition = " members_id=$member->id and converted='0'";
                $cartRecords = $cart->findAll();
                $orderIds = array();
//move record to order
                foreach ($cartRecords as $record) {
                    $order = new Order();
                    $order->attributes = array('stock_id' => $record->stock_id, 'members_id' => $record->members_id, 'quantity' => $record->quantity);
                    $orderInsert = $order->insert();
                    if ($orderInsert) {
                        $orderIds[] = $order->pdoObject->lastInsertId();
                        $cart->attributes = array('converted' => '1');
                        $cart->update($record->id);
                        $stock = new Stock();
                        $sql = "update stock set quantity=quantity-$record->quantity where id=$record->stock_id";
                        $stock->updateByQuery($sql);
//echo "stock updated";
                    }
                }
//for delivery info
                $delivery = new Delivery();
                $delivery->attributes['members_id'] = $member->id;
                $delivery->attributes['payment_id'] = $payment_id;
                $delivery->attributes['order_ids'] = implode(', ', $orderIds);
                $delivery->attributes['contactName'] = $_SESSION['deliveryInfo']['name'];
                $delivery->attributes['contactAddress'] = $_SESSION['deliveryInfo']['address'];
                $delivery->attributes['contactEmail'] = $_SESSION['deliveryInfo']['email'];
                $delivery->attributes['contactPhone'] = $_SESSION['deliveryInfo']['phone'];
                $deliveryInsert = $delivery->insert();
                if ($deliveryInsert) {
                    $delivery_id = $delivery->pdoObject->lastInsertId();
                    unset($_SESSION['deliveryInfo']);
                    $data['success'] = "Thank you for Shopping with us. We will contact you as soon as possible....";
                    $this->sendEmail(array('email' => $member->email, 'cartRecords' => $_SESSION['cartItems'], 'deliveryInfo' => $delivery->attributes, 'payment_method' => $payway, 'delivery_id' => $delivery_id));
                    unset($_SESSION['cartItems']);
                }
            }
            $data['category'] = new Category();
            $data['manufacturer'] = new Manufacturer();

            $this->loadViewNoSideBar('paymentSuccess', $data);
        } else {
            $this->setFlash('error', "Payment Request cancelled.Please Try again");
            $this->redirect("member/checkout");

            exit;
        }
    }

    public function checkout() {
        $this->isLoggedIn("member/login");
        $data = array();
        $data['category'] = new Category();
        $data['manufacturer'] = new Manufacturer();
        $data['seoTitle'] = "Checkout | E-Nepal";
        $member = $_SESSION[SESSION_KEY];
        $cart = new Cart();
        /* $sql = "SELECT c.*,p.title ,p.image,p.price "
          . "FROM cart c "
          . "LEFT JOIN "
          . "product p "
          . "on c.product_id=p.id "
          . " where "
          . "c.members_id=$member->id AND converted='0'"; */

        $sql = "SELECT sa.*,p.title,p.image,p.price "
                . "from product p "
                . "join ("
                . "select c.*,s.product_id,s.size from "
                . "cart c "
                . "left join "
                . "stock s "
                . " on c.stock_id=s.id where c.members_id=$member->id AND converted='0') sa"
                . " on sa.product_id=p.id";


// $cart->condition=" members_id=$member->id AND converted='0'";
        $cartItems = $cart->findAllByQuery($sql);
        $data['member'] = $member;
        $data['cartItems'] = $cartItems;
        $_SESSION['cartItems'] = $cartItems;
        $this->loadViewNoSideBar("__checkout", $data);
    }

    public function changePassword($id = NULL) {
        $data['seoTitle'] = "Restore Password | E-Nepal";
        $this->isLoggedIn();


        $model = new Member();
        $data['model'] = $model;
        $viewData = $model->findById($id);

        if (isset($_POST['confirm'])) {
            $password = $_POST['Member'];

            if ($viewData->password != md5($password['oldPassword'])) {
                $this->setFlash("error", "Incorrect Password.Please try again...");
            } else if ($password['newPassword'] != $password['newPassword1']) {
                $this->setFlash("error", "Password doesnot match.Please try again...");
            } else {
                $model->attributes = array('password' => md5($password['newPassword']));
                $update = $model->update($id);
//$sql = "UPDATE user SET password=:password WHERE id=$id";
//$model->params = array(':password' => md5($password['newPassword']));
//$update = $model->findByQuery($sql);

                if ($update) {
                    $this->setFlash("success", "Password has been successfully changed...");
                    $this->redirect(controller . "/index");
                } else {
                    $this->setFlash("error", "Password can not be changed..." . $update[2]);
                }
            }
        }



        $this->loadPartialView("_changePassword", $data);
    }

    public function checkPassword() {
        $return = "false";
        if (isset($_POST['password'])) {
            $model = new Member();
            $model->condition = " password=:password";
            $model->params = array(':password' => md5($_POST['password']));


            $data = $model->find();

            if ($data) {
                $return = "true";
            }
            echo $return;
        }
    }

    public function checkCode() {
        $return = "false";
        if (isset($_POST['code'])) {
            $model = new Member();
            $model->condition = " verCode=:verCode and id=:id";
            $model->params = array(':verCode' => $_POST['code'], ':id' => $_POST['id']);
            $data = $model->find();

            if ($data) {
                $return = "true";
            }
            echo $return;
        }
    }

    public function forgotPassword() {
        $data['seoTitle'] = "Restore Password | E-Nepal";
        $member = new Member();
        $manufacturer = new Manufacturer();
        $data['manufacturer'] = $manufacturer;
        $data['category'] = new Category();
        if (isset($_POST['continue'])) {
            if ($this->isSession('captcha') AND trim(strtolower($_POST['captcha'])) == $_SESSION['captcha']) {
                $email = $_POST['email'];
                $member->attributes['email'] = $email;
                $member->condition = 'email=:email';
                $member->params = array(':email' => $email);
                $find = $member->find();
                if ($find) {
                    $secretKey = rand(1111, 9999);
                    $sql = "UPDATE members SET verCode=:verCode WHERE email=:email";
                    $member->params = array(':email' => $email, ':verCode' => $secretKey);
                    $insert = $member->updateByQuery($sql);
                    $this->sendEmail(array('email' => $email, 'secretKey' => $secretKey, 'type' => 'restorePassword'));
                    $_SESSION['email'] = $email;
                    $this->redirect('member/restorePassword/' . $find->id);
                } else {
                    $this->setFlash('error', "Email Id Doesnot Exists.. Please Enter a Registered Email");
                }
            } else {
                $this->setFlash('error', "Invalid Captcha Code.Please Re-Type the Captcha again");
            }
        }



        $this->loadViewNoSideBar('__forgotPassword', $data);
    }

    public function restorePassword($id = NULL) {
        $member = new Member();
        $data['member'] = $member;
        $data['category'] = new Category();
        $manufacturer = new Manufacturer();
        $data['manufacturer'] = $manufacturer;
        $data['id'] = $id;

        if (isset($_POST['reset'])) {
            $password = $_POST['Member'];

            if ($password['newPassword'] != $password['newPassword1']) {
                $this->setFlash("error", "Password doesnot match.Please try again...");
            } else {
//$email = $_SESSION['email'];
                $member->attributes = array('password' => md5($password['newPassword']));
                $update = $member->update($id);
//$sql = "UPDATE user SET password=:password WHERE id=:id";
//$member->params = array(':password' => md5($password['newPassword']), ':id' => $id);
//$update = $member->findByQuery($sql);

                if ($update) {
                    $this->setFlash("success", "Password has been successfully resetted...");
                    $this->redirect(controller . "/login");
                } else {
                    $this->setFlash("error", "Password can not be changed..." . $update[2]);
                }
            }
        }



        $this->loadViewNoSideBar("__restorePassword", $data);
    }

    public function updateCartQty() {
        try {
            if (isset($_POST['cart_id']) and ! empty($_POST ['cart_id'])) {
                $cart_id = $_POST['cart_id'];
                $qty = $_POST['quantity'];
                if ($qty < 1 or $qty > 10) {
                    $data['error'] = "Product quantity not in range..Please try again..";
                } else {
                    $cart = new Cart();
                    $cart->attributes['quantity'] = $qty;
                    $update = $cart->update($cart_id);
                    if ($update == true) {
                        $data['cartAmt'] = Functions::getCartAmount();
                    } else {
                        $data['error'] = "Cannot Update";
                    }
                }
            }
        } catch (PDOException $ex) {
            $data['error'] = $ex->getMessage();
        }
        echo json_encode($data);
    }

}
