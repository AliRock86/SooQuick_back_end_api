<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;

class UploadImageController extends Controller
{
    public $name = [null];
    private $name1 = [null];
    public  $mainFolder = "images";
    private $folder = "2019";


     public function uploadInner(Request $request){

         $this->Create_name($request->images);


         if(count($this->name)>0)
         {
            if($this->UploadAtt($request->images) == true){
                return   $this->name;
               }

         }



     }
      function Create_name($images){


        for($i = 0;$i < count($images);$i++){

        $micro =(int)microtime(1);
        $extension=$this->getB64Type($images[$i]);

        $allowedfileExtension=['jpg','png','jpeg','JPG','webp'];
        $check=in_array($extension,$allowedfileExtension);
        if($check)
        {

        $name=$i.$micro.".".$extension;
        $this->name[$i]=$name;

        }
        else
        {

          echo 'extentions not allows';

        }


        }




        }



        public function  getB64Type($str) {
            return explode("/",substr($str, 5, strpos($str, ';')-5))[1];
        }



        function UploadAtt($DataFile){




            $CountFile = count($this->name);
                $i=0;

                for($i;$i<$CountFile;$i++){
                $this->name[$i];
                  $Data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$DataFile[$i]));

                    $destination = $this->mainFolder.'/'.$this->name[$i];
                    if(file_put_contents( $destination , $Data)){
                        $Data = null;
                    }
                }
               return true;
            }


}
