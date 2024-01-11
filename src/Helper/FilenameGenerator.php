<?php

namespace Ay4t\PHPImage\Helper;

class FilenameGenerator
{
    /**
     * Bentuk format nama file yang akan dihasilkan
     * @var string $style_filename timestamp, random_alnum, md5, original
     */
    protected $style_filename = 'original'; 

    /**
     * Filename property
     * @var string
     */
    protected $filename = ''; 

    protected $prefix_filename = ''; 

    /**
     * Filename result property
     * @var string
     */
    protected $filename_result = ''; 

    /**
    * __construct
    */
    public function __construct()
    {
    }

    /**
     * Undocumented function
     * @return self::$filename_result
     */
    public function generateFilename()
    {
        if( $this->style_filename == 'original'){
            $this->filename_result  = $this->filename;
        }

        if( $this->style_filename == 'timestamp'){
            $rand       = str_pad(rand(0,999), 3, '0', STR_PAD_LEFT);
            $generate   = time() . '_' . $rand;

            $use_prefix = '';
            if( ! empty( $this->prefix_filename ) ){
                $use_prefix = $this->prefix_filename . '_';
            }
            
            $this->filename_result = $use_prefix . $generate;            
        }

        if( $this->style_filename == 'random_alnum'){
            // $rand adalah random string alpha dan numeric tanpa spasi sebanyak 10 karakter
        }

        if( $this->style_filename == 'md5'){
            $this->filename_result = md5($this->filename);
        }

        return $this->filename_result;
    }

    /**
     * setStyleFilename
     * @param string $style_filename
     * @return self
     */
    public function setStyleFilename($style_filename)
    {
        // validation lists

        $this->style_filename = $style_filename;
        return $this;
    }

    /**
     * setFilename
     * @param string $filename
     * @return self
     */
    public function setFilename( $filename)
    {
        $this->filename = $filename;
        return $this;
    }

    public function setPrefixFilename( $prefix_filename )
    {
        $this->prefix_filename = $prefix_filename;
        return $this;
    }

}
