<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * File Upload Class
 *
 * @package   CodeIgniter
 * @subpackage  Custom Libraries
 * @category  Email
 * @author    Soomin Park
 */

require $_SERVER['DOCUMENT_ROOT'].'/aws-sdk-php/vendor/autoload.php';
use Aws\S3\MultipartUploader;
      use Aws\Exception\MultipartUploadException;
 
class Uploader {

  const AWS_KEY = 'AKIAJEKRJ2DQ5GRAV3CA';
  const AWS_SECRET_KEY = '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';
  //const AWS_SECRET_KEY = 'kRYY1Asg1itou126GZ3u4umlLPcKg++JYViuQ0U/';
  const AWS_REGION = 'ap-northeast-1';

  /**
   * CI Singleton
   *
   * @var object
   */
  protected $_CI;
  
  public function __construct($config = array())
  {
    //empty($config) OR $this->initialize($config, FALSE);

    //$this->_mimes =& get_mimes();
    $this->_CI =& get_instance();
  }
  
  public function upload() {
    
    $upload_path_url = 'upload';
    if ( !is_dir($upload_path_url) ) {
      @mkdir($upload_path_url);
    }
    
    $config['upload_path'] = $upload_path_url . '/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
    $config['encrypt_name'] = TRUE;
    $config['max_size'] = 1024 * 1024 * 10;  // Bytes, 1024 * 1024 * 10 = 10MB
    $this->_CI->load->library('upload', $config);
    
    if (!$this->_CI->upload->do_upload('img')) {     
      log_message('error', 'upload fail'); 
      return FALSE;
      
      // @TODO Implement for upload error 
      // $meta = $this->_CI->upload->data();
      // $info = new StdClass;
      // $info->name = $meta['file_name'];
      // $info->size = $meta['file_size'];
      // $info->type = $meta['file_type'];
      // $info->error = $this->upload->display_errors('', '');
      // $files[] = $info;
//     
      // $res['result'] = FALSE;
      // $res['files'] = $files;
      // $this->output->set_content_type('application/json')->set_output(json_encode($res));
    } 
    else {
      log_message('debug', 'Detect an image');
      $meta = $this->_CI->upload->data();
      
      // make thumbnail
      $config = array();
      $config['image_library'] = 'gd2';
      $config['source_image'] = $meta['full_path'];
      $config['create_thumb'] = TRUE;
      $config['maintain_ratio'] = TRUE;
      $config['width'] = 75;
      $config['height'] = 50;
      
      $this->_CI->load->library('image_lib', $config);      
      $this->_CI->image_lib->resize();
      //print_r($_SERVER['DOCUMENT_ROOT']);
      //print_r($meta);
      //return;
      $thumb['full_name'] = $meta['raw_name'] . '_thumb' . $meta['file_ext'];
      $thumb['full_path'] = $meta['file_path'] . $thumb['full_name'];
      
      //include_once $_SERVER['DOCUMENT_ROOT']."/aws-sdk-php/vendor/autoload.php";
      
      $s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'=>self::AWS_REGION,
        //'signature_version' => 'v4',
        'credentials' => [
            'key'    => self::AWS_KEY,
            'secret' => self::AWS_SECRET_KEY
        ],
      ]);
      
      $uploader = new MultipartUploader($s3, $thumb['full_path'], [
          'bucket' => 's3cs',
          'key'    => 'shop_img/' . $thumb['full_name']
      ]);
      
      try {
          $result = $uploader->upload();
          //echo "Upload complete: {$result['ObjectURL'}\n";
      } catch (MultipartUploadException $e) {
          //echo $e->getMessage() . "\n";
          log_message('error', $e);
        return FALSE;
      }
    
        //use Aws\Common\Aws;
        // Instantiate an S3 client
                /*
        // Upload a publicly accessible file. File size, file type, and md5 hash are automatically calculated by the SDK
        $result = $s3->putObject(array(
            'Bucket' => 's3cs/shop_img/',
            'Key'    => $thumb['full_name'],
            'Body'   => fopen($thumb['full_path'], 'r'),
            //'ACL'    => Aws\S3\Enum\CannedAcl::PUBLIC_READ,
            'ContentType'=>mime_content_type($thumb['full_path'])
        ));
      } catch(S3Exception $e){
        log_message('error', $e);
        return FALSE;
      }
         
         */
      
      return $result['ObjectURL'];
    }
  }
}