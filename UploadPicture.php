<?php

class UploadPicture
{

    private $image_name; // image name.
    private $image_type; // image type.
    private $image_size; // image size.
    private $image_temp; // the images temporary location.
    private $uploads_folder = "./uploads/"; // the uploads folder
    
    // setting the max upload file size to 2MB.
   private $upload_max_size = 2*1024*1024;
   // creating an array of allowed image types.
   private $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
   public $error; // I need a property to store any validation error.

   public function __construct($image)
   {
     $this->image_name = $image['image']['name'];
     $this->image_size = $image['image']['size'];
     $this->image_temp = $image['image']['tmp_name'];
     $this->image_type = $image['image']['type'];
   
     // These are all the methods we need in our class.
     $this->isImage(); // Checking if the uploaded file is actually an image.
     $this->imageNameValidation(); // Sanitizing the images name.
     $this->sizeValidation(); // Validating the file size.
     $this->checkFile(); // Checking if the file exists in uploads folder.

       
     if($this->error == null){
        // moving the file from the temporary location to the uploads folder.
        $this->moveFile();
     }

    //  if($this->error == null){
    //     // Recording the images name in the database.
    //     $this->recordImage();
    //  }
   }

   private function isImage()
    {
   $finfo = finfo_open(FILEINFO_MIME_TYPE);
   $mime = finfo_file($finfo, $this->image_temp);
   //finfo_close();
   if(!in_array($mime, $this->allowed_image_types) ){
      return $this->error = "Ce n'est pas un type d'image valide";
   }
}

private function imageNameValidation(){
  // return $this->image_name = filter_var($this->image_name, FILTER_SANITIZE_STRING);
  return $this->image_name = htmlspecialchars($this->image_name);
}

private function sizeValidation(){
  if($this->image_size > $this->upload_max_size){
     return $this->error = "Le fichier fait plus de 2 Mo";
  }
}

private function checkFile(){
  if(file_exists($this->uploads_folder.$this->image_name)){
     return $this->error = "Le fichier existe déjà dans le dossier";
  }
}
private function moveFile(){
  if(!move_uploaded_file($this->image_temp, $this->uploads_folder.$this->image_name)){
     return $this->error = "Une erreur s'est produite, veuillez réessayer";
  }
}
public function ImageFullname(){
  return $this->uploads_folder.$this->image_name;
 
}
}
