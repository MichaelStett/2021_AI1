<?php

require_once __DIR__ . '/../autoload.php';

class FileController
{
    private $_supportedFileTypes;

    public function __construct()
    {
        $this->_supportedFileTypes = ['invoiceSale', 'invoicePurchase','equipment', 'license', 'otherDocs'];
    }

    public function get()
    {
        $fileType = $_GET['fileType'];

        if (in_array($fileType, $this->_supportedFileTypes)){

            $dir = './' . $fileType . "Uploads/";

            $files = array_diff(scandir($dir), array('.', '..'));

            $filteredFiles = preg_grep('/^'. $_GET['fileNumber'] .'/', $files);

            // $file = $filteredFiles[0];
            // nie chce mi widzieć $filteredFiles[0]; więc taki hack XD
            foreach ($filteredFiles as $file) {
                $name = $dir . $file;

                if(file_exists($name)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="' . basename($name) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($name));
                    flush();
                    readfile($name);
                }

                break;
            }
        }
    }
}
