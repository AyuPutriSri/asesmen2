<?php
class PenghitungUpah
{
    private $karyawan;

    public function __construct($karyawan)
    {
        $this->karyawan = $karyawan;
    }

    public function hitungUpahMingguan($jamKerja)
    {
        $totalUpah = 0;

        foreach ($this->karyawan as $karyawan) {
            $upahPerJam = $karyawan->getUpahPerJam();
            $upahBiasa = $upahPerJam * $jamKerja;

            if ($jamKerja > 48) {
                $jamLembur = $jamKerja - 48;
                $upahLembur = $upahPerJam * 1.15 * $jamLembur;
                $totalUpah += $upahBiasa + $upahLembur;
            } else {
                $totalUpah += $upahBiasa;
            }

            // Tampilkan hasil
            echo $karyawan->getNama() . " - Total Upah: Rp. $totalUpah<br>";
        }
    }
}
?>