<?php

# Models
require_once __DIR__ . '/models/currencyEnum.php';
require_once __DIR__ . '/models/InvoiceSale.php';
require_once __DIR__ . '/models/InvoicePurchase.php';
require_once __DIR__ . '/models/License.php';
require_once __DIR__ . '/models/Equipment.php';
require_once __DIR__ . '/models/OtherDocuments.php';
require_once __DIR__ . '/models/User.php';


require_once __DIR__ . '/models/repositories/IRepository.php';
require_once __DIR__ . '/models/repositories/UserRepository.php';
require_once __DIR__ . '/models/repositories/UserRepository1.php';
require_once __DIR__ . '/models/repositories/InvoiceSaleRepository.php';
require_once __DIR__ . '/models/repositories/InvoicePurchaseToDB.php';
require_once __DIR__ . '/models/repositories/InvoiceSaleToDB.php';
require_once __DIR__ . '/models/repositories/InvoicePurchaseRepository.php';
require_once __DIR__ . '/models/repositories/LicenseRepository.php';
require_once __DIR__ . '/models/repositories/EquipmentRepository.php';
require_once __DIR__ . '/models/repositories/OtherDocumentsRepository.php';
require_once __DIR__ . '/models/repositories/LicenseToDB.php';
require_once __DIR__ . '/models/repositories/OtherDocumentsToDB.php';
require_once __DIR__ . '/models/repositories/EquipmentToDB.php';


# Views
require_once __DIR__ . '/views/Layout.php';
require_once __DIR__ . '/views/NotFoundView.php';
require_once __DIR__ . '/views/login/LoginIndexView.php';
require_once __DIR__ . '/views/invoiceSale/invoiceSaleIndexView.php';
require_once __DIR__ . '/views/invoicePurchase/invoicePurchaseIndexView.php';
require_once __DIR__ . '/views/equipment/EquipmentIndexView.php';
require_once __DIR__ . '/views/license/LicenseIndexView.php';
require_once __DIR__ . '/views/otherDocs/OtherDocumentsIndexView.php';
require_once __DIR__ . '/views/invoicePurchase/InvoicePurchaseFormView.php';
require_once __DIR__ . '/views/invoiceSale/InvoiceSaleFormView.php';
require_once __DIR__ . '/views/license/LicenseFormView.php';
require_once __DIR__ . '/views/otherDocs/OtherDocumentsFormView.php';
require_once __DIR__ . '/views/equipment/EquipmentFormView.php';



# Controllers 
require_once __DIR__ . '/controllers/LoginController.php';
require_once __DIR__ . '/controllers/InvoiceSaleController.php';
require_once __DIR__ . '/controllers/InvoicePurchaseController.php';
require_once __DIR__ . '/controllers/LicenseController.php';
require_once __DIR__ . '/controllers/EquipmentController.php';
require_once __DIR__ . '/controllers/OtherDocumentsController.php';
require_once __DIR__ . '/controllers/FileController.php';

# Misc
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/exceptions/NotImplementedException.php';


;