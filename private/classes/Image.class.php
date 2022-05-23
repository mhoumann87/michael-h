<?php

class Image
{

    // Path to the destination folder for the images
    protected $upload_path;
    // Define allowed filetypes to check against during validation
    protected $allowed_mime_types = [
        'image/gif',
        'image/jpg',
        'image/jpeg',
        'image/png',
        'image/tiff',
        'image/webp',
    ];

    protected $allowed_file_extensions = [
        'png',
        'gif',
        'jpg',
        'jpeg',
        'webp',
    ];

    // Array of error codes
    protected $upload_errors = [
        UPLOAD_ERR_OK => "No errors.",
        UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL => "Partial upload.",
        UPLOAD_ERR_NO_FILE => "No file.",
        UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION => "File upload stopped by extension.",
    ];

    // Set your own max file size, based on variable in the main class
    protected $max_filesize;
    protected $file_extension;
    protected $file_path;

    protected $file_name;
    protected $file_type;
    protected $tmp_file;
    protected $upload_error;
    protected $file_size;

    public function __construct()
    {
        $this->file_name = self::sanitize_file_name($_FILES['post']['name']['image'] ?? '');
        $this->file_extension = self::get_file_extension($_FILES['post']['name']['image'] ?? '');
        $this->file_type = $_FILES['post']['type']['image'] ?? '';
        $this->tmp_file = $_FILES['post']['tmp_name']['image'] ?? '';
        $this->upload_error = $_FILES['post']['error']['image'] ?? '';
        $this->file_size = $_FILES['post']['size']['image'] ?? '';
    }

} // Image class
