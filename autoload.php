<?php

# Models
require_once __DIR__ . '/models/currencyEnum.php';
require_once __DIR__ . '/models/InvoiceSale.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/models/repositories/UserRepository.php';
require_once __DIR__ . '/models/repositories/InvoiceSaleRepository.php';

# Views
require_once __DIR__ . '/views/Layout.php';
require_once __DIR__ . '/views/login/LoginIndexView.php';
require_once __DIR__ . '/views/invoiceSale/invoiceSaleIndexView.php';


# Controllers 
require_once __DIR__ . '/controllers/LoginController.php';
require_once __DIR__ . '/controllers/InvoiceSaleController.php';

# Misc
require_once __DIR__ . '/config.php';



?>
