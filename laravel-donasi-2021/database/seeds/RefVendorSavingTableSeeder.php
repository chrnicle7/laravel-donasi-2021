<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RefVendorSavingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_now = Carbon::now();

        $vendors = [
            ['Bank BNI', $time_now, 1],
            ['Bank BRI', $time_now, 1],
            ['Bank BTN', $time_now, 1],
            ['Bank Mandiri', $time_now, 1],
            ['Bank Syariah Indonesia (BSI) eks BRI Syariah', $time_now, 1],
            ['Bank Syariah Indonesia (BSI) eks BNI Syariah', $time_now, 1],
            ['Bank Syariah Indonesia (BSI) eks Mandiri Syariah', $time_now, 1],
            ['Bank BCA', $time_now, 1],
            ['Bank CIMB Niaga', $time_now, 1],
            ['Bank CIMB Niaga Syariah', $time_now, 1],
            ['Bank Muamalat', $time_now, 1],
            ['Bank Permata', $time_now, 1],
            ['Bank Danamon', $time_now, 1],
            ['Bank BII Maybank', $time_now, 1],
            ['Bank Mega', $time_now, 1],
            ['Bank Sinarmas', $time_now, 1],
            ['Bank Commonwealth', $time_now, 1],
            ['Bank OCBC NISP', $time_now, 1],
            ['Bank Bukopin', $time_now, 1],
            ['Bank BCA Syariah', $time_now, 1],
            ['Bank Citibank', $time_now, 1],
            ['Bank BTPN', $time_now, 1],
            ['Bank Jenius BPTN', $time_now, 1],
            ['Bank Ekspor Indonesia', $time_now, 1],
            ['Bank Panin', $time_now, 1],
            ['Bank Arta Niaga Kencana', $time_now, 1],
            ['Bank Buana IND', $time_now, 1],
            ['Bank Multicor', $time_now, 1],
            ['Bank Artha Graha', $time_now, 1],
            ['Bank Sumitomo Mitsui Indonesia', $time_now, 1],
            ['Bank DBS Indonesia', $time_now, 1],
            ['Bank Persona Perdania', $time_now, 1],
            ['Bank Mihuzo Indonesia', $time_now, 1],
            ['Bank Standard Chartered', $time_now, 1],
            ['Bank Amro', $time_now, 1],
            ['Bank Keppel Tatlee Buana', $time_now, 1],
            ['Bank Capital Indonesia', $time_now, 1],
            ['Bank BNP Paribas Indonesia', $time_now, 1],
            ['Bank UOB Indonesia', $time_now, 1],
            ['Bank Woori Indonesia', $time_now, 1],
            ['Bank Bumi Artha', $time_now, 1],
            ['Bank Ekonomi', $time_now, 1],
            ['Bank Haga', $time_now, 1],
            ['Bank IFI', $time_now, 1],
            ['Bank Century/Bank J Trust Indonesia', $time_now, 1],
            ['Bank Mayapada', $time_now, 1],
            ['Bank Nusantara Parahyangan', $time_now, 1],
            ['Bank Swadesi', $time_now, 1],
            ['Bank Mestika', $time_now, 1],
            ['Bank Metro Express', $time_now, 1],
            ['Bank Maspion', $time_now, 1],
            ['Bank Hagakita', $time_now, 1],
            ['Bank Ganesha', $time_now, 1],
            ['Bank Windu Kentjana', $time_now, 1],
            ['Bank Harmoni Internasional', $time_now, 1],
            ['Bank QSB Kesawan', $time_now, 1],
            ['Bank Swaguna', $time_now, 1],
            ['Bank Bisnis Internasional', $time_now, 1],
            ['Bank Sri Partha', $time_now, 1],
            ['Bank Jabar', $time_now, 1],
            ['Bank DKI', $time_now, 1],
            ['Bank DIY', $time_now, 1],
            ['Bank Jateng', $time_now, 1],
            ['Bank Jatim', $time_now, 1],
            ['Bank BPD Jambi', $time_now, 1],
            ['Bank BPD Aceh', $time_now, 1],
            ['Bank Sumut', $time_now, 1],
            ['Bank Nagari', $time_now, 1],
            ['Bank Riau', $time_now, 1],
            ['Bank Sumsel', $time_now, 1],
            ['Bank Lampung', $time_now, 1],
            ['Bank BPD Kalsel', $time_now, 1],
            ['Bank BPD Kalimantan Barat', $time_now, 1],
            ['Bank BPD Kaltim', $time_now, 1],
            ['Bank Kalteng', $time_now, 1],
            ['Bank BPD Sulsel', $time_now, 1],
            ['Bank Sulut', $time_now, 1],
            ['Bank BPD NTB', $time_now, 1],
            ['Bank NTT', $time_now, 1],
            ['Bank Maluku', $time_now, 1],
            ['Bank BPD Papua', $time_now, 1],
            ['Bank Bengkulu', $time_now, 1],
            ['Bank BPD Sulawesi Tengah', $time_now, 1],
            ['Bank Sultra', $time_now, 1],
            ['OVO', $time_now, 1],
            ['Gopay', $time_now, 1],
            ['Shopee Pay', $time_now, 1],
            ['Dana', $time_now, 1],
            ['QRIS', $time_now, 1],
            ['Sakuku', $time_now, 1],
            ['Link Aja', $time_now, 1],
            ['Doku', $time_now, 1],
            ['Jenius', $time_now, 1],
        ];

        foreach($vendors as $vendor){
            $data['nama'] = $vendor[0];
            $data['inserted_at'] = $vendor[1];
            $data['inserted_by'] = $vendor[2];

            DB::table('ref_vendor_saving')->insert($data);
        }
    }
}
