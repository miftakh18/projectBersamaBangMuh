<?php




if (!defined('BASEPATH')) exit('No direct script access allowed');


// Current Date
function current_date()
{
    $val    = date("Y-m-d");     // dimension Pixel
    return $val;
}

function sess_lang()
{
    return 'ID';
}

function assets_url()
{
    return base_url() . 'assets/';
}

function files_url()
{
    return base_url() . 'userfiles/';
}

function app_name()
{
    return "PROJECT 1";
}
function company_name()
{
    return "PROJECT 1";
}

function build_uri($teks)
{
    $teks = strrev($teks);
    $st = "";
    for ($i = 0; $i < strlen($teks); $i++) {
        $ascii = ord(substr($teks, $i, 1));
        $hex = dechex($ascii);
        if (strlen($hex) == 1)
            $hex = "0" . $hex;
        $st = $st . $hex;
    }
    return $st;
}

function read_uri($teks)
{
    $st = "";
    for ($i = 0; $i < strlen($teks) / 2; $i++) {
        $dua_angka = substr($teks, 2 * $i, 2);
        $des = hexdec($dua_angka);
        $kar = chr($des);
        $st = $st . $kar;
    }
    $st = strrev($st);
    return $st;
}

function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function tglsaja_eropa($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    return $tahun . '-' . $bulan . '-' . $tanggal;
}

function tgl_indo_min($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . substr($bulan, 0, 3) . ' ' . $tahun;
}

function blnsaja_indo($tgl)
{
    $bulan = getBulan(substr($tgl, 5, 2));
    return $bulan;
}
function tglsaja_rev($tgl)
{
    $tanggal = substr($tgl, 0, 2);
    $bulan = substr($tgl, 3, 2);
    $tahun = substr($tgl, 6, 4);
    return $tahun . '-' . $bulan . '-' . $tanggal;
}

function thnsaja_indo($tgl)
{
    $tahun = substr($tgl, 0, 4);
    return $tahun;
}

function tglsaja_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    return $tanggal;
}

function waktu_indo($tgl)
{
    $swaktu = substr($tgl, 11, 8);
    return $swaktu;
}

function hari_indo($tgl)
{
    $day = date('D', strtotime($tgl));
    switch ($day) {
        case 'Sun':
            return 'Minggu';
            break;
        case 'Mon':
            return 'Senin';
            break;
        case 'Tue':
            return 'Selasa';
            break;
        case 'Wed':
            return 'Rabu';
            break;
        case 'Thu':
            return 'Kamis';
            break;
        case 'Fri':
            return 'Jumat';
            break;
    }
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Jan";
            break;
        case 2:
            return "Feb";
            break;
        case 3:
            return "Mar";
            break;
        case 4:
            return "Apr";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Jun";
            break;
        case 7:
            return "Jul";
            break;
        case 8:
            return "Agt";
            break;
        case 9:
            return "Sep";
            break;
        case 10:
            return "Okt";
            break;
        case 11:
            return "Nop";
            break;
        case 12:
            return "Des";
            break;
    }
}

function getBulanRomawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}

function getBulanPeriod($bln)
{
    switch ($bln) {
        case "01":
            return "Januari";
            break;
        case "02":
            return "Februari";
            break;
        case "03":
            return "Maret";
            break;
        case "04":
            return "April";
            break;
        case "05":
            return "Mei";
            break;
        case "06":
            return "Juni";
            break;
        case "07":
            return "Juli";
            break;
        case "08":
            return "Agustus";
            break;
        case "09":
            return "September";
            break;
        case "10":
            return "Oktober";
            break;
        case "11":
            return "Nopember";
            break;
        case "12":
            return "Desember";
            break;
    }
}


function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}
