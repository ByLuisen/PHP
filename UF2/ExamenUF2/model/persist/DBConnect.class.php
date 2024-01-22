<?php

// class to handle a file 
class DBConnect
{


    private $file; // ruta y nombre del fichero
    private $mode; // modo de acceso al fichero
    private $handle; // puntero al fichero

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getMode()
    {
        return $this->mode;
    }

    public function getHandle()
    {
        return $this->handle;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    public function setHandle($handle)
    {
        $this->handle = $handle;
    }




    // PRIMER MÈTODE BÀSIC PER A MANIPULAR UN FITXER EN GENERAL: OBRIR-LO
    public function openFile($mode)
    {
        $this->mode = $mode;
        $this->handle = fopen($this->file, $this->mode);
        // TRUE si abre el fichero correctamente
        $result = ($this->handle) ? TRUE : FALSE;

        return $result;
    }

    // SEGON MÈTODE BÀSIC PER A MANIPULAR UN FITXER EN GENERAL: TANCAR-LO
    public function closeFile()
    {
        fclose($this->handle);
    }

    // TERCER MÈTODE BÀSIC PER A MANIPULAR UN FITXER EN GENERAL: ESCRIURE TOTES LES DADES DE NOU
    public function writeToFile($data)
    {
        $result = FALSE;
        
        if (count($data) > 0) {
            // abre el fichero en modo write
            if ($this->openFile("w")) {
                $lastIndex = count($data) - 1;
    
                foreach ($data as $index => $line) {
                    // Agregar el salto de línea solo si no es la última fila
                    $separator = ($index === $lastIndex) ? "" : "\n";
                    
                    fputs($this->getHandle(), "$line[0],$line[1],$line[2],$line[3],$line[4],$line[5],$line[6],$line[7]$separator");
                }
    
                $this->closeFile();
                $result = TRUE;
            }
        }
    
        return $result;
    }


    // QUART MÈTODE BÀSIC PER A MANIPULAR UN FITXER EN GENERAL: AFEGIR UNA LÍNIA NOVA AL FINAL DE TOT
    public function addNewLine($newLine)
    {
        $result = FALSE;


        if ($this->openFile("a+")) {
            fputs($this->getHandle(), $newLine);
            $this->closeFile();
            $result = TRUE;
        }

        return $result;
    }

    // CINQUÈ MÈTODE BÀSIC PER A MANIPULAR UN FITXER EN GENERAL: RECOLLIR TOTES LES LÍNIES DEL FITXER
    public function realAllLines()
    {

        $lines = array();
        if ($this->openFile("r")) {

            while (!feof($this->getHandle())) {
                $lines[] = fgetcsv($this->getHandle());
            }
            $this->closeFile();
        }

        return $lines;
    }


    //NOMÉS S'HI PODEN FICAR MÈTODES GENERALS PER A TOTS ELS FITXERS

}
