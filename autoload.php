<?php

# Models
require_once __DIR__ . '/models/currencyEnum.php';
require_once __DIR__ . '/models/InvoiceSale.php';
require_once __DIR__ . '/models/InvoicePurchase.php';
require_once __DIR__ . '/models/User.php';

require_once __DIR__ . '/models/repositories/IRepository.php';
require_once __DIR__ . '/models/repositories/UserRepository.php';
require_once __DIR__ . '/models/repositories/InvoiceSaleRepository.php';
require_once __DIR__ . '/models/repositories/InvoicePurchaseToDB.php';
require_once __DIR__ . '/models/repositories/InvoiceSaleToDB.php';
require_once __DIR__ . '/models/repositories/InvoicePurchaseRepository.php';

# Views
require_once __DIR__ . '/views/Layout.php';
require_once __DIR__ . '/views/NotFoundView.php';
require_once __DIR__ . '/views/login/LoginIndexView.php';
require_once __DIR__ . '/views/invoiceSale/invoiceSaleIndexView.php';
require_once __DIR__ . '/views/invoicePurchase/invoicePurchaseIndexView.php';
require_once __DIR__ . '/views/equipment/invoiceEquipmentIndexView.php';
require_once __DIR__ . '/views/license/invoiceLicenseIndexView.php';
require_once __DIR__ . '/views/otherDocs/invoiceOtherDocumentsIndexView.php';
require_once __DIR__ . '/views/invoicePurchase/InvoicePurchaseFormView.php';
require_once __DIR__ . '/views/invoiceSale/InvoiceSaleFormView.php';


# Controllers 
require_once __DIR__ . '/controllers/LoginController.php';
require_once __DIR__ . '/controllers/InvoiceSaleController.php';
require_once __DIR__ . '/controllers/InvoicePurchaseController.php';

# Misc
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/exceptions/NotImplementedException.php';
