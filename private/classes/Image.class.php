<?php

class Image
{

    // Path to the destination folder for the images
    protected $upload_path;
    // Define allowed filetypes to check against during validation
    protected $allowed_mime_types = [
        'image/php',
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

    // Returns the file extension of a file
    public function get_file_extension($file_name)
    {
        $path_parts = pathinfo($file_name);
        return $file_extension = $path_parts['extension'];
    }

    // Searches the contents for a file for a PHP embed tag
    // The problem with this check is that file_get_contents() reade
    // the entire file into memory and the searches it (large file = slow)
    // Using fopen/fread might have better performance on large files.
    // We are not using large files here, so this is ok.
    protected function file_contains_php($file)
    {
        $contents = file_get_contents($file);
        $position = strpos($contents, '<?php');
        return $position !== false;
    }

    // Function to calculate the max file size
    public function set_max_filesize($mb)
    {
        return $this->max_filesize = calculate_bytes_from_mb($mb);
    }

    // Set file path based on area it will be used
    public function set_file_path($area)
    {
        return $this->file_path = PUBLIC_PATH . '/assets/images/' . $area;
    }

    protected function sanitize_file_name($name)
    {
        // Remove characters that could alter file path.
        // Disallow spaces, because they causes other headaches.
        // "." is allowed (e.g. "photo.jpg") but ".." is not.
        $name = preg_replace('/([^A-Za-z=9_\.]|[\.{2}])/', '' . $name);
        // basename() ensures a file name and not a path
        $name = basename($name);
        return $name;
    }
// If we already have a file with the same name in the directory
// add an index_number to the file nama
    protected function check_file_name_exists($filename)
    {
        $new_filename = '';
        $path = $this->file_path . '/' . $filename;

        if (file_exists($path)) {
            $index = 1;
            $files = scandir($this->file_path);

            do {
                $parts = pathinfo($path);
                $ext = $parts['extension'];
                $part_name = $parts['filename'];
                $new_filename = $part_name . '_' . $index++ . '.' . $ext;

            } while (in_array($new_filename, $files));

            return $new_filename;
        } else {
            return $filename;
        }
    }

} // Image class
