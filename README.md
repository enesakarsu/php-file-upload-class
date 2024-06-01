# PHP File Upload Class

## Overview
This repository contains a PHP class designed to simplify file upload operations to a server. It provides a straightforward interface to handle file uploads, making it easier for developers to implement this functionality in their projects.

## Features
- Easy integration and use
- Handles various file upload operations
- Ensures secure file handling

## Requirements
- PHP 5.6 or higher

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/enesakarsu/php-file-upload-class.git

## Usage
````php
    require_once("File.php"); // Include File.php class in your project

    $uploaded = File::upload("image", "uploads", "1GB"); // Listen by name attribute of incoming file
    // First param = name attribute sent from [input type="file"], second param = upload folder, third param = maximum file size (example: 1GB, 2MB ...)

      if($uploaded !== false){
          $status = $uploaded["status"];
          $file_name = $uploaded["name"];
          $msg = $uploaded["msg"];
      }

    /*
      If the $uploaded variable or the variable you are looking for does not return false,
      it means that there is a file uploading process.
      So get the returned values ​​from the class.
   */

````
