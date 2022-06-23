<?php

namespace Project\Service;

use Project\Domain\Rusun;
use Project\Domain\Pemohon;
use Project\Config\Database;
use Project\Domain\Penghuni;
use Project\Domain\Pengumuman;
use Project\Model\AturJadwalRequest;
use Project\Model\AturJadwalResponse;
use Project\Repository\RusunRepository;
use Project\Repository\BerkasRepository;
use Project\Repository\PemohonRepository;
use Project\Repository\PenghuniRepository;
use Project\Repository\PengumumanRepository;

class PengumumanService {
    private PengumumanRepository $pengumumanRepository;
    private PemohonRepository $pemohonRepository;
    private BerkasRepository $berkasRepository;
    private PenghuniRepository $penghuniRepository;
    private RusunRepository $rusunRepository;

    public function __construct(PengumumanRepository $pengumumanRepository, PemohonRepository $pemohonRepository, BerkasRepository $berkasRepository, PenghuniRepository $penghuniRepository, RusunRepository $rusunRepository)
    {
        $this->pengumumanRepository = $pengumumanRepository;

        $this->pemohonRepository = $pemohonRepository;

        $this->berkasRepository = $berkasRepository;

        $this->penghuniRepository = $penghuniRepository;

        $this->rusunRepository = $rusunRepository;
    }

    public function showPengumuman($nama_pemohon, $nik_pemohon)
    {
        try {
            Database::beginTransaction();

            $pengumuman = new Pengumuman();
            $penghuni = new Penghuni();
            $ruangan = new Rusun();

            $pengumuman = $this->pengumumanRepository->findByNameNik($nama_pemohon, $nik_pemohon);
            $penghuni = $this->penghuniRepository->findById($pengumuman->id_penghuni);
            $ruangan = $this->rusunRepository->findById($penghuni->kode_rusun ?? -1);

            $response = (object) [
                'pengumuman' => $pengumuman,
                'penghuni' => $penghuni,
                'ruangan' => $ruangan
            ];


            Database::commitTransaction();

            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function showDaftarPemohon()
    {
        try {
            Database::beginTransaction();

            $pengumuman = $this->pengumumanRepository->readAll();

            Database::commitTransaction();

            return $pengumuman;

        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function tolakPemohon($id_pengumuman)
    {
        try {
            Database::beginTransaction();

            $pengumuman = new Pengumuman();

            $pengumuman = $this->pengumumanRepository->findById($id_pengumuman);

            $pengumuman->keterangan = 'Ditolak';

            $pengumuman = $this->pengumumanRepository->update($pengumuman);

            Database::commitTransaction();

        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }
    

    public function deletePemohon($id_pengumuman)
    {
        try {
            Database::beginTransaction();

            $pengumuman = new Pengumuman();
            $pemohon = new Pemohon();

            $pengumuman = $this->pengumumanRepository->findById($id_pengumuman);
            $pemohon = $this->pemohonRepository->findById($pengumuman->id_pemohon);


            $this->pengumumanRepository->delete($id_pengumuman);
            $this->pemohonRepository->delete($pengumuman->id_pemohon);
            $this->berkasRepository->delete($pemohon->id_berkas);

            Database::commitTransaction();

        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function aturJadwal($id_pengumuman, AturJadwalRequest $aturJadwalRequest): AturJadwalResponse
    {
        try {
            Database::beginTransaction();

            $pengumuman = new Pengumuman();
            // echo "<script>console.log('Debug Objects: " . $aturJadwalRequest->t_wawancara . "' );</script>";
            $pengumuman = $this->pengumumanRepository->findById($id_pengumuman);

            $pengumuman->t_wawancara = $aturJadwalRequest->t_wawancara;
            $pengumuman->t_hasil = $aturJadwalRequest->t_hasil;
            $pengumuman->keterangan = 'Wawancara';

            $pengumuman = $this->pengumumanRepository->update($pengumuman);

            $response = new AturJadwalResponse();
            $response->pengumuman = $pengumuman;
            
            Database::commitTransaction();

            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function getJadwal($id_pengumuman)
    {
        try {
            Database::beginTransaction();

            $pengumuman = new Pengumuman();
            $pengumuman = $this->pengumumanRepository->findById($id_pengumuman);

            Database::commitTransaction();

            return $pengumuman;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }
}