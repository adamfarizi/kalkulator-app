<?php

namespace App\Custom;

class Kalkulator
{   
    // Class untuk melakukan operasi aritmatik
    public function tambah($a, $b)
    {
        return $a + $b;
        // Function untuk operasi artimatik tambah
    }

    public function kurang($a, $b)
    {
        return $a - $b;
        // Function untuk operasi artimatik kurang
    }

    public function kali($a, $b)
    {
        return $a * $b;
        // Function untuk operasi artimatik kali
    }

    public function bagi($a, $b)
    {
        if ($b == 0) {
            return "Tidak bisa dibagi dengan nol";
        }
        return $a / $b;
        // Function untuk operasi artimatik bagi
    }
}

class LanjutanKalkulator extends Kalkulator 
{
    public function modulo($a, $b)
    {
        return $a % $b;
        // Function untuk operasi artimatik modulo
    }
}
