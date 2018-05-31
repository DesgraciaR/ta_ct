<?php
require_once "../vendor/autoload.php";

$dsn = "mysql:dbname=wssimpeg;host=localhost";
$username = "root";
$password = "";

$pdo = new PDO($dsn, $username, $password);
$db = new NotORM($pdo);

$app = new Slim(array(
    "MODE" => "development",
    "TEMPLATES.PATH" => "./templates"
));

//run this : http://localhost/wssimpeg/public/index.php/pns/198403302009121001
//JFU : http://localhost/wssimpeg/public/index.php/pns/196508251987112001
$app->get("/pns/:nipbaru", function ($nipbaru) use ($app, $db) {
    $app->response()->header("Content-Type", "application/json");
    $pns = $db->pnsskp()->where("nip_baru", $nipbaru);
    if ($data = $pns->fetch()) {
        if ($data["jenis_jabatan"]=='1') {
            $jabatan = $data["namajabatan"];
        } else if ($data["jenis_jabatan"]=='2') {
            $jft = $db->jabfung()->where("id", $data["jabatan_fungsional"]);
            $datajft = $jft->fetch();
            $jabatan = $datajft["nama"];
        } else if ($data["jenis_jabatan"]=='4') {
            $jfuu = $db->jfu()->where("id", $data["jabatan_umum"]);
            $datajfu = $jfuu->fetch();
            $jabatan = $datajfu["NAMA"];
            //$jabatan = $data["jabatan_umum"];
        }

        $atasan = $db->pnsskp()->where("unorid", $data["unorid"])->where("jenis_jabatan", "1");
        if ($data_atasan = $atasan->fetch()) {
            $nip_atasan = $data_atasan["nip_baru"];
            $nama_atasan = $data_atasan["namapns"];
            $jabatan_atasan = $data_atasan["namajabatan"];
        } else {
            $nip_atasan = "";
            $nama_atasan = "";
            $jabatan_atasan = "";          
            $nip_atasan_atasan = "";
            $nama_atasan_atasan = "";
            $jabatan_atasan_atasan = "";
        }

        $unit_atasan_atasan = $db->unorskp()->where("id_unor", $data["unorid"]);
        if ($data_unit_atasan_atasan = $unit_atasan_atasan->fetch()) {
            $atasan_atasan = $db->pnsskp()->where("unorid", $data_unit_atasan_atasan["diatasan_id"])->where("jenis_jabatan", "1");
            if ($data_atasan_atasan = $atasan_atasan->fetch()) {
                $nip_atasan_atasan = $data_atasan_atasan["nip_baru"];
                $nama_atasan_atasan = $data_atasan_atasan["namapns"];
                $jabatan_atasan_atasan = $data_atasan_atasan["namajabatan"];
            } else {
                $nip_atasan_atasan = "";
                $nama_atasan_atasan = "";
                $jabatan_atasan_atasan = "";
            }
        }
        $tahun_tmt = substr($data["nip_baru"], 8, 4);
        $bulan_tmt = substr($data["nip_baru"], 12, 2);
        $diff = date_diff(date_create(date("Y-m-d")), date_create($tahun_tmt.'-'.$bulan_tmt.'-01'));
        $months = $diff->y * 12 + $diff->m + $diff->d / 30;
        $bulan = (int) round($months);
        $mk_tahun = floor($bulan/12);
        $mk_bulan = $bulan % 12;

        echo json_encode(array(
            "nip_baru" => $data["nip_baru"],
            "nip_lama" => $data["nip_lama"],
            "nama" => $data["namapns"],
            "jenis_jabatan" => $data["jenis_jabatan"],
            "golongan_id" => $data["golongan_id"],
            "unorid" => $data["unorid"],
            "namaunor" => $data["namaunor"],
            "nama_jabatan" => $data["namajabatan"],
            "jabatan_fungsional" => $data["jabatan_fungsional"],
            "jabatan_umum" => $data["jabatan_umum"],
            "jab_olah" => $jabatan,
            "mk_tahun" => $mk_tahun,
            "mk_bulan" => $mk_bulan,
            "nip_atasan" => $nip_atasan,
            "nama_atasan" => $nama_atasan,
            "jabatan_atasan" => $jabatan_atasan,
            "nip_atasan_atasan" => $nip_atasan_atasan,
            "nama_atasan_atasan" => $nama_atasan_atasan,
            "jabatan_atasan_atasan" => $jabatan_atasan_atasan
            ));
    }
    else{
        echo json_encode(array(
            "status" => false,
            "message" => "Book ID $nipbaru does not exist"
            ));
    }
});

$app->config('debug', true);
$app->run();
