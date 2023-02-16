<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
    public function generate($html, $filename='', $paper = '', $orientation = '', $stream=true)
    {
        $session = session();
        $namaBerkas = $session->get('namaBerkas');
        $passphrase = $session->get('passphrase');
        $nik        = $session->get('nik');
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if ($stream) {
            $output = $dompdf->output();
            file_put_contents("berkasAsli/prosesRender.pdf", $output);
            // $dompdf->stream("tes.pdf", array("Attachment" => 0));
        } else {
            return $dompdf->output();  
        }
        //Proses TTE
        $curl = curl_init();
        if (function_exists('curl_file_create')) { // php 5.5+
          $cFile = curl_file_create('C:\xampp\htdocs\APIDesaDigital\berkasAsli\prosesRender.pdf','application/pdf','prosesRender');
          $cFile2 = curl_file_create('C:\xampp\htdocs\APIDesaDigital\assets\images\ContohQRCodeKades.jpeg','image/jpeg','ContohQRCodeKades');
        } else { // 
          $cFile = '@' . realpath('C:\xampp\htdocs\APIDesaDigital\berkasAsli\tes.pdf','application/pdf','tes');
        }
        $post = array('file' => $cFile,'height' => '150','image' => 'true','imageTTD'=> $cFile2,'jenis_response' => 'BASE64','location' => 'D:\\','nik' => $nik,'passphrase' => $passphrase,'tag_koordinat' => '#','tampilan' => 'VISIBLE','width' => '200');
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://10.0.22.66/api/sign/pdf',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $post,
          CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ZXN1cmF0OmFudG9uMTIzISFAQCMj',
            'Cookie: JSESSIONID=AE5E23760E09A5CC2FB00BC093945AE5'
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $tes = json_decode($response);
        $bin = base64_decode($tes->base64_signed_file, true);
        if (strpos($bin, '%PDF') !== 0) {
            throw new Exception('Missing the PDF file signature');
        }
        file_put_contents("berkasTTE/".$namaBerkas.".pdf", $bin);
    }
}