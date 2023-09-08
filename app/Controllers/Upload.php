<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class Upload extends BaseController {

    protected $helpers = ['form'];

    public function index() {
        return view('sys/employee/upload_form', ['errors' => []]);
    }

    public function upload() {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];
        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('sys/employee/upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (!$img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];

            return view('sys/employee/upload_success', $data);
        }

        $data = ['errors' => 'The file has already been moved.'];

        return view('sys/employee/upload_form', $data);
    }

    public function uploadpdf() {
        $validationRule = [
            'userfile' => [
                'label' => 'PDF File',
                'rules' => [
                    'uploaded[userfile]',
                    'ext_in[userfile,pdf]', // Validate that it's a PDF file
                    'mime_in[userfile,application/pdf]', // Validate the PDF MIME type
                    'max_size[userfile,2048]', // Max file size in kilobytes (2MB)
                ],
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            return view('sys/employee/upload_form', $data);
        }

        $pdf = $this->request->getFile('userfile');

        if (!$pdf->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $pdf->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];

            return view('sys/employee/upload_success', $data);
        }

        $data = ['errors' => 'The file has already been moved.'];

        return view('sys/employee/upload_form', $data);
    }

}
