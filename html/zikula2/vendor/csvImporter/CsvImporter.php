<?php
// CSV import files
class CsvImporter
{
    private $fp;
    private $parse_header;
    private $header;
    private $originalHeader;
    private $delimiter;
    private $enclosure;
    private $length;
    //--------------------------------------------------------------------
    public function __construct($file_name, $parse_header=false, $translation= array(), $delimiter="\t", $enclosure = '"', $length=8000)
    {
        $this->fp = fopen($file_name, "r");
        $this->parse_header = $parse_header;
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
        $this->length = $length;
        $this->lines = $lines;

        if ($this->parse_header)
        {
           $this->header = fgetcsv($this->fp, $this->length, $this->delimiter, $this->enclosure);
           $this->originalHeader = $this->header;
           if (count($translation)){
               foreach ($this->header as &$field){
                   if ($translation[$field]) $field = $translation[$field];
               }
           }
        }
    }
    //--------------------------------------------------------------------
    function __destruct()
    {
        if ($this->fp)
        {
            fclose($this->fp);
        }
    }
    
    //--------------------------------------------------------------------
    function getHeader()
    {
        return $this->header;
    }
    
    //--------------------------------------------------------------------
    function getOriHeader()
    {
        return $this->originalHeader;
    }
    
    //--------------------------------------------------------------------
    function get($max_lines=0)
    {
        //if $max_lines is set to 0, then get all the data

        $data = array();

        if ($max_lines > 0)
            $line_count = 0;
        else
            $line_count = -1; // so loop limit is ignored

        while ($line_count < $max_lines && ($row = fgetcsv($this->fp, $this->length, $this->delimiter, $this->enclosure)) !== FALSE)
        {
            
            if ($this->parse_header)
            {
                foreach ($this->header as $i => $heading_i)
                {                    
                    $row_new[$heading_i] = $row[$i];                    
                }          
                $r = implode('',$row);
                if (!empty($r))
                    // La línia no està en blanc    
                    $data[] = $row_new;
            }
            else
            {                
                $data[] = $row;             
            }

            if ($max_lines > 0)
                $line_count++;
        }
        return $data;
    }
    //--------------------------------------------------------------------

} 