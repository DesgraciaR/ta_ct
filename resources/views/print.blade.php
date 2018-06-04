<?php $active ='home' ; ?>
@extends('layouts.pgprint')
@section('content')
@php($data = \GlobalHelper::accessdata($cetakform->nip_baru))


<div class="box" style="width: 100%; position: center;">
<div class="coll-md-12">
  <div class="coll-md-4 pull-right">
  
        <p class="filename">
          Yogyakarta, {{$cetakform->tgl_pengajuan}}
     <p style="text-align: justify; text-indent: 0.5in;">Kepada</p>
        <p style="text-align: justify; text-indent: 0.5in;">Yth</p>
        <p style="text-align: justify; text-indent: 0.5in;">@if($cetakform->id_atasan == session()->get("data")->nip_atasan)</p>
              <p style="text-align: justify; text-indent: 0.5in;">{{session()->get("data")->jabatan_atasan}}</p>
                @else
              <p style="text-align: justify; text-indent: 0.5in;">{{session()->get("data")->jabatan_atasan_atasan}}</p>
        
             @endif
        
        <p style="text-align: justify; text-indent: 0.5in;">di Kantor Regional I BKN</p>
        <p style="text-align: justify; text-indent: 0.5in;">Yogyakarta</p>
       </p>  
    
  </div>


        
              <table class="table1" border="1" width="100%">
                <tr>
                  <td colspan="6"><b>I.DATA PEGAWAI</b></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td colspan="2">{{$cetakform->user->nama}}</td>
                  <td>NIP</td>
                  <td colspan="2">{{$cetakform->user->nip_baru}}</td>
                </tr>
                <tr>
                  <td>Jabatan</td>
                  <td colspan="2">{{$data->jab_olah}}</td>
                  <td>Masa Kerja</td>
                  <td colspan="2">{{$data->mk_tahun}}Tahun {{$data->mk_bulan}}bulan</td>
                </tr>
                <tr>
                  <td>Unit Kerja</td>
                  <td colspan="5">{{$data->namaunor}}</td>
                </tr>
                <tr>
                  <td colspan="6"><b>II.DATA CUTI</b></td>
                </tr>
                <tr>
                  <td colspan="2">1.Cuti Tahunan</td>
                  <td> @if($cetakform->id_jenis_cuti == '1') <input type="checkbox" class="minimal" checked>
                        @endif
                   </td>
                    
                 
                  <td colspan="2">2.Cuti Besar</td>
                  <td> @if($cetakform->id_jenis_cuti == '2') <input type="checkbox" class="minimal" checked>
                        @endif</td>
                </tr>
                <tr>
                  <td colspan="2">3.Cuti Sakit</td>
                  <td> @if($cetakform->id_jenis_cuti == '3') <input type="checkbox" class="minimal" checked>
                        @endif</td>
                  <td colspan="2">4.Cuti Melahirkan</td>
                  <td> @if($cetakform->id_jenis_cuti == '4') <input type="checkbox" class="minimal" checked>
                        @endif</td>
                 </tr>
                <tr>
                  <td colspan="2">6.Cuti Karena Alasan Penting</td>
                  <td> @if($cetakform->id_jenis_cuti == '5') <input type="checkbox" class="minimal" checked>
                        @endif</td>
                  <td colspan="2">6.Cuti di Luar Tanggungan Negara</td>
                  <td> @if($cetakform->id_jenis_cuti == '6') <input type="checkbox" class="minimal" checked>
                        @endif</td>
                </tr>
                 <tr>
                  <td colspan="6"><b>III.ALASAN CUTI</b></td>
                </tr>
                <tr>
                  <td colspan="6">{{$cetakform->alasan_cuti}}</td>
                </tr>
                <tr>
                  <td colspan="6"><b>IV.LAMANYA CUTI</b></td>
                </tr>
                <tr>
                  <td>Selama</td>
                  <td>*</td>
                  <td>Mulai tanggal</td>
                  <td>{{$cetakform->tgl_mulai_ubah?:$cetakform->tgl_mulai}}</td>
                  <td>s/d</td>
                  <td>{{$cetakform->tgl_mulai_ubah?:$cetakform->tgl_selesai}}</td>
                </tr>
                 <tr>
                  <td colspan="6"><b>V.CATATAN CUTI</b></td>
                </tr>
                <tr>
                  <td colspan="3">1.CUTI TAHUNAN</td>
                  <td colspan="2">2.CUTI BESAR</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Tahun</td>
                  <td>Sisa</td>
                  <td>Keterangan</td>
                  <td colspan="2">3.CUTI SAKIT</td>
                  <td></td>
                </tr>
                  <tr>
                  <td>N-2</td>
                  <td></td>
                  <td></td>
                  <td colspan="2">4.CUTI MELAHIRKAN</td>
                  <td></td>
                </tr>
                <tr>
                  <td>N-1</td>
                  <td></td>
                  <td></td>
                  <td colspan="2">6.CUTI KARENA ALASAN PENTING</td>
                  <td></td>
                </tr>
                 <tr>
                  <td>N</td>
                  <td></td>
                  <td></td>
                  <td colspan="2">6.CUTI DI LUAR TANGGUNGAN NEGARA</td>
                  <td></td>
                </tr>
                 <tr>
                  <td colspan="6"><b>VI.ALAMAT SELAMA MENJALANKAN CUTI</b></td>
                </tr>
                <tr>
                  <td colspan="3" rowspan="2">{{$cetakform->alamat_cuti}}</td>
                  <td>Telepon</td>
                  <td colspan="2">{{$cetakform->noTelepon}}</td>
                </tr>
               <tr>
                  <td colspan="3">
                     <p style="text-align: center;">Hormat saya</p>
                     &nbsp;
                     &nbsp;
                     &nbsp;
                     <p style="text-align: center; margin-top: 15px">{{$data->nama}}</p>
                     <p style="text-align: center;">NIP: {{$data->nip_baru}}</p>
                  </td>
               </tr>
               <tr>
                 <td colspan="6"><b>VII.PERTIMBANGAN ATASAN LAGSUNG</b></td>
               </tr>
               <tr>
                 <td>DISETUJUI</td>
                 <td>PERUBAHAN</td>
                 <td>DITANGGUHKAN</td>
                 <td colspan="3">TIDAK DISETUJUI</td>
               </tr>
                <tr>
                <td>
                 @if($cetakform->status == 'Diterima' && $cetakform->tgl_mulai_ubah == NULL && $cetakform->tgl_selesai_ubah == NULL)<input type="checkbox" class="minimal" checked>
                 @endif</td>
                 <td>
                    @if($cetakform->status == 'Diterima')<input type="checkbox" class="minimal" checked>
                 @endif</td>
                 <td>@if($cetakform->status == 'Ditangguhkan')<input type="checkbox" class="minimal" checked>
                 @endif </td>
                 <td>@if($cetakform->status == 'Ditolak')<input type="checkbox" class="minimal" checked>
                 @endif</td>
                 <td colspan="3"></td>
               </tr>
               <tr>
                 <td colspan="3">{{$cetakform->alasan_acc_atasan }}</td>
                 <td colspan="3">
                  <p></p>
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      @if($cetakform->id_atasan == session()->get("data")->nip_atasan)
                        <p style="text-align: center; padding-top: 10px;">{{session()->get("data")->nama_atasan}}</p>
                          @else
                       <p style="text-align: center;">{{session()->get("data")->nama_atasan_atasan}}</p>
                       @endif

                    <p style="text-align: center;"> {{$cetakform->id_atasan}}</p>
                 </td>
                 
               </tr>
               <tr>
                 <td colspan="6"><b>VII.KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN PERSETUJUAN</b></td>
               </tr>
               <tr>
                 <td>DISETUJUI</td>
                 <td>PERUBAHAN</td>
                 <td>DITANGGUHKAN</td>
                 <td colspan="3">TIDAK DISETUJUI</td>
               </tr>
               <tr>
                <td>
                 @if($cetakform->status_ppk == 'Diterima' && $cetakform->tgl_mulai_ubah == NULL && $cetakform->tgl_selesai_ubah == NULL)<input type="checkbox" class="minimal" checked>
                 @endif</td>
                 <td>
                    @if($cetakform->status_ppk == 'Diterima')<input type="checkbox" class="minimal" checked>
                 @endif</td>
                 <td>@if($cetakform->status_ppk == 'Ditangguhkan')<input type="checkbox" class="minimal" checked>
                 @endif </td>
                 <td>@if($cetakform->status_ppk == 'Ditolak')<input type="checkbox" class="minimal" checked>
                 @endif</td>
                 <td colspan="3"></td>
              </tr>
              <tr>
                 <td colspan="3">{{$cetakform->alasan_acc_ppk }}</td>
                 <td colspan="3"></td>
               </tr>
              

              </table>
          </div>
</div>
 
</body> 
</html>