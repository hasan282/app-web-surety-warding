<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PrincipalRate extends Seeder
{
    private $principal, $people, $rate;

    public function run()
    {
        $this->_running();
    }

    private function _data()
    {
        $data = array(

            array(
                'marketing' => 'ANAS',
                'principal' => array(
                    'CV INDAH DWI JAYA',
                    'PT PALAPA TIMUR TELEMATIKA',
                    'PT PALAPA RING BARAT',
                    'PT MORA TELEMATIKA INDONESIA',
                    'PT INDONESIA FERRY PROPERTI',
                    'CV KARYA MULIA',
                    'PT HARMONI PRIMA MEDIKA',
                    'PT MORA TELEMATIKA INDONESIA Tbk',
                    'PT PUTRA DUMAS LESTARI',
                    'PT ARTHA MULIA TRIJAYA',
                    'KJPP TOHA OKKY HERU & REKAN',
                    'PT MULTIFILING MITRA INDONESIA Tbk',
                    'PT DINAMIKA ENERGI MARITIM',
                    'PT YCP SOLIDIANCE INDONESIA',
                    'PT KARYAGRAHA UNGGULAGUNG',
                    'PT ENDAVO CITA PERKASA'
                ),
                'rate' => array(
                    array(
                        'proyek' => array('PM', 'SW'),
                        'asuransi' => array('BUMIDA'),
                        // BB, PB, APB, MB
                        'rate' => array(0.15, 0.15, 0.2, 0.15),
                        'minimum' => 70000,
                        'admin' => 30000
                    ),
                    array(
                        'proyek' => array('PM', 'SW'),
                        'asuransi' => array('MAXIMUS'),
                        // BB, PB, APB, MB
                        'rate' => array(0.125, 0.15, 0.175, 0.15),
                        'minimum' => 70000,
                        'admin' => 30000
                    )
                )
            ),

            array(
                'marketing' => 'ROCHMAN',
                'principal' => array(
                    'PT FIBERHOME TECHNOLOGIES INDONESIA'
                ),
                'rate' => array(
                    array(
                        'proyek' => array('PM'),
                        'asuransi' => array('MAXIMUS', 'BUMIDA'),
                        // BB, PB, APB, MB
                        'rate' => array(0.2, 0.3, 0.35, 0.3),
                        'minimum' => 300000,
                        'admin' => 50000
                    ),
                    array(
                        'proyek' => array('SW'),
                        'asuransi' => array('MAXIMUS', 'BUMIDA'),
                        // BB, PB, APB, MB
                        'rate' => array(0.3, 0.4, 0.45, 0.4),
                        'minimum' => 450000,
                        'admin' => 50000
                    )
                )
            ),

            array(
                'marketing' => 'ROCHMAN',
                'principal' => array(
                    'CV GARDENIA BAYANGKARA'
                ),
                'rate' => array(
                    array(
                        'proyek' => array('PM', 'SW'),
                        'asuransi' => array('MAXIMUS'),
                        // BB, PB, APB, MB
                        'rate' => array(0.2, 0.35, 0.45, 0.35),
                        'minimum' => 350000,
                        'admin' => 60000
                    )
                )
            )

            /*
            '' => array(
                'principal' => array(
                    ''
                ),
                'rate' => array(
                    array(
                        'proyek' => array(''),
                        'asuransi' => array(''),
                        'rate' => array(),
                        'minimum' => 0,
                        'admin' => 0
                    )
                )
            )
            */
        );
        return $data;
    }

    private function _running()
    {
        helper(['format', 'enkripsi']);
        $office = '221002065931';
        foreach ($this->_data() as $data) {
            $marketing = $this->_marketing($data['marketing']);
            foreach ($data['principal'] as $principal) {
                $base = create_id(0, true);
                $idpr = $base . mt_rand(1000, 9990);
                $idpp = $base . mt_rand(1000, 9990);
                $this->principal[] = array(
                    'id' => $idpr,
                    'enkripsi' => sha3hash($idpr, 50),
                    'nama' => $principal,
                    'alamat' => 'Jl. Raya No.' . mt_rand(10, 290),
                    'id_office' => $office,
                    'id_marketing' => $marketing,
                    'actives' => 1
                );
                $this->people[] = array(
                    'id' => $idpp,
                    'enkripsi' => sha3hash($idpp, 50),
                    'id_principal' => $idpr,
                    'nama' => 'Sambo',
                    'jabatan' => 'Direktur Utama',
                    'actives' => 1
                );
                foreach ($data['rate'] as $rate) {
                    $this->_rates($rate, $idpr);
                }
            }
        }
        $this->db->table('principal')->insertBatch($this->principal);
        $this->db->table('principal_people')->insertBatch($this->people);
        $this->db->table('principal_rate')->insertBatch($this->rate);
    }

    private function _rates(array $rate, string $principal_id)
    {
        $asuransi = array(
            'MAXIMUS' => '221006103529',
            'BUMIDA' => '221005201325',
            'BINAGRIYA' => '221002154456'
        );
        $proyek = array(
            'PM' => '101',
            'SW' => '102'
        );
        $jaminan = array('101', '102', '103', '104');
        foreach ($rate['proyek'] as $pr) {
            foreach ($rate['asuransi'] as $asr) {
                foreach ($rate['rate'] as $index => $rt) {
                    if ($rt !== null) {
                        $this->rate[] = array(
                            'id_principal' => $principal_id,
                            'id_asuransi' => $asuransi[$asr],
                            'id_jenis' => $jaminan[$index],
                            'id_proyek' => $proyek[$pr],
                            'rate_percent' => $rt,
                            'minimum' => $rate['minimum'],
                            'admin_fee' => $rate['admin']
                        );
                    }
                }
            }
        }
    }

    private function _marketing(?string $key = null)
    {
        $list = array(
            'ROCHMAN' => '230201125148',
            'ANAS' => '230505133926',
            'LUKMAN' => '230522124220',
            'YANDI' => '230330192332'
        );
        if ($key === null) {
            $val = array_values($list);
            $rand = array_rand($val);
            return $val[$rand];
        } else {
            if (array_key_exists($key, $list)) {
                return $list[$key];
            } else {
                return null;
            }
        }
    }
}
